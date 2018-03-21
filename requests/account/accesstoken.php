<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

require 'vendor/autoload.php';

use Moip\Moip;
use Moip\Auth\OAuth;
use Moip\Auth\Connect;

$redirect_uri = 'https://www.moip.com.br/redirect';
$client_id = 'APP-Q0Q3LJYHJXID';
$scope = true;
$connect = new Connect($redirect_uri, $client_id, $scope, Connect::ENDPOINT_SANDBOX);
$client_secret = '6fabb599a8b14ffabc185ff3d93d16cb';
$connect->setClientSecret($client_secret);
// $response_code = [input_function];
// $code = $response_code;
$code = '576f3ca5683343900543f383c1a03ed7726d86f6';
$connect->setCode($code);
$auth = $connect->authorize();
print_r($auth);
