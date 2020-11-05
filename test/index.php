<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

require 'vendor/autoload.php';
require 'define.php';

$client = new Client([
    'base_url' => 'https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout',
    'timeout' => 2.0,
]);

try {
    $client = new GuzzleHttp\Client([
       // 'base_uri' => 'https://checkout.sandbox.bka.sh',
        'headers' => array(
            'Content-Type:application/json',
            'Accept:application/json',
            'username:' . username,
            'password:' . password,
        ),
        'timeout' => 30
    ]);


    $response = $client->post('https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/token/grant', [
        'app_key' => app_key,
        'app_secret' => app_secret,
    ]);

    echo '<pre>';
    print_r($response);
    echo '</pre>';
    exit;


} catch (GuzzleException $e) {
    echo '<pre>';
    print_r($e->getMessage());
    echo '</pre>';
    exit;
}
