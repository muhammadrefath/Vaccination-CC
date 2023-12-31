#!/bin/bash

sudo apt-get install -y unzip mysql-server php php-mysql apache2

sudo service apache2 restart

wget https://cdn.discordapp.com/attachments/952483177170075709/1190040895081427015/Vaccination-CC_updated.zip -O Vaccination-CC.zip

unzip Vaccination-CC.zip
sudo cp -r Vaccination-CC/* /var/www/html/

cd /var/www/html/

sudo rm index.html

MYSQL_DATABASE="vaccine_inventory"
MYSQL_USER="root"
MYSQL_PASSWORD="root1230"

sudo mysql -e "CREATE DATABASE IF NOT EXISTS $MYSQL_DATABASE;"

sudo mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root1230'; FLUSH PRIVILEGES;"

sudo mysql -u$MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE < vims.sql

sudo service apache2 restart