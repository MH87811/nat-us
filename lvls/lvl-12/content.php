<?php
$secret = 'something';

$data = [
        'show_password' => 'no'
];

$json = json_encode($data);

function encrypt(string $data, string $key): string
{
    $result = '';
    for ($i = 0; $i < strlen($data); $i++) {
        $result .= $data[$i] ^ $key[$i % strlen($key)];
    }
    return $result;
}
$encrypted = encrypt($json, $secret);
$encoded = base64_encode($encrypted);

setcookie('data', $encoded);

if (isset($_COOKIE['data'])) {
    $decoded = base64_decode($_COOKIE['data']);
    $decrypted = encrypt($decoded, $secret);

    $data = json_decode($decrypted, true);

    if(($data['show_password'] ?? 'no') === 'yes') {
        echo "Password: $secret";
    } else {
        echo 'find the password';
    }
}
