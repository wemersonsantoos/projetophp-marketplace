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

$payment = $moip->payments()->get("PAY-OCM623FQTM1I");

$refund = $payment->refunds()->creditCardPartial(1000);

print_r($refund);
