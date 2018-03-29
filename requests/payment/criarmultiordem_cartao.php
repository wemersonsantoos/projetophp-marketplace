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


$customer = $moip->customers()->setOwnId(uniqid())
   ->setFullname('Fulano de Sak')
   ->setEmail('falano.sak@email.com')
   ->setBirthDate('1988-12-30')
   ->setTaxDocument('22222222222')
   ->setPhone(11, 66778899)
   ->addAddress('SHIPPING',
               'Avenida Brigadeiro Faria Lima', 3064,
               'Jardim Paulistano', 'Sao Paulo', 'SP',
               '01451001', 8)
   ->create();


$order = $moip->orders()->setOwnId(uniqid())
    ->addItem("Camisa Verde e Amarelo - Brasil", 1, "Seleção Brasileira",2000)
 ->setShippingAmount(2000)
 ->setCustomer($customer)
 ->addReceiver('MPA-03C452EB9B4C', 'PRIMARY', 0, 90, true)
 ->addReceiver("MPA-92DC9F7EF8B5", "SECONDARY", 0, 10, false);

$order2 = $moip->orders()->setOwnId(uniqid())
    ->addItem("Camisa Preta - Alemanha", 1, "Camiseta da Copa 2014", 1000)
 ->setShippingAmount(3000)->setAddition(1000)
 ->setCustomer($customer)
 ->addReceiver('MPA-03C452EB9B4C', 'PRIMARY', 0, 90, true)
 ->addReceiver("MPA-92DC9F7EF8B5", "SECONDARY", 0, 10, false);

$multiorder = $moip->multiorders()
 ->setOwnId(uniqid())
 ->addOrder($order)
 ->addOrder($order2)
 ->create();
echo '<pre>';
print_r($multiorder);


 $holder = $moip->holders()->setFullname('Jose Santos')
 ->setBirthDate("1990-10-10")
 ->setTaxDocument('22222222222', 'CPF')
 ->setPhone(11, 66778899, 55);
 $holder = $moip->holders()->setFullname('Jose Santos')
  ->setBirthDate("1990-10-10")
  ->setTaxDocument('22222222222', 'CPF')
  ->setPhone(11, 66778899, 55);

$payment = $multiorder->multipayments()->setCreditCard(05, 18, '5555666677778884', '123', $holder)

//->setEscrow('Custódia de pagamento')
  ->execute();
echo '<prev>';
   print_r($payment);
