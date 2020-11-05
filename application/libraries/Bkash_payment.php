<?php

use Shipu\Bkash\Apis\Checkout\CheckoutBaseApi;
use Shipu\Bkash\Enums\BkashKey;
use Shipu\Bkash\Managers\Checkout;

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('vendor/autoload.php');

class Bkash_payment
{

    private $ci;
    public $api_config;
    public $token;

    public function __construct()
    {

    }

    /*
     * Get Bkash Token
     */
    public function createPayment($data)
    {
        require_once 'composer_load.php';
        $checkout = new Checkout($this->bkashConfig());
        $requestParams = json_encode([
            'data' => $data['amount'],
            'ref' => $data['ref_no']
        ]);

        return $checkout->payment()->create($data['amount'], $data['ref_no'])->query()->toJson();
    }

    public function executePayment($paymentId)
    {
        require_once 'composer_load.php';
        $checkout = new Checkout($this->bkashConfig());
        return $checkout->payment()->execute($paymentId)->query()->toJson();
    }

    /**
     * Save Payment Request Api Log
     * @param $api
     * @param $header
     * @param $requestParams
     * @param $response
     * @param $gateway
     * @param $amount
     * @param string $method
     */
    private function apiLog($api, $header, $requestParams, $response, $gateway, $amount, $method = 'post')
    {
        //BUG:: need to fix
        $array = [
            'method' => $method,
            'gateway' => $gateway,
            'api' => $api,
            'header' => $header,
            'requestParams' => $requestParams,
            'response' => $response,
            'amount' => $amount,
            'request_time' => date('Y-m-d H:i:s')
        ];
        $db = $this->load->database('default', TRUE);
        $db->insert('voucher_head', $array);
    }

    /**
     * Configuration
     * @return array[]
     */
    private function bkashConfig()
    {
        return [
            BkashKey::SANDBOX => true,
            BkashKey::VERSION => "v1.2.0-beta",
            BkashKey::APP_KEY => "5nej5keguopj928ekcj3dne8p",
            BkashKey::APP_SECRET => "1honf6u1c56mqcivtc9ffl960slp4v2756jle5925nbooa46ch62",
            BkashKey::USER_NAME => "testdemo",
            BkashKey::PASSWORD => "test%#de23@msdao",
            BkashKey::SANDBOX_SCRIPT => "https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js",
            BkashKey::PRODUCTION_SCRIPT => env("BKASH_CHECKOUT_PRODUCTION_SCRIPT", ""),
            BkashKey::TOKEN => function ($config) {
                $checkoutApi = new CheckoutBaseApi($config);
                $grandToken = $checkoutApi->grantToken();
                return $grandToken()->id_token;
            }
        ];
    }


}

?>