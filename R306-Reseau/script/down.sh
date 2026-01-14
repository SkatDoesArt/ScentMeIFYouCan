#!/bin/bash
set -e

vm-stop INTERNE
vm-stop ROUTEUR
vm-stop EXTERNE

vm-del INTERNE
vm-del ROUTEUR
vm-del EXTERNE

