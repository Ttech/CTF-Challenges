#!/bin/bash
set -e

ROOT_PASSWORD="209d1j409d1j230r9fj2309fd34"
USER_PASSWORD="ctf2016"

changePassword() {
    local PWUSER=$1
    local PWPASS=$2
    echo "Changing $PWUSER's password"
    echo "$PWUSER:$PWPASS" | sudo chpasswd
}

SSH_PORT=${SSH_PORT:-22}

if [ ! -d "${DROPBEAR_CONF}" ]; then
    echo
    echo "Configuring dropbear SSH server in folder ${DROPBEAR_CONF}" 

    sudo mkdir -p "${DROPBEAR_CONF}"
    sudo dropbearkey -t dss -f "${DROPBEAR_CONF}/dropbear_dss_host_key"
    sudo dropbearkey -t rsa -f "${DROPBEAR_CONF}/dropbear_rsa_host_key" -s 1024
    sudo dropbearkey -t ecdsa -f "${DROPBEAR_CONF}/dropbear_ecdsa_host_key"

    changePassword root $ROOT_PASSWORD
    changePassword $ALPINE_USER $USER_PASSWORD
fi

echo "Setting permissions..."
chmod +x /usr/local/bin/nsh

if [ $# -gt 0 ]; then
    echo "Running dropbear SSH server on background"
    sudo dropbear -g -m -p ${SSH_PORT}

    echo
    echo "Executing command $@"
    exec "$@"
else
    echo "Running dropbear SSH server on foreground"
    sudo dropbear -m -g -p ${SSH_PORT} -F
fi
