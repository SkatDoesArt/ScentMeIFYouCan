set -e
apt-get update
apt-get install -y ntpdate

ip link set eth1 up
ip addr add 192.168.1.10/24 dev eth1 || true
ip route add default via 192.168.1.254 || true
