#!/bin/bash
set -e

APACHE_SITE_CONF="/etc/apache2/sites-available/sae.com.conf"
DOCUMENT_ROOT="/var/www/html"

# Permissions
chown -R www-data:www-data "$DOCUMENT_ROOT"
find "$DOCUMENT_ROOT" -type d -exec chmod 755 {} \;
find "$DOCUMENT_ROOT" -type f -exec chmod 644 {} \;

# .htaccess pour MVC
cat > "$DOCUMENT_ROOT/app/.htaccess" <<EOF
RewriteEngine On
FallbackResource /index.php
EOF

cat > "$DOCUMENT_ROOT/system/.htaccess" <<EOF
order deny,allow
deny from all
EOF

# VirtualHost Apache
cat > "$APACHE_SITE_CONF" <<EOF
<VirtualHost *:80>
    ServerName sae.com
    ServerAlias www.sae.com

    DocumentRoot /var/www/html/app

    <Directory /var/www/html/app>
        AllowOverride All
        Require all granted
        Options +FollowSymLinks
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/sae_error.log
    CustomLog ${APACHE_LOG_DIR}/sae_access.log combined

    FallbackResource /index.php
</VirtualHost>
EOF

# Module rewrite
a2enmod rewrite

# Activation site
a2dissite 000-default.conf
a2ensite sae.com.conf

# Reload Apache
systemctl restart apache2

# Test local
unset http_proxy https_proxy
echo "--- Test site réseau (si accès depuis HOST-EXT) ---"
echo "curl http://sae.com ou curl http://192.168.1.50"
