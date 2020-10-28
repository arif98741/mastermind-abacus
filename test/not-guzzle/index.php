<?php
include '../define.php';
include 'functions.php';
$refreshToken  = getToken('refresh_token');
$id_token = refreshToken($refreshToken);
$payment = createPayment($id_token);
echo '<pre>';
print_r($payment);
echo '</pre>';
exit;

