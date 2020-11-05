<?php
include '../define.php';
include 'functions.php';
$id_token  = getToken('refresh_token');
$paymentResponse = createPayment($id_token);
