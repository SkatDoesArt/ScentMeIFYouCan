# SAÉ R3.06 – Architectures Réseaux

## 1. Choix des noms et sous-réseaux

| Machine | Nom choisi | IP VLAN / Subnet | port  | type |
| ------- | ---------- | ---------------- | ----- | ---- |
| Routeur | ROUTEUR         | 10.0.1.254/24    | 0.10  | Intranet Vlan |
| Routeur | ROUTEUR         | 192.168.1.254    | 1     | Internet |
| Interne | INTERNE    | 10.0.1.50/24     | 0.10  | Intranet Vla |
| Externe | EXTERNE   | 192.168.1.10/24  | 1     | Internet |

* VLAN interne : VLAN 10 sur eth0.10 (INTERNE et ROUTEUR)
* Externe : réseau 192.168.1.0/24


## creation des VMs
```bash
vm-add -d INTERNE
vm-add -d ROUTEUR
vm-add -d EXTERNE
```

## lancement des VMs
```bash
vm-run INTERNE
vm-run ROUTEUR
vm-run EXTERNE
```


## suppression des VMs
```bash
vm-stop INTERNE
vm-stop ROUTEUR
vm-stop EXTERNE
vm-del INTERNE
vm-del ROUTEUR
vm-del EXTERNE
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
# Installation du ntdate
apt install ntpdate
# Installation du serveur DNS
apt-get install bind9
# Installation du serveur DHCP
apt-get install isc-dhcp-server
# Installation du paquet iptables
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
ip r add 192.168.1.0/24 via 10.0.1.254  
ip link set eth0 up  
```

-> ROUTEUR
```bash
# Intranet
ip link set eth0 up
ip addr add 10.0.1.254/24 dev eth0

# Internet
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
**Dans INTERNE :**  

```powershell
ping -c 3 10.0.1.254
ping -c 3 192.168.1.254
ping -c 3 192.168.1.10
```  
**Dans ROUTEUR :**

```powershell
ping -c 3 10.0.1.50
ping -c 3 192.168.1.10
```  
**Dans EXTERNE :**

```powershell
ping -c 3 10.0.1.254
ping -c 3 192.168.1.254
ping -c 3 10.0.1.50
```


## 2. VLAN

**INTERNE :**

```bash
ip link add link eth0 name eth0.10 type vlan id 10  
ip link set eth0 up  
ip link set eth0.10 up  
```

**Routeur ROUTEUR :**

```bash
ip link add link eth0 name eth0.10 type vlan id 10  
ip link set eth0 up  
ip link set eth0.10 up  
ip a add 10.0.1.254/24 dev eth0.10  
```

* Test VLAN :

```powershell
ping -c 3 10.0.1.254  # depuis INTERNE
ping -c 3 10.0.1.50   # depuis ROUTEUR
```

---


## 3. DNS

* Domaine choisi : `sae.com`
* Serveur primaire : `ns1.sae.com` (IP 10.0.1.254)
* Alias : `www.sae.com` → `INTERNE.sae.com`

**Fichier `/etc/resolv.conf` dans TOUS les :**

```bind
nameserver 10.0.1.254
```
### -> Routeur :

* Definition de la zone :

**Fichier `/etc/bind/named.conf.local` :**
```powershell
zone "sae.com" in { 
        type master; 
        file "/etc/bind/db.sae.com"; 
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
dev     IN  NS      INTERNE.sae.com.

ns1     IN  A       10.0.1.254
ROUTEUR      IN  A       10.0.1.254
INTERNE IN  A       10.0.1.50

www     IN  CNAME   INTERNE.sae.com.
```

* Test :

```bash
# redemarrage de bind
systemctl restart bind9

# test avec host
host www.sae.com 10.0.1.254
```

---


## 4. DHCP
### -> ROUTEUR
**Fichier `nano /etc/default/isc-dhcp-server` :**

```bash
INTERFACESv4="eth0.10"
INTERFACESv6=""
```

**Fichier `/etc/dhcp/dhcpd.conf` :**


```
subnet 10.0.1.0 netmask 255.255.255.0 {
    range 10.0.1.100 10.0.1.200;
    option routers 10.0.1.254;
    option domain-name "sae.com";
    option domain-name-servers 10.0.1.254;
}

host interne {
    hardware ethernet d6:4b:85:aa:e8:47;  # MAC de la machine INTERNE
    fixed-address 10.0.1.50;
}
```
* Redémarrer le serveur DHCP :

```bash
systemctl restart isc-dhcp-server
```

### -> INTERNE 
**Sur INTERNE : Demander une IP au serveur DHCP**
```bash
dhclient eth0.10
```

---

## 5. HTTP
#### -> ROUTEUR
**Activer le forwarding dans ROUTEUR :**
```powershell
# Activer le forwarding IP
echo 1 > /proc/sys/net/ipv4/ip_forward
```

### -> INTERNE
**Installation et configuration sur INTERNE :**
```bash
chown -R www-data:www-data /var/www/html/
chmod -R 775 /var/www/html/
systemctl restart apache2
```

* Verifier ecoute :

```powershell
ss -lntp | grep :80
curl http://10.0.1.50
```

**Redirection NAT sur ROUTEUR (HTTP 8080 → INTERNE port 80) :**

```powershell
iptables -t nat -A PREROUTING -i eth1 -p tcp --dport 8080 -j DNAT --to-destination 10.0.1.50:80

iptables -t nat -A POSTROUTING -o eth1 -j MASQUERADE

iptables -A FORWARD -p tcp -d 10.0.1.50 --dport 80 -j ACCEPT
iptables -A FORWARD -m state --state ESTABLISHED,RELATED -j ACCEPT
```

* Test depuis EXTERNE :

```powershell
curl http://192.168.1.254:8080
```

---


## 6. Apache / HTTP

### 6.1 Installation et configuration sur INTERNE


```bash
chown -R www-data:www-data /var/www/html
find /var/www/html -type d -exec chmod 755 {} \;
find /var/www/html -type f -exec chmod 644 {} \;
```

**Fichier `/etc/apache2/sites-available/sae.com.conf` :**
```apache
<VirtualHost *:80>
    ServerName sae.com
    ServerAlias www.sae.com

    DocumentRoot /var/www/html/app

    <Directory /var/www/html/app>
        AllowOverride All
        Require all granted
        Options +FollowSymLinks
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/sae_error.log
    CustomLog ${APACHE_LOG_DIR}/sae_access.log combined
</VirtualHost>

FallbackResource /index.php
```

**Activation du site et rechargement d’Apache :**
```bash
a2dissite 000-default.conf
a2ensite sae.com.conf
systemctl reload apache2
```

**Permissions correctes pour www-data sur /var/www/html :**
```bash
chown -R www-data:www-data /var/www/html
find /var/www/html -type d -exec chmod 755 {} \;
find /var/www/html -type f -exec chmod 644 {} \;
```

**Les fichiers .htaccess gèrent le routage pour le MVC :**
```bash
echo "RewriteEngine On" > /var/www/html/app/.htaccess
echo "FallbackResource /app/index.php" >> /var/www/html/app/.htaccess

echo "order deny,allow" > /var/www/html/system/.htaccess
echo "deny from all" >> /var/www/html/system/.htaccess
```

**Desactiver les proxy de l'iut**
```bash
unset http_proxy https_proxy
```

**Tests :**
```bash
curl http://www.sae.com
```

**Lancer le serveuer depuis la SilverBlue**
```bash
vm-browser INTERNE
```

*pour .sh*

    cat > /var/www/html/app/.htaccess <<EOF
    RewriteEngine On
    FallbackResource /index.php
    EOF


## 7. Vérifications finales

* Ping VLAN : `ping 10.0.1.254` / `ping 10.0.1.50`
* DNS : `host www.sae.com 10.0.1.254`
* HTTP : `curl http://192.168.1.254:8080`
* DHCP : `ip a` sur INTERNE → vérifier IP fixe et gateway
