#!/bin/bash
set -e

apt-get update
apt-get install -y ntpdate

ip link set eth1 up
ip addr add 192.168.1.10/24 dev eth1
ip route add 10.0.1.0/24 via 192.168.1.254

echo "nameserver 192.168.1.254" > /etc/resolv.conf
