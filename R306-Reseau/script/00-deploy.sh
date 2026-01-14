#!/bin/bash
set -e

PREFIX="E248268G"

run() {
  VM="$1"
  SCRIPT="$2"
  machinectl shell "$VM" /bin/bash -c "$(cat "$SCRIPT")"
}

echo "========= Création des VMs =========="
vm-add -d INTERNE ROUTEUR EXTERNE || true

echo "======== demarrage des VMs ========="
vm-run -b INTERNE
vm-run -b ROUTEUR
vm-run -b EXTERNE

sleep 2

# 1. Mise en place
run ${PREFIX}-ROUTEUR  01-mise-en-place/ROUTEUR.sh
run ${PREFIX}-INTERNE  01-mise-en-place/INTERNE.sh
run ${PREFIX}-EXTERNE  01-mise-en-place/EXTERNE.sh

# 2. VLAN
run ${PREFIX}-ROUTEUR  02-vlan/ROUTEUR.sh
run ${PREFIX}-INTERNE  02-vlan/INTERNE.sh

# 3. DNS
run ${PREFIX}-ROUTEUR  03-dns/ROUTEUR.sh
run ${PREFIX}-INTERNE  03-dns/nameserver.sh
run ${PREFIX}-EXTERNE  03-dns/nameserver.sh

# 4. DHCP
run ${PREFIX}-ROUTEUR  04-dhcp/ROUTEUR.sh

# 5. HTTP + NAT
run ${PREFIX}-INTERNE  05-http/INTERNE.sh
run ${PREFIX}-ROUTEUR  05-http/ROUTEUR.sh

# 6. Apache
run ${PREFIX}-INTERNE  06-apache/INTERNE.sh

echo "=== OK ==="
