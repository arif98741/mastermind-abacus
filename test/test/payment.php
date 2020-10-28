<?php
require '../define.php';
require 'index.php';
//$auth = generateToken();
$auth = 'eyJraWQiOiJmalhJQmwxclFUXC9hM215MG9ScXpEdVZZWk5KXC9qRTNJOFBaeGZUY3hlamc9IiwiYWxnIjoiUlMyNTYifQ.eyJzdWIiOiJiM2Q4OGVkZC0xNzc2LTRhMjEtYWZlMi0zN2FkZTk3NzEyZDMiLCJhdWQiOiI1bmVqNWtlZ3VvcGo5Mjhla2NqM2RuZThwIiwiZXZlbnRfaWQiOiJhZDE2MGMyNy1lMTY3LTQ2YjMtYTNmMS1jMzU4NjM3YmJiMWUiLCJ0b2tlbl91c2UiOiJpZCIsImF1dGhfdGltZSI6MTYwMzkxMjE0MywiaXNzIjoiaHR0cHM6XC9cL2NvZ25pdG8taWRwLmFwLXNvdXRoZWFzdC0xLmFtYXpvbmF3cy5jb21cL2FwLXNvdXRoZWFzdC0xX2tmNUJTTm9QZSIsImNvZ25pdG86dXNlcm5hbWUiOiJzYW5kYm94VGVzdFVzZXIiLCJleHAiOjE2MDM5MTU3NDMsImlhdCI6MTYwMzkxMjE0M30.KUSIMPlIgir6BPoM6_97fI_DIR70-CgxTXjUaCer_8EOQS9KQXpKst6yKwojeV2Pyun11S8uVirTCfFxkxwE0mmEBX5mY1BFCJFkPNen_KixzPBvVyY-dbo_CgN0HstEPx3K2-6RQFYuJ1u7rPBaxWF-urlHQJPNFLGIqPvKIlhWfbFnNB82P_rO14qRgWbgEr9p0QLuV0QcfADg4bDOC8dLZPWJhsixVaeDybbDbD8EVvHR6aLdSg2OtrO74kURiJGDWh4-VefYFWmMJiKgkkesQwQenSo2BSoh0Qguea7g1vkBUZQIc_9HwZLrNAZOOUluvmTiLD9Pzi_i1k5Ixg';
if (!isset($_SESSION['auth'])) {

    $_SESSION['auth'] = $auth;
}

//create payment start
$requestBody = array(
    'mode' => '0011',
    'amount' => '10',
    'currency' => 'BDT',
    'intent' => 'sale',
    'payerReference' => '018xxxxxxxxx',
    'merchantInvoiceNumber' => '7657868767',
);
$paymentUrl = curl_init('https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/payment/create');
$requestbodyJson = json_encode($requestBody);

$header = array(
    'Content-Type: application/json',
    'Authorization: ' . $auth, //coming from toke generation page
    'X-APP-Key: ' . app_key
);
curl_setopt($paymentUrl, CURLOPT_HTTPHEADER, $header);
curl_setopt($paymentUrl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($paymentUrl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($paymentUrl, CURLOPT_POSTFIELDS, $requestbodyJson);
curl_setopt($paymentUrl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($paymentUrl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
$resultData = curl_exec($paymentUrl);
curl_close($paymentUrl);


$obj = json_decode($resultData);
//create payment end


//execute payment start
$paymentID = $obj->paymentID;
$requestBody = array(
    'paymentID' => $paymentID
);
$executePaymentUrl = curl_init('https://checkout.sandbox.bka.sh/v1.2.0-beta/checkout/payment/execute');
$header = array(
    'Content-Type: application/json',
    'Authorization: ' . $auth, //coming from toke generation page
    'x-app-key: ' . app_key
);

curl_setopt($executePaymentUrl, CURLOPT_HTTPHEADER, $header);
curl_setopt($executePaymentUrl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($executePaymentUrl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($executePaymentUrl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($executePaymentUrl, CURLOPT_POSTFIELDS, $requestbodyJson);
curl_setopt($executePaymentUrl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
$resultData = curl_exec($executePaymentUrl);
curl_close($executePaymentUrl);
echo $resultData;
exit;