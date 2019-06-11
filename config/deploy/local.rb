namespace :setup do
  desc "set up a new site"
  task :new_site do
      run_locally do
      	# set up local WP files
      	# Grab latest WP core from the repo
      	execute "git clone git@github.com:PaidSites/wordpress-core.git ./wordpress-core"

      	# WP directories
      	execute "cp -r ./wordpress-core/wp-admin/ ./wp-admin/"
      	execute "cp -r ./wordpress-core/wp-content/plugins/ ./wp-content/plugins/"
      	execute "cp -r ./wordpress-core/wp-includes/ ./wp-includes/"

      	# WP files
            execute "cp ./wordpress-core/htaccess-sample ./.htaccess"
      	execute "cp ./wordpress-core/index.php ./index.php"
      	execute "cp ./wordpress-core/wp-activate.php ./wp-activate.php"
      	execute "cp ./wordpress-core/wp-blog-header.php ./wp-blog-header.php"
      	execute "cp ./wordpress-core/wp-comments-post.php ./wp-comments-post.php"
      	execute "cp ./wordpress-core/wp-cron.php ./wp-cron.php"
      	execute "cp ./wordpress-core/wp-links-opml.php ./wp-links-opml.php"
      	execute "cp ./wordpress-core/wp-load.php ./wp-load.php"
      	execute "cp ./wordpress-core/wp-login.php ./wp-login.php"
      	execute "cp ./wordpress-core/wp-mail.php ./wp-mail.php"
      	execute "cp ./wordpress-core/wp-settings.php ./wp-settings.php"
      	execute "cp ./wordpress-core/wp-signup.php ./wp-signup.php"
      	execute "cp ./wordpress-core/wp-trackback.php ./wp-trackback.php"
      	execute "cp ./wordpress-core/xmlrpc.php ./xmlrpc.php"
      	execute "cp ./wordpress-core/wp-config-sample.php ./wp-config.php"
      
      	execute "rm -rf wordpress-core"

      	# delete wordpress-starter's .git
      	execute "rm -rf .git"
      	execute "rm README.md && mv ./README-sample.md ./README.md"

      	execute "rm -rf ./config && mv ./config-sample ./config"
      end
  end

end
