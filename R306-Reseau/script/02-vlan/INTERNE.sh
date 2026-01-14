set -e

ip link add link eth0 name eth0.10 type vlan id 10 || true
ip link set eth0 up
ip link set eth0.10 up

dhclient eth0.10
