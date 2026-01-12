# SAÉ R3.06 – Architectures Réseaux

## 1. Choix des noms et sous-réseaux

| Machine | Nom choisi | IP VLAN / Subnet | Description                                             |
| ------- | ---------- | ---------------- | ------------------------------------------------------- |
| Routeur | GW         | 10.0.1.254/24    | Intranet |
| Routeur | GW         | 192.168.1.254    | Internet |
| Interne | SRV-INT    | 10.0.1.50/24     | Serveur HTTP + DNS secondaire |
| Externe | HOST-EXT   | 192.168.1.10/24  | Machine client depuis l’extérieur |

* VLAN interne : VLAN 10 sur eth0.10 (SRV-INT et GW)
* Externe : réseau 192.168.1.0/24


## creation des VMs
```bash
vm-add -d srv-int
vm-add -d gw
vm-add -d host-ext
```

## lancement des VMs
```bash
vm-run srv-int
vm-run gw
vm-run host-ext
```

## installations dépendances

-> INTERNE
```bash
apt-get update 
apt install ntpdate
#Installation du serveur apache2
apt-get install apache2 php php-sqlite3 libapache2-mod-php git
# Installation vmc
apt install git
git clone https://gitlab.univ-nantes.fr/E245623G/mvc.git
cp -r mvc/* /var/www/html/
```

-> ROUTEUR
```bash
apt-get update
#Installation du ntdate
apt install ntpdate
#Installation du serveur DNS
apt-get install bind9
#Installation du serveur DHCP
apt-get install isc-dhcp-server
#Installation du paquet iptables
apt-get install iptables
```

-> EXTERNE 
```bash
apt-get update 
apt install ntpdate
```


## configuration des VMs

-> INTERNE
```bash
ip a add 10.0.1.10/24 dev eth0
ip r add 192.168.1.0/24 via 10.0.1.254
ip link set eth0 up
```

-> ROUTEUR
```bash
# Intranet
ip link set eth0 up
ip addr add 10.0.1.254/24 dev eth0.10

#Internet
ip link set eth1 up
ip addr add 192.168.1.254/24 dev eth1
```

-> EXTERNE 
```bash
ip a add 192.168.1.10/24 dev eth1   
ip link set eth1 up
ip r add 10.0.1.0/24 via 192.168.1.254
```


## Tests  
**Dans Lego :**  

```bash
ping 10.0.1.254
ping 192.168.1.254
ping 192.168.1.10
```  
**Dans Routeur :**

```bash
ping 10.0.1.10
ping 192.168.1.10
```  
**Dans Client :**

```bash
ping 10.0.1.254
ping 192.168.1.254
ping 10.0.1.10
```

## 2. DNS

* Domaine choisi : `sae.com`
* Serveur primaire : `ns1.sae.com` (IP 10.0.1.254)
* Alias : `www.sae.com` → `srv-int.sae.com`

**Fichier `/etc/resolv.conf` :**

```
nameserver 10.0.1.254
```
### -> Routeur :

* Definition de la zone :

**Fichier `/etc/bind/named.conf.local` :**
```
zone "lego.com" in { 
        type master; 
        file "/etc/bind/db.lego"; 
};
```

* Definition des noms de domaines :

**Fichier `/etc/bind/db.sae.com` :**

```bind
$TTL 604800
@       IN  SOA ns1.sae.com. admin.sae.com. (
                  2026010701 ; Serial
                  604800     ; Refresh
                  86400      ; Retry
                  2419200    ; Expire
                  604800 )   ; Negative Cache TTL

@       IN  NS      ns1.sae.com.
dev     IN  NS      srv-int.sae.com.

ns1     IN  A       10.0.1.254
gw      IN  A       10.0.1.254
srv-int IN  A       10.0.1.50

www     IN  CNAME   srv-int.sae.com.
```

* Test :

```bash
# redemarrage de bind
systemctl restart bind9

# test avec host
host www.sae.com 10.0.1.254
```

---

## 3. VLAN

**SRV-INT :**

```bash
ip link add link eth0 name eth0.10 type vlan id 10
ip link set eth0 up
ip link set eth0.10 up
ip a add 10.0.1.50/24 dev eth0.10
```

**Routeur GW :**

```bash
ip link add link eth0 name eth0.10 type vlan id 10
ip link set eth0 up
ip link set eth0.10 up
ip a add 10.0.1.254/24 dev eth0.10
```

* Test VLAN :

```bash
ping 10.0.1.254  # depuis SRV-INT
ping 10.0.1.50   # depuis GW
```

---

## 4. DHCP

**Fichier `/etc/dhcp/dhcpd.conf` :**

```dhcp
subnet 10.0.1.0 netmask 255.255.255.0 {
    range 10.0.1.100 10.0.1.200;
    option routers 10.0.1.254;
    option domain-name "sae.com";
    option domain-name-servers 10.0.1.254;
}

host interne {
    hardware ethernet d6:4b:85:aa:e8:47;  # MAC fixe
    fixed-address 10.0.1.50;
}
```

* Redémarrer le serveur DHCP :

```bash
systemctl restart isc-dhcp-server
```

---

## 5. HTTP

**Installation et configuration sur SRV-INT :**

```bash
apt install apache2 php php-sqlite3 libapache2-mod-php
cp -r /mvc/* /var/www/html/
chown -R www-data:www-data /var/www/html/
chmod -R 775 /var/www/html/
systemctl restart apache2
```

* Vérifier écoute :

```bash
ss -lntp | grep :80
curl http://10.0.1.50
```

**Redirection NAT sur GW (HTTP 8080 → SRV-INT port 80) :**

```bash
iptables -F FORWARD
iptables -t nat -F

iptables -A FORWARD -m state --state ESTABLISHED,RELATED -j ACCEPT
iptables -A FORWARD -p tcp -d 10.0.1.50 --dport 80 -j ACCEPT

iptables -t nat -A PREROUTING -i eth1 -p tcp --dport 8080 -j DNAT --to-destination 10.0.1.50:80
iptables -t nat -A POSTROUTING -o eth1 -s 10.0.1.0/24 -j MASQUERADE
```

* Test depuis HOST-EXT :

```bash
curl http://192.168.1.254:8080
```

---

## 6. Vérifications finales

* Ping VLAN : `ping 10.0.1.254` / `ping 10.0.1.50`
* DNS : `host www.sae.com 10.0.1.254`
* HTTP : `curl http://192.168.1.254:8080`
* DHCP : `ip a` sur INTERNE → vérifier IP fixe et gateway

---

## 7. Notes complémentaires

* Firewall : vérifier qu’aucun filtrage n’empêche le NAT ou les connexions HTTP.
* Toutes les IP utilisées sont cohérentes avec celles de `ip a`.
* La configuration MVC + sqlite est sur le serveur interne (SRV-INT).
