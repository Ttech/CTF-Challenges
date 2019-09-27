#!/bin/sh
sudo apt-get update
sudo apt-get -y upgrade
sudo apt-get -y install wget curl htop tcpdump lsof nginx
apt-get update && apt-get -y upgrade
sudo service docker enable
sudo service docker start
cp -rv nginx.conf /etc/nginx/sites-enabled/default
cp -rv www-certs /etc/nginx/certs
echo "Done."
