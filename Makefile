# The `make_env` file contains values specific to this deployment.
include make_env

.PHONY: init

# ------------------------------------------------------------
# NOTES
# ------------------------------------------------------------
#
# -	This Makefile has a hard dependency on several values
#	existing within the included make_env file.  Anywhere you
#	find a variable name starting with MAKE_ENV_, that value
#	comes from the make_env file.
#	This is set up so the Makefile itself may be fully generic
#	and portable, while the make_env is altered per-repo.
#
# - This Makefile has hard dependencies on several values
#	existing within a configuration file out on target servers
#	(/mnt/efs/deployment/configs/.env.wpdb).
#	At present, these variables are not named according to
#	their origin.
#
# -	The commented-out $(info "") sections may be uncommented
#	in order to perform debugging on the Makefile.
#
# ------------------------------------------------------------

# $(info "BRANCH_NAME=${BRANCH_NAME})

# Get the values from the `make_env` file and set local variables based on the
# current branch.  Some extra work could be done here to separate them even
# further, as right now it's "master branch is prod; everything else is dev."
DB_NAME			:= ${MAKE_ENV_DB_NAME}
SITE_URL		:= ${MAKE_ENV_SITE_URL}
DB_HOST			:= ${MAKE_ENV_DEV_DB_HOST}
SSH_HOST		:= ${MAKE_ENV_DEV_SSH_HOST}
ifneq (${BRANCH_NAME}, master)
	SSH_HOST	:= ${MAKE_ENV_DEV_SSH_HOST}
	SITE_URL 	:= dev.${MAKE_ENV_SITE_URL}
	DB_HOST		:= ${MAKE_ENV_DEV_DB_HOST}
	DB_NAME		:= dev_${MAKE_ENV_DB_NAME}
else
	SSH_HOST	:= ${MAKE_ENV_PROD_SSH_HOST}
	DB_HOST		:= ${MAKE_ENV_PROD_DB_HOST}
endif
ifneq (${BRANCH_NAME}, master)
ifneq (${MAKE_ENV_DEV_SITE_URL}, )
	SITE_URL	:= ${MAKE_ENV_DEV_SITE_URL}
endif
endif
# $(info "SSH_HOST=${SSH_HOST}")
# $(info "SITE_URL=${SITE_URL}")
# $(info "DB_HOST=${DB_HOST}")
# $(info "DB_NAME=${DB_NAME}")

# Retrieve git commit hash.
GIT_HASH			:= $(shell git rev-parse --short HEAD)
#$(info "GIT_HASH=${GIT_HASH}")

# TESTING VALUE (simulates eight char git hash with random string)
# GIT_HASH			:= $(shell LC_ALL=C tr -dc 'A-Za-z0-9' </dev/urandom | head -c 8 ; echo)
# #$(info "GIT_HASH=${GIT_HASH}")

# Create release tag in the format of YYYYMMDD/<HASH>
# This will set the folder for the release, with multiple releases in a given
# day going into the same date folder.
RELEASE_TAG			:= $(shell date +%Y%m%d)/${GIT_HASH}
#$(info "RELEASE_TAG=${RELEASE_TAG}")

# Crafton (2019-12-12):  SITE_DB_USER/SITE_DB_PASS are needed for commands in make_commands.
SITE_DB_USER	:= ${MAKE_ENV_DB_USER}
SITE_DB_PASS	:= $(shell /usr/bin/ssh ${SSH_HOST} \
					"grep ${SITE_DB_USER} /mnt/efs/deployment/configs/.env.wpdb | sed -E 's/${SITE_DB_USER}=//g'")

# If no password is found in the remote configuration, use the generated password.
ifeq (${SITE_DB_PASS},)
ifneq (${GENERATED_PASSWORD},)
	SITE_DB_PASS	:= ${GENERATED_PASSWORD}
	# $(error "Please create a database password for ${SITE_DB_USER} in /mnt/efs/deployment/configs/.env.wpdb.")
endif
endif
ifeq (${SITE_DB_PASS},)
	SITE_DB_PASS	:= nomakefilepasswordproblem
endif
# $(info "DB_USER=${DB_USER}")
# $(info "DB_PASS=${DB_PASS}")
# $(info "SITE_DB_USER=${SITE_DB_USER}")
# $(info "SITE_DB_PASS=${SITE_DB_PASS}")

# The `make_paths` and `make_commands` files were separated to keep the central
# Makefile a bit cleaner.  We include them here because everything downstream
# depends on them.
include make_paths
include make_commands

# Generate a 42-character random password.
GENERATED_PASSWORD	:= $(shell /usr/bin/bash -c "date +%s | sha256sum | base64 | head -c 42 ; echo")
#$(info "GENERATED_PASSWORD=${GENERATED_PASSWORD})

# Retrieve database user and password from server-based credentials file.
DB_USER			:= $(shell /usr/bin/ssh ${SSH_HOST} \
					"grep DB_USER ${PATHS__CONFIG}/.env.wpdb | sed -E 's/DB_USER=//g'")
DB_PASS			:= $(shell /usr/bin/ssh ${SSH_HOST} \
					"grep DB_PASSWORD ${PATHS__CONFIG}/.env.wpdb | sed -E 's/DB_PASSWORD=//g'")

# Retrieve the WP Admin user password from the server-based credentials file.
WP_ADMIN_PWD		:= $(shell /usr/bin/ssh ${SSH_HOST} \
						"grep WP_ADMIN_PASSWORD ${PATHS__CONFIG}/.env.wpdb | \
						sed -E 's/WP_ADMIN_PASSWORD=//g'")
# $(info "WP_ADMIN_PWD=${WP_ADMIN_PWD}")

WORDPRESS_IS_INSTALLED	:= $(shell /usr/bin/ssh ${SSH_HOST} "${CMD__WP_CORE_IS_INSTALLED}")
#$(info "WORDPRESS_IS_INSTALLED=${WORDPRESS_IS_INSTALLED}")

WORDPRESS_CONFIG_EXISTS	:= $(shell /usr/bin/ssh ${SSH_HOST} "${CMD__WP_CONFIG_EXISTS}")
#$(info "WORDPRESS_CONFIG_EXISTS=${WORDPRESS_CONFIG_EXISTS}")

PREVIOUS_DEPLOYMENT		:= $(shell /usr/bin/ssh ${SSH_HOST} "${CMD__GET_LAST_SYMLINK_TO_CURRENT}")
#$(info "PREVIOUS_DEPLOYMENT=${PREVIOUS_DEPLOYMENT}")

init:
	@echo ""
	@echo ":init"
	@echo "Initializing deployment for ${SITE_URL} on branch ${BRANCH_NAME}@${GIT_HASH}..."

	@echo "Setting up deployment environment..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__CREATE_SITE_STRUCTURE}"

ifeq (${WORDPRESS_IS_INSTALLED},1)
	@echo "Installing WordPress..."

	@echo " "
	@echo "Downloading WordPress at version ${WPV}..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__WP_CORE_DOWNLOAD}"

	@echo " "
	@echo "Removing sample config file..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__REMOVE_SAMPLE_CONFIG}"

	@echo " "
	@echo "Removing wp-content directory..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__REMOVE_STANDARD_WP_CONTENT}"

	@echo " "
	@echo "WordPress downloaded."
endif

	@echo " "
	@echo "Checking WordPress config status..."
ifeq (${WORDPRESS_CONFIG_EXISTS},1)
	@echo " "
	@echo "Creating site-specific database user..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__WP_DB_CREATE}"

	@echo " "
	@echo "Setting default configuration (wp-config.php)..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__WP_CONFIG_CREATE}"

	@echo " "
	@echo "Setting table prefix in wp-config.php..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__WP_CONFIG_UPDATE_PREFIX}"

	@echo " "
	@echo "Installing WordPress..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__WP_CORE_INSTALL}"

	@echo " "
	@echo "Blanking 'blog description' option..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__WP_BLANK_BLOGDESCRIPTION}"

ifneq (${BRANCH_NAME}, master)
	@echo "Setting 'discourage search engines' for dev/staging..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__WP_DISCOURAGE_SEARCH}"
endif

	@echo " "
	@echo "Removing wp-content directory..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__REMOVE_STANDARD_WP_CONTENT}"

	@echo " "
	@echo "WordPress installed."
else
	@echo "No configuration necessary."
endif

build:
	@echo ""
	@echo ":build"
	@echo "Building..."
	@echo "Nothing to do."

verify:
	@echo ""
	@echo ":verify"
	@echo "Verifying installation..."
	@echo "Nothing to do."

test:
	@echo ""
	@echo ":test"
	@echo "Testing installation..."
	@echo "Nothing to do."

failuremode_test:
	@echo ""
	@echo ":failuremode_test"
	@echo "Testing installation with failure modes..."
	@echo "Nothing to do."

deploy:
	@echo ""
	@echo ":deploy"
	@echo "Deploying..."

	@echo "Copying deployment resources (wp-content folder)..."
	/usr/bin/scp -r ./webroot/* ec2-user@${SSH_HOST}:${PATHS__SITE_WEBROOT}
	/usr/bin/scp -r ./wp-content/* ec2-user@${SSH_HOST}:${PATHS__DEPLOYMENT}
	/usr/bin/scp -r ./plugins/* ec2-user@${SSH_HOST}:${PATHS__DEPLOYMENT_PLUGINS}

# If there's a MAKE_ENV_GITHUB_THEME, install it.
ifneq (${MAKE_ENV_GITHUB_THEME},)
	@echo "Installing theme from GitHub..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__WP_INSTALL_THEME_GITHUB}"
endif

	@echo "Symlinking webroot [ wp-content ] to release [ ${RELEASE_TAG}/wp-content ]..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__SYMLINK_TO_CURRENT}"
	/usr/bin/ssh ${SSH_HOST}	"${CMD__SYMLINK_TO_UPLOADS}"

	@echo "Installing plugins from plugins.dat and included .ZIP files..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__INSTALL_PLUGINS}"

	@echo "Setting IU Syndication plugin configuration..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__SYMLINK_SYNDICATION_CONFIG}"

	@echo "Fixing permissions..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__SET_DIRECTORY_PERMISSIONS}"
	/usr/bin/ssh ${SSH_HOST}	"${CMD__SET_FILE_PERMISSIONS}"

	@echo "Assigning apache:apache ownership for webroot and uploads..."
	/usr/bin/ssh ${SSH_HOST}	"${CMD__SET_WEBROOT_OWNERSHIP}"
	/usr/bin/ssh ${SSH_HOST}	"${CMD__SET_UPLOADS_OWNERSHIP}"

clean:
	@echo ""
	@echo ":clean"
	@echo "Pruning old deployments..."

	/usr/bin/ssh ${SSH_HOST}	"${CMD__PRUNE_OLD_DEPLOYMENTS}"

rollback:
	@echo ""
	@echo ":rollback"
	@echo "Falling back to previous deployment..."

	@echo "Symlinking webroot [ wp-content ] to last good release [ ${PREVIOUS_DEPLOYMENT} ]..."
	/usr/bin/ssh ${SSH_HOST}	"sudo ln -sfn ${PREVIOUS_DEPLOYMENT} ${PATHS__SITE_WEBROOT}/wp-content"

default: init