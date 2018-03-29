<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

//require 'moip-sdk-php/vendor/autoload.php';
require 'vendor/autoload.php';

use Moip\Moip;
use Moip\Auth\OAuth;
use Moip\Auth\Connect;


$access_token = 'd15f7f83aa704cc0adcf43a06df7806b_v2';
$moip = new Moip(new OAuth($access_token), Moip::ENDPOINT_SANDBOX);

try {
$payment = $moip->payments()->get("PAY-9YK0GZX6CR4Y");
$escrow = $payment->escrows()->release();
print_r($payment);
} catch (Exception $e) {
printf($e->__toString());
}
