#!/bin/bash
set -e

PREFIX="E248268G"

run() {
  VM="$1"
  SCRIPT="$2"
  echo "=== [$VM] $(basename "$SCRIPT") ==="
  machinectl shell "$VM" /bin/bash -c "$(cat "$SCRIPT")"
}

echo "[+] Création des VMs"
vm-add -d srv-int gw host-ext || true

echo "[+] Démarrage des VMs"
vm-run -b srv-int
vm-run -b gw
vm-run -b host-ext

sleep 5

# 1. Mise en place
run ${PREFIX}-gw       01-mise-en-place/gw.sh
run ${PREFIX}-srv-int  01-mise-en-place/srv-int.sh
run ${PREFIX}-host-ext 01-mise-en-place/host-ext.sh

# 2. VLAN
run ${PREFIX}-gw       02-vlan/gw.sh
run ${PREFIX}-srv-int  02-vlan/srv-int.sh

# 3. DNS
run ${PREFIX}-gw          03-dns/gw.sh
run ${PREFIX}-srv-int     03-dns/srv-int.sh
run ${PREFIX}-host-ext    03-dns/host-ext.sh

# 4. DHCP
run ${PREFIX}-gw       04-dhcp/gw.sh

# 5. HTTP + NAT
run ${PREFIX}-srv-int  05-http/srv-int.sh
run ${PREFIX}-gw       05-http/gw.sh

# 6. Apache
run ${PREFIX}-srv-int  06-apache/srv-int.sh

echo "=== Déploiement terminé ==="
