# config valid only for current version of Capistrano
#lock '3.4.0'

set :application, 'investmentu2019'
set :repo_url, 'git@github.com:PaidSites/investmentu2019.git'

#Default branch is :master
set :deploy_to, '/var/www/iu.web.oxfordclub.com/'

# Default value for :scm is :git
set :scm, :git

ask :branch, proc { `git rev-parse --abbrev-ref HEAD`.chomp }.call

# Default value for :linked_files is []
set :linked_files, fetch(:linked_files, []).push('wp-config.php')

# Default value for linked_dirs is []
set :linked_dirs, fetch(:linked_dirs, []).push('wp-content/uploads', 'wp-content/cache', 'wp-content/w3tc-config')

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for keep_releases is 5
set :keep_releases, 3

set :ssh_options, {
  keys: %w( ~/.ssh/aws/key-pairs/oc-dealtracker.pem),
  forward_agent: true,
}




namespace :deploy do

 desc "Post to Slack"
  task :post_to_slack do
    on roles(:app), in: :sequence, wait: 5 do
      execute 'curl -X POST --silent --data-urlencode \'payload={"channel": "#general", "username": "webhookbot", "text": "wealthyretirement.com '+ "#{fetch(:stage)}" +' Deployed: '+ fetch(:branch) +'", "icon_url": "http://wealthyretirement.com/wp-content/themes/wealthy/assets/images/logo-icon.png"}\' https://hooks.slack.com/services/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'
    end
  end

  desc "Post to Slack: starting"
  task :post_to_slack_start do
    on roles(:app), in: :sequence, wait: 5 do
      execute 'curl -X POST --silent --data-urlencode \'payload={"channel": "#general", "username": "webhookbot", "text": "wealthyretirement.com '+ "#{fetch(:stage)}" +' Deploying: '+ fetch(:branch) +'", "icon_url": "http://wealthyretirement.com/wp-content/themes/wealthy/assets/images/logo-icon.png"}\' https://hooks.slack.com/services/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'
    end
  end

  desc "create wordpress files"
  task :create_wordpress_files do
    on roles(:app), in: :sequence, wait: 5 do
      # WP Files
      execute "cp /var/www/wordpress/current/index.php #{release_path}/index.php"
      execute "cp /var/www/wordpress/current/wp-activate.php #{release_path}/wp-activate.php"
      execute "cp /var/www/wordpress/current/wp-blog-header.php #{release_path}/wp-blog-header.php"
      execute "cp /var/www/wordpress/current/wp-comments-post.php #{release_path}/wp-comments-post.php"
      execute "cp /var/www/wordpress/current/wp-cron.php #{release_path}/wp-cron.php"
      execute "cp /var/www/wordpress/current/wp-links-opml.php #{release_path}/wp-links-opml.php"
      execute "cp /var/www/wordpress/current/wp-load.php #{release_path}/wp-load.php"
      execute "cp /var/www/wordpress/current/wp-login.php #{release_path}/wp-login.php"
      execute "cp /var/www/wordpress/current/wp-mail.php #{release_path}/wp-mail.php"
      execute "cp /var/www/wordpress/current/wp-settings.php #{release_path}/wp-settings.php"
      execute "cp /var/www/wordpress/current/wp-signup.php #{release_path}/wp-signup.php"
      execute "cp /var/www/wordpress/current/wp-trackback.php #{release_path}/wp-trackback.php"
      execute "cp /var/www/wordpress/current/xmlrpc.php #{release_path}/xmlrpc.php"

      # WP Directories
      execute "cp -r /var/www/wordpress/current/wp-includes/ #{release_path}/wp-includes/"
      execute "cp -r /var/www/wordpress/current/wp-admin/ #{release_path}/wp-admin/"

      # Plugins
      execute "cp -r /var/www/wordpress/current/wp-content/plugins/w3-total-cache/ #{release_path}/wp-content/plugins/w3-total-cache/"
      execute "cp /var/www/wordpress/current/wp-content/plugins/w3-total-cache/wp-content/advanced-cache.php #{release_path}/wp-content/advanced-cache.php"

      execute "cp -r /var/www/wordpress/current/wp-content/plugins/oc-support/ #{release_path}/wp-content/plugins/oc-support/"
    end
  end

  after :published, 'deploy:create_wordpress_files'


  after :restart, :clear_cache do
    on roles(:web), in: :groups, limit: 3, wait: 10 do
      # Here we can do anything such as:
      # within release_path do
      #   execute :rake, 'cache:clear'
      # end
    end
  end

  after :starting, 'deploy:post_to_slack_start'
  after :finished, 'deploy:post_to_slack'

end
