<?php

include("vendor/autoload.php");

$opts = getopt('l:s:', array('label:', 'secret:'));

// parse label
if (array_key_exists('label', $opts)) {
    $label = rawurlencode($opts['label']);
} else {
    $label = false;
}

// parse secret
if (array_key_exists('secret', $opts)) {
    $secret = $opts['secret'];
} else {
    $factory = new RandomLib\Factory;
    $generator = $factory->getMediumStrengthGenerator();
    $secret = $generator->generateString(16, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567');
}

// encode the Google Authenticator secret into an array
$plaintext = array("secret" => $secret);

// initialize JWE object
$jwe = new JOSE_JWE(json_encode($plaintext));


echo "norEduPersonAuthnMethod: \n\n";

// encrypt with Feide's key and proper algorithms
$jwe->encrypt(file_get_contents('feide.pem'), 'RSA-OAEP', 'A128CBC-HS256');

// print the result
echo $jwe->toString().(($label) ? ' label='.$label : '')."\n\n";

// print the QR code
echo "Scan the following QR code with your authentication application: \n\n";
echo \Shelwei\QRCode::terminal('otpauth://totp/'.(($label) ? $label : '').'?secret='.$secret.'&issuer=Feide');

