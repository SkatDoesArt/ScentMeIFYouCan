set -e

sed -i 's/^INTERFACESv4=.*/INTERFACESv4="eth0.10"/' /etc/default/isc-dhcp-server

cat > /etc/dhcp/dhcpd.conf <<EOF
subnet 10.0.1.0 netmask 255.255.255.0 {
  range 10.0.1.100 10.0.1.200;
  option routers 10.0.1.254;
  option domain-name "sae.com";
  option domain-name-servers 10.0.1.254;
}

host interne {
  hardware ethernet d6:4b:85:aa:e8:47;
  fixed-address 10.0.1.50;
}
EOF

systemctl restart isc-dhcp-server
