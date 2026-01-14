set -e
apt-get update
apt-get install -y ntpdate bind9 isc-dhcp-server iptables

ip link set eth0 up
ip link set eth1 up
ip addr add 192.168.1.254/24 dev eth1 || true
