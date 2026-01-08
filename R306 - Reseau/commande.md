## Création des vm:
-> ROUTEUR
```
vm-add -d gw
vm-run gw
apt-get update
apt install ntpdate
// On utilise -u pour être sûr de passer le réseau de l'université
ntpdate -u ntp.univ-nantes.fr
```

-> INTERNE
```
vm-add -d srv-int
vm-run srv-int
apt-get update 
apt install ntpdate
// On utilise -u pour être sûr de passer le réseau de l'université
ntpdate -u ntp.univ-nantes.fr
```

-> EXTERNE 
```
vm-add -d host-ext
vm-run host-ext
apt-get update 
apt install ntpdate
// On utilise -u pour être sûr de passer le réseau de l'université
ntpdate -u ntp.univ-nantes.fr
```

-> l'ajustement du temps est refusé par le noyau (Operation not permitted) :  l'horloge est verrouillée par l'hôte de virtualisation
---

## Configuration du ROUTEUR:

### Interface Intranet (vers INTERNE):
-> Création du VLAN 10 sur l'interface physique
```
ip link set eth0 up
ip link add link eth0 name eth0.10 type vlan id 10
ip link set eth0.10 up
ip addr add 10.0.1.254/24 dev eth0.10
```

### Interface Internet (vers EXTERNE) :
```
ip link set eth1 up
ip addr add 192.168.1.254/24 dev eth1
```

-> Activation du routage : 
```
nano /etc/sysctl.conf
// decommenter cette ligne -> net.ipv4.ip_forward = 1
sysctl -p
```

### Configuration du DNS
```
apt install bind9
nano /etc/bind/db.sae.com

$TTL 604800
@   IN  SOA ns1.sae.com. admin.sae.com. ( 2026010701 ; Serial )
@   IN  NS  ns1.sae.com.

ns1      IN  A      10.0.1.254
gw       IN  A      10.0.1.254
srv-int  IN  A      10.0.1.1
www      IN  CNAME  srv-int

dev      IN  NS     srv-int.sae.com.

```

### Configuration du DHCP
```
apt install isc-dhcp-server

GNU nano 7.2                  /etc/bind/db.sae.com                           
$TTL 604800
@   IN  SOA ns1.sae.com. admin.sae.com. (
                  2026010701 ; Serial
                  604800     ; Refresh
                  86400      ; Retry
                  2419200    ; Expire
                  604800 )   ; Negative Cache TTL

@       IN  NS      ns1.sae.com.
ns1     IN  A       10.0.1.254
gw      IN  A       10.0.1.254
srv-int IN  A       10.0.1.1
www     IN  CNAME   srv-int

; Délégation
dev     IN  NS      srv-int.sae.com.

nano /etc/bind/named.conf.local

zone "sae.com" {
    type master;
    file "/etc/bind/db.sae.com";
};


named-checkzone sae.com /etc/bind/db.sae.com
systemctl restart bind9

nano /etc/dhcp/dhcpd.conf

# option definitions common to all supported networks...
option domain-name "sae.com";
option domain-name-servers 10.0.1.254;

default-lease-time 600;
max-lease-time 7200;
authoritative;
# The ddns-updates-style parameter controls whether or not the server will
# attempt to do a DNS update when a lease is confirmed. We default to the
# behavior of the version 2 packages ('none', since DHCP v2 didn't
# have support for DDNS.)
ddns-update-style none;


# Déclaration du sous-réseau pour le VLAN 10
subnet 10.0.1.0 netmask 255.255.255.0 {
    range 10.0.1.50 10.0.1.100;    # Plage d'IP pour les autres machines
    option routers 10.0.1.254;     # La passerelle par défaut
    option ntp-servers 10.0.1.254; # Ton serveur de temps
}

# Configuration de l'IP fixe pour INTERNE (srv-int)
host srv-int {
    hardware ethernet ea:5b:a4:17:30:b6;
    fixed-address 10.0.1.1;
}

nano /etc/default/isc-dhcp-server

# Defaults for isc-dhcp-server (sourced by /etc/init.d/isc-dhcp-server)

# Path to dhcpd's config file (default: /etc/dhcp/dhcpd.conf).
#DHCPDv4_CONF=/etc/dhcp/dhcpd.conf
#DHCPDv6_CONF=/etc/dhcp/dhcpd6.conf

# Path to dhcpd's PID file (default: /var/run/dhcpd.pid).
#DHCPDv4_PID=/var/run/dhcpd.pid
#DHCPDv6_PID=/var/run/dhcpd6.pid

# Additional options to start dhcpd with.
#	Don't use options -cf or -pf here; use DHCPD_CONF/ DHCPD_PID instead
#OPTIONS=""

# On what interfaces should the DHCP server (dhcpd) serve DHCP requests?
#	Separate multiple interfaces with spaces, e.g. "eth0 eth1".
INTERFACESv4="eth0.10"
INTERFACESv6=""

systemctl restart isc-dhcp-server
systemctl status isc-dhcp-server

```

# Redirection du port 8080 (externe) vers le port 80 (interne srv-int)
iptables -t nat -A PREROUTING -p tcp --dport 8080 -j DNAT --to-destination 10.0.1.1:80

# Autoriser le transfert de ces paquets
iptables -A FORWARD -p tcp -d 10.0.1.1 --dport 80 -j ACCEPT

# (Optionnel) Masquerade pour permettre à srv-int de sortir sur Internet
iptables -t nat -A POSTROUTING -o eth1 -j MASQUERADE

## Configuration de srv-int:
```
//Affiche l'adresse MAC de l'interface physique
ip link show eth0 | grep link/ether
link/ether ea:5b:a4:17:30:b6 brd ff:ff:ff:ff:ff:ff link-netnsid 0
```

### Montage du VLAN 
```
ip link set eth0 up
ip link add link eth0 name eth0.10 type vlan id 10
ip link set eth0.10 up
```

### Demande d'IP au serveur DHCP
```
dhclient eth0.10
ip addr show eth0.10 
```

### Installation du serveur HTTP et MVC
```
cat /etc/resolv.conf 
cp /etc/resolv.conf /etc/resolv.conf.tp
nano /etc/resolv.conf

nameserver 172.21.0.61
nameserver 172.21.0.60
nameserver 172.21.0.203

apt update
apt install apache2 php php-sqlite3 libapache2-mod-php
cd /etc/
mv resolv.conf.orig resolv.conf.tp
mv resolv.conf resolv.conf.orig
cp resolv.conf.tp resolv.conf

```


# Déploiement du code MVC
# (Supposons que vous avez vos fichiers dans un dossier nommé 'mon_tp')
cp -r /chemin/vers/votre/tp/* /var/www/html/

# Gestion des droits pour SQLite (Crucial pour le TP R3.01)
# Le serveur Web doit pouvoir écrire dans le dossier et sur le fichier .sqlite
chown -R www-data:www-data /var/www/html/
chmod -R 775 /var/www/html/


SUR HOST EXT : 

ip link set eth0 up
ip addr add 192.168.1.10/24 dev eth0
ip route add default via 192.168.1.254

# Test du DNS
host www.sae.com 192.168.1.254

# Test du site Web
curl http://192.168.1.254:8080








