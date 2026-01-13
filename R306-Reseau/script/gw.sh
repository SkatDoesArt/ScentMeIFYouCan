#!/bin/bash
set -e

apt-get update
apt-get install -y ntpdate bind9 isc-dhcp-server iptables vlan

# Interfaces
ip link set eth0 up
ip link set eth1 up

ip link add link eth0 name eth0.10 type vlan id 10
ip link set eth0.10 up

ip addr add 10.0.1.254/24 dev eth0.10
ip addr add 192.168.1.254/24 dev eth1

# Routage
echo 1 > /proc/sys/net/ipv4/ip_forward

# DNS
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
srv-int IN A  10.0.1.50
www     IN CNAME srv-int.sae.com.
EOF

systemctl restart bind9

# DHCP
sed -i 's/^INTERFACESv4=.*/INTERFACESv4="eth0.10"/' /etc/default/isc-dhcp-server

cat > /etc/dhcp/dhcpd.conf <<EOF
subnet 10.0.1.0 netmask 255.255.255.0 {
  range 10.0.1.100 10.0.1.200;
  option routers 10.0.1.254;
  option domain-name "sae.com";
  option domain-name-servers 10.0.1.254;
}
EOF

systemctl restart isc-dhcp-server

# NAT HTTP
iptables -t nat -A PREROUTING -i eth1 -p tcp --dport 8080 -j DNAT --to 10.0.1.50:80
iptables -t nat -A POSTROUTING -o eth0.10 -j MASQUERADE
iptables -A FORWARD -p tcp -d 10.0.1.50 --dport 80 -j ACCEPT
iptables -A FORWARD -m state --state ESTABLISHED,RELATED -j ACCEPT
