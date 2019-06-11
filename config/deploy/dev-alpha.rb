role :web, "34.193.102.57", :primary => true
server '34.193.102.57', user: 'ec2-user', roles: %w{web app}, my_property: :my_value

set :deploy_to, '/var/www/alpha.dev.wealthyretirement.com/'
set :keep_releases, 1


