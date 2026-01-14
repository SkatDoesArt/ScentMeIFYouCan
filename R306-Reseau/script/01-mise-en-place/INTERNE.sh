set -e
apt-get update
apt-get install -y ntpdate apache2 php php-sqlite3 libapache2-mod-php git

git clone https://gitlab.univ-nantes.fr/E245623G/mvc.git /tmp/mvc || true
cp -r /tmp/mvc/* /var/www/html/ || true
