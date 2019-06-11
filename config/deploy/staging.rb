role :web, "54.163.225.136", :primary => true
server '54.163.225.136', user: 'ec2-user', roles: %w{web app}, my_property: :my_value

set :deploy_to, '/var/www/dev.wealthyretirement.com/'
set :keep_releases, 1
