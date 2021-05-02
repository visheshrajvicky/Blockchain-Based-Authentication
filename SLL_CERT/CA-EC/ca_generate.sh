#!/bin/sh -v
rm -f pvt_ca.key CA.crt

openssl ecparam -genkey -name secp256k1 -out pvt_ca.key
openssl req -new -key pvt_ca.key -out csr.pem \
    -subj '/O=INDICOIN/OU=PKI/CN=SSL/emailAddress=test@gmail.com/UID=INC'
openssl req -x509 -days 36500 -key pvt_ca.key -in csr.pem \
    -out CA.crt

rm csr.pem

#openssl req -new -newkey rsa:4096 -nodes -keyout emcssl_ca.key -x509 -days 36500 \
#  -subj '/O=EmerCoin/OU=EMCSSL/CN=EMCSSL/emailAddress=team@emercoin.com/UID=EMC' \
#  -out emcssl_ca.crt
