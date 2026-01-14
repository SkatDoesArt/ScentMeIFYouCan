set -e

echo "nameserver 10.0.1.254" > /etc/resolv.conf

cat > /etc/bind/named.conf.local <<EOF
zone "sae.com" {
  type master;
  file "/etc/bind/db.sae.com";
};
EOF

cat > /etc/bind/db.sae.com <<EOF
\$TTL 604800
@ IN SOA ns1.sae.com. admin.sae.com. (
  2026010701
  604800
  86400
  2419200
  604800 )

@       IN NS ns1.sae.com.
ns1     IN A  10.0.1.254
gw      IN A  10.0.1.254
srv-int IN A  10.0.1.50
www     IN CNAME srv-int.sae.com.
EOF

systemctl restart bind9
