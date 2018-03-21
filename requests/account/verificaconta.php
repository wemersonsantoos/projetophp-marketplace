<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

require 'vendor/autoload.php';

use Moip\Moip;
use Moip\Auth\OAuth;

try {
$access_token = '07f6f745d94449e58b440cda189a36a9_v2';
$moip = new Moip(new OAuth($access_token), Moip::ENDPOINT_SANDBOX);

$cpf = '451.309.220-34';

$response = $moip->accounts()->checkExistence($cpf);

if ($response == 1) {
    echo $cpf;
}

else
echo "Não possui conta Moip.";

} catch(\Moip\Exceptions\UnautorizedException $e) {
    //StatusCode 401
    echo $e->getMessage();
} catch (\Moip\Exceptions\ValidationException $e) {
    //StatusCode entre 400 e 499 (exceto 401)
    echo "CPF Inválido";
} catch (\Moip\Exceptions\UnexpectedException $e) {
    //StatusCode >= 500
    echo $e->getMessage();
}
