#!/bin/sh
echo "   New Client Certificate generation"
echo 
echo 
echo " Please, Enter the following credentials: "
echo 
echo " 1. Enter your Full Name: "
printf "Full Name: "
read CN
if [ -z "$CN" ] ; then
    echo "ERROR: Common Name must not be empty"
    exit 1
fi
SUBJ="/CN=$CN"

echo " 2. Please Enter your e-mail address: "
printf "eMail: "
read EMAIL
if [ ! -z "$EMAIL" ] ; then
  SUBJ="$SUBJ/emailAddress=$EMAIL"
fi

echo " 3. Please Enter your Mobile Number: "
printf "Mobile Number: "
read Mb
if [ ! -z "$Mb" ] ; then
  SUBJ="$SUBJ/Mb=$Mb"
fi

# echo " 4. Enter your BlockChain Public Address: "
# printf "BlockChain Adress: "
# read Address
# if [ ! -z "$Address" ] ; then
#   SUBJ="$SUBJ/blockchainAddress=$Address"
# fi

FNAME=`openssl rand 8 | od -xAn | tr -d '[[:space:]]' | sed 's/^0/f/'`
FNAME="$FNAME.tpl"

echo "Created Certificate template: $FNAME"
#echo "Subj=$SUBJ"
echo $SUBJ >$FNAME
