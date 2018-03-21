<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

require 'vendor/autoload.php';

use Moip\Moip;
use Moip\Auth\OAuth;
use Moip\Auth\Connect;
//$access_token = '92a4a85e21604967b1e948a3b65032ec_v2';
$moip = new Moip(new OAuth($access_token), Moip::ENDPOINT_SANDBOX);

try {
$connect = new Connect('https://www.moip.com.br/redirect', 'APP-Q0Q3LJYHJXID', true, Connect::ENDPOINT_SANDBOX);

//$connect->setClientSecret('');
//$connect->setCode(S_GET['']);

// Set the permissions scope
$connect->setScope(Connect::RECEIVE_FUNDS)
	->setScope(Connect::REFUND)
	->setScope(Connect::MANAGE_ACCOUNT_INFO)
  ->setScope(Connect::RETRIEVE_FINANCIAL_INFO);

// Redirecting user to URL generated
header('Location: '.$connect->getAuthUrl());
} catch (\Moip\Exceptions\UnautorizedException $e) {
	    //StatusCode 401
	  echo $e->getMessage();
} catch (\Moip\Exceptions\ValidationException $e) {
        //StatusCode entre 400 e 499 (exceto 401)
            printf($e->__toString());
} catch (\Moip\Exceptions\UnexpectedException $e) {
                //StatusCode >= 500
                    echo $e->getMessage();
}
