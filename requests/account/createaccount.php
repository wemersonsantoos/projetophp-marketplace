<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

require 'vendor/autoload.php';

use Moip\Moip;
use Moip\Auth\OAuth;

$access_token = '92a4a85e21604967b1e948a3b65032ec_v2';
$moip = new Moip(new OAuth($access_token), Moip::ENDPOINT_SANDBOX);

$street = 'Rua de teste';
$number = 123;
$district = 'Bairro';
$city = 'Sao Paulo';
$state = 'SP';
$zip = '01234567';
$complement = 'Apt. 23';
$country = 'BRA';
$area_code = 11;
$phone_number = 66778899;
$country_code = 55;
$identity_document = '4737283560';
$issuer = 'SSP';
$issue_date = '2015-06-23';
$account = $moip->accounts()
    ->setName('Fulano')
    ->setLastName('De Tal')
    ->setEmail((string)time().'@email.com')
    ->setIdentityDocument($identity_document, $issuer, $issue_date)
    ->setBirthDate('1988-12-30')
    ->setTaxDocument('16262131000')
    ->setType('MERCHANT')
    ->setPhone($area_code, $phone_number, $country_code)
    ->addAlternativePhone(11, 66448899, 55)
    ->addAddress($street, $number, $district, $city, $state, $zip, $complement, $country)
    ->setCompanyName('Empresa Teste', 'Teste Empresa ME')
    ->setCompanyOpeningDate('2011-01-01')
    ->setCompanyPhone(11, 66558899, 55)
    ->setCompanyTaxDocument('69086878000198')
    ->setCompanyAddress('Rua de teste 2', 123, 'Bairro Teste', 'Sao Paulo', 'SP', '01234567', 'Apt. 23', 'BRA')
    ->setCompanyMainActivity('82.91-1/00', 'Atividades de cobranças e informações cadastrais')
    ->create();
print_r($account);
