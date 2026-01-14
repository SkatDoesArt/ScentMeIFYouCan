set -e
echo 1 > /proc/sys/net/ipv4/ip_forward

iptables -t nat -A PREROUTING -i eth1 -p tcp --dport 8080 \
  -j DNAT --to-destination 10.0.1.50:80 || true

iptables -t nat -A POSTROUTING -o eth0.10 -j MASQUERADE || true

iptables -A FORWARD -p tcp -d 10.0.1.50 --dport 80 -j ACCEPT || true
iptables -A FORWARD -m state --state ESTABLISHED,RELATED -j ACCEPT || true
