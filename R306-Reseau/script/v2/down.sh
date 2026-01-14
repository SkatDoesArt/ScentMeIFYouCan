#!/bin/bash
set -e

vm-stop srv-int
vm-stop gw
vm-stop host-ext

vm-del srv-int
vm-del gw
vm-del host-ext

