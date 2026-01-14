set -e
ip link add link eth0 name eth0.10 type vlan id 10 || true
ip link set eth0 up
ip link set eth0.10 up
ip route add default via 10.0.1.254 || true
dhclient eth0.10