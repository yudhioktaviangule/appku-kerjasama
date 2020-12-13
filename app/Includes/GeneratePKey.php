<?php
namespace App\Includes;
use Mail;
trait Mailer {
    public function pkey($userInfo = 
        [
        'countryName'          => "INDONESIA",
        "stateOrProvinceName"  => "Sulawesi Selatan",
        "localityName"         => "Makassar",
        "organizationName"     => "Pemkot Makassar",
        "organizationUnitName" => "root",
        "commonName"           => "admin",
        "emailAddress"         => "admin@gmail.com",
        ])
    {
        $privkeypass=$userInfo['emailAddress'].date("dmyHis");
        $numberOfDays=365;
        $privkey = openssl_pkey_new(array('private_key_bits' => 2048,'private_key_type' => OPENSSL_KEYTYPE_RSA));
        openssl_pkey_export($privkey, $privatekey, $privkeypass);
        return preg_replace('/-----BEGIN ENCRYPTED PRIVATE KEY-----|-----END ENCRYPTED PRIVATE KEY-----/','',$privatekey);
    }
}