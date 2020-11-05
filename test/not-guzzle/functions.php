<?php

/**
 * Generate Token
 * @return bool|string
 */
function generateToken()
{
    $tokenUrl = base_url . "checkout/token/grant";
    $post_token = array(
        'app_key' => app_key,
        'app_secret' => app_secret
    );


    $url = curl_init($tokenUrl);
    $postToken = json_encode($post_token);
    $header = array(
        'Content-Type:application/json',
        'password:' . password,
        'username:' . username
    );

    curl_setopt($url, CURLOPT_HTTPHEADER, $header);
    curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url, CURLOPT_POSTFIELDS, $postToken);
    curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
    $resultData = curl_exec($url);
    curl_close($url);
    return $resultData;
}


/**
 * Get Token
 * @param $tokenObject
 * @return mixed
 */
function getToken($tokenObject)
{
    $resultData = generateToken();
    $object = json_decode($resultData, false);
    return $object->$tokenObject;
}

/**
 * Refresh Token
 * @param $refresh_token
 * @return mixed
 */
function refreshToken($refresh_token)
{
    $tokenUrl = base_url . "checkout/token/refresh";
    $post_token = array(
        'app_key' => app_key,
        'app_secret' => app_secret,
        'refresh_token' => $refresh_token
    );

    $url = curl_init($tokenUrl);
    $postToken = json_encode($post_token);
    $header = array(
        'Content-Type:application/json',
        'password:' . password,
        'username:' . username
    );

    curl_setopt($url, CURLOPT_HTTPHEADER, $header);
    curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url, CURLOPT_POSTFIELDS, $postToken);
    curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
    $resultData = curl_exec($url);
    curl_close($url);
    $resultObject = json_decode($resultData);
    return $resultObject->id_token;
}

/**
 * Create Tokenized Payment & Url
 * @param $id_token
 * @return mixed
 */
function createPayment($id_token)
{
    $paymentUrl = base_url . "tokenized/checkout/create";
    $url = curl_init($paymentUrl);
    $header = array(
        'Content-Type:application/json',
        'Accept:application/json',
        'authorization:' . $id_token,
        'x-app-key:' . app_key
    );

    $amount = rand(10, 15);
    $postToken = array(
        'mode' => 0011,
        'payerReference' => 'This is test',
        'callbackURL' => 'https://github.com/arif98741',
        'amount' => $amount,
        'currency' => 'BDT',
        'intent' => 'intent',
        'merchantInvoiceNumber' => generateRandomString(10)
    );
    $postTokenX = json_encode($postToken);

    curl_setopt($url, CURLOPT_HTTPHEADER, $header);
    curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($url, CURLOPT_POSTFIELDS, $postTokenX);
    curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
    $resultData = curl_exec($url);
    curl_close($url);
    return json_decode($resultData, true);

}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
