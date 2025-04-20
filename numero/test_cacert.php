<?php
$caCertPath = 'C:/certificats/cacert.pem';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.google.com");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CAINFO, $caCertPath);

$output = curl_exec($ch);

if ($output === false) {
    echo 'Erreur cURL : ' . curl_error($ch);
} else {
    echo 'Connexion HTTPS réussie.';
}

curl_close($ch);
?>
