#!/bin/bash
set -e

apt-get update
apt-get install -y apache2 php php-sqlite3 libapache2-mod-php git vlan ntpdate

git clone https://gitlab.univ-nantes.fr/E245623G/mvc.git
cp -r mvc/* /var/www/html/

ip link set eth0 up
ip link add link eth0 name eth0.10 type vlan id 10
ip link set eth0.10 up
ip addr add 10.0.1.50/24 dev eth0.10
ip route add default via 10.0.1.254


chown -R www-data:www-data /var/www/html
chmod -R 775 /var/www/html

systemctl restart apache2
