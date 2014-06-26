#!/bin/bash

mysql -uroot < "/var/www/provision/shell/enable_remote_mysql_access.sql"
sed -i "s/^bind-address/#bind-address/" /etc/mysql/my.cnf
sudo service mysql restart
