#!/bin/sh
rm -f pvt_ca.key CA.crt

openssl req -new -newkey rsa:512 -nodes -keyout pvt_ca.key -x509 -days 36500 \
  -subj '/O=Indicoin/OU=SSL/CN=Indicoinhttpservice/emailAddress=test@gmail.com/UID=INC' \
  -out CA.crt

