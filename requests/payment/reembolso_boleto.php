<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

//require 'moip-sdk-php/vendor/autoload.php';
require 'vendor/autoload.php';

use Moip\Moip;
use Moip\Auth\OAuth;
use Moip\Auth\Connect;


$access_token = '07f6f745d94449e58b440cda189a36a9_v2';
$moip = new Moip(new OAuth($access_token), Moip::ENDPOINT_SANDBOX);

$payment = $moip->payments()->get("PAY-KL88KMKS0GHM");

$amount = 1000;
$type = 'SAVING';
$bank_number = '001';
$agency_number = 4444444;
$agency_check_number = 2;
$account_number = 1234;
$account_check_number = 4;
$customer = $moip->customers()->get("CUS-BRM71TF9GHJE");
$refund = $payment->refunds()
    ->bankAccountPartial(
        $amount,
        $type,
        $bank_number,
        $agency_number,
        $agency_check_number,
        $account_number,
        $account_check_number,
        $customer
    );
echo '<prev>';
  print_r($refund);
