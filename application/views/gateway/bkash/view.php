<?php

$data = $paymentData;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bkash Payment for - <?php echo $data['order_code']; ?></title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        html {
            margin: 0;
            padding: 0;
        }

        #bKashFrameWrapper {
            width: 100% !important;
            height: 100% !important;
        }

        .swal-overlay--show-modal {
            opacity: 1;
            pointer-events: auto;
            z-index: 9999999999999;
        }
    </style>
</head>
<body>

<span id="bKash_button"></span>

<script type="text/javascript">
    $(function () {
        // Change script url when it's live
        var scriptLink = 'https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js';

        var successUrl = '<?=$data["success_url"]?>';
        var failedUrl = '<?=$data["failed_url"]?>';
        var amount = '<?=$data["amount"]?>';
        var ref_no = '<?=$data["ref_no"]?>';

        var url = {
            base_url: 'https://mastermindabacusbd.com/',
        };


        function errorMessage(response) {
            let msg = '?n_type=error';
            if (typeof response.errorMessage === 'undefined') {
                msg += '&n_key=payment_failed';
            } else {
                let errorMessage = '&n_msg=Sorry, your payment was unsuccessful !!! ' + data.errorMessage;
                let errorCode = data.errorCode;
                let bkashErrorCode = [2001, 2002, 2003, 2004, 2007, 2008, 2009, 2011, 2012, 2013, 2020,
                    2021, 2022, 2025, 2027, 2028, 2030, 2031, 2032, 2033, 2036, 2037, 2038, 2040, 2041, 2042,
                    2043, 2044, 2045, 2046, 2047, 2048, 2049, 2050, 2051, 2052, 2053, 2054, 2055, 2056
                ];

                if (bkashErrorCode.includes(errorCode)) {
                    errorMessage = '&n_key=payment_failed';
                } else if (errorCode == 2029) {
                    errorMessage = '&n_msg=Sorry, your payment was unsuccessful !!! For same amount transaction, please try again after 10 minutes.';
                }

                msg += errorMessage;
            }
            return msg;
        }


        $.getScript(scriptLink)
            .done(function (script) {

                var paymentID = null;
                var bkashPaymentRequest = {
                    amount: amount,
                    intent: "sale",
                    ref_no: ref_no,
                    currency: "BDT",
                };

                //call the bkash init function
                bKash.init({
                    paymentMode: 'checkout',
                    paymentRequest: bkashPaymentRequest,
                    createRequest: function (request) {
                        // write your logic
                        $.ajax({
                            url: url.base_url + 'feespayment/createbkashpayment',
                            type: 'POST',
                            data: request,
                            success: function (response) {
                                data = JSON.parse(response);

                                if (data && data.paymentID != null) {
                                    paymentID = data.paymentID;
                                    bKash.create().onSuccess(data);
                                } else {
                                    bKash.create().onError();

                                    window.location.href = failedUrl + "&n_type=error&n_msg=Sorry, your payment was unsuccessful !!! Invalid Payment Id";

                                }
                            },
                            error: function (xhr, textStatus, errorThrown) {
                                bKash.create().onError();

                                window.location.href = failedUrl + "&n_type=error&n_msg=Sorry, your payment was unsuccessful !!! Invalid Request";

                            }
                        });

                    },
                    executeRequestOnAuthorization: function () {
                        $.ajax({
                            url: url.base_url + 'feespayment/executebkashpayment',
                            type: 'POST',
                            data: {paymentId: paymentID},
                            success: function (response) {
                                console.log(response);
                                data = JSON.parse(response);
                                if (data && data.errorCode == '2029') {
                                    swal({
                                        title: "Error",
                                        icon: 'error',
                                        text: 'Payment Unsuccessful! ' + data.errorMessage,
                                    }).then(function () {
                                        // Redirect the user
                                        window.location.href = failedUrl + "&n_type=error&n_msg=failed";
                                    });
                                    return false;
                                }

                                if (data && data.paymentID != null) {
                                    paymentID = null;
                                    window.location = successUrl + "&n_type=success&n_key=payment_done";
                                } else {
                                    bKash.execute().onError();

                                    window.location = failedUrl + errorMessage(data);

                                    // window.location.href = failedUrl + errorMessage(data);

                                }
                            },
                            error: function (xhr) {
                                data = xhr.responseJSON;
                                bKash.execute().onError();

                                window.location = failedUrl + errorMessage(data);

                                // window.location.href = failedUrl + errorMessage(data);

                            }
                        });

                    },
                    onClose: function () {

                        window.location = failedUrl + "&n_type=error&n_msg=Sorry, your payment was unsuccessful !!! Please try again !!!";

                        //  window.location.href = failedUrl + "&n_type=error&n_msg=Sorry, your payment was unsuccessful !!! Please try again !!!";

                    }
                });

                $('#bKash_button').click();

            });
        // //window.location.replace(window.location);
    });
</script>
</body>
</html>
