# syntax=docker/dockerfile:1.4
ARG PHP_VERSION=8.4
FROM --platform=$BUILDPLATFORM docker.io/library/php:${PHP_VERSION}-apache as builder

ADD data/ci.conf data/default.conf /etc/apache2/sites-available
ADD data/ports.conf /etc/apache2


RUN <<EOF
echo ----------------------------
echo "Mise à jour des dépôts"
echo ----------------------------
apt-get update
apt-get -y install lsb-release ca-certificates curl apt-transport-https
curl -sSLo /tmp/debsuryorg-archive-keyring.deb https://packages.sury.org/debsuryorg-archive-keyring.deb
dpkg -i /tmp/debsuryorg-archive-keyring.deb
sh -c 'echo "deb [signed-by=/usr/share/keyrings/deb.sury.org-php.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'
apt-get update

echo ----------------------------
echo "Installation de : vim"
echo ----------------------------
apt-get install -y vim

echo ----------------------------
echo "Installation de composer"
echo ----------------------------
curl -sS https://getcomposer.org/installer -o composer-setup.php
HASH=`curl -sS https://composer.github.io/installer.sig`
php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
rm composer-setup.php

echo ----------------------------
echo "Installation de sqlite3"
echo ----------------------------
apt-get -y install sqlite3

echo ----------------------------
echo "Mise à jour du php.ini en dev"
echo ----------------------------
cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini


#echo "Installation des extensions PHP :"
#apt install php${PHP_VERSION}-common php${PHP_VERSION}-{bcmath,bz2,curl,gd,gmp,intl,mbstring,opcache,readline,xml,zip}

#sed -i 's/;extension=pdo_sqlite/extension=pdo_sqlite/g' /usr/local/etc/php/php.ini
#sed -i 's/;extension=sqlite3/extension=sqlite3/g' /usr/local/etc/php/php.ini
echo ----------------------------
echo "Suppression des virtulas host"
echo ----------------------------
a2dissite *
a2ensite ci.conf
a2ensite default.conf
a2enmod rewrite
EOF



CMD ["apache2-foreground"]


