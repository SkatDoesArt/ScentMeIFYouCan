#!/bin/bash
# deploy_all.sh
set -euo pipefail

chmod +x *.sh

./create.sh

sleep 2

echo "=== Configuration GW ==="
machinectl shell E248268G-gw /bin/bash -c "$(cat gw.sh)"

echo "=== Configuration SRV-INT ==="
machinectl shell E248268G-srv-int /bin/bash -c "$(cat srv-int.sh)"

echo "=== Configuration HOST-EXT ==="
machinectl shell E248268G-host-ext /bin/bash -c "$(cat host-ext.sh)"

echo "=== Déploiement terminé ==="
echo "Test : curl http://192.168.1.254:8080"
