#!/bin/bash
set -e

vm-add -d srv-int
vm-add -d gw
vm-add -d host-ext

vm-run -b srv-int
vm-run -b gw
vm-run -b host-ext

sleep 5
