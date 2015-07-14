<?php

include("vendor/autoload.php");

// encode the Google Authenticator secret into an array
$plaintext = array("secret" => $argv[1]);

// initialize JWE object
$jwe = new JOSE_JWE(json_encode($plaintext));

// encrypt with Feide's key and proper algorithms
$jwe->encrypt(file_get_contents('feide.pem'), 'RSA-OAEP', 'A128CBC-HS256');

// print the result
echo $jwe->toString()."\n";
