<?php
include("conf/config.inc.php");
include("classes/Paypal.php");

$firstName =urlencode( $_POST['first_name']);
$lastName =urlencode( $_POST['last_name']); // as we dont have last name in order session 
$cardNumber = urlencode($_POST['card_number']);
$cardType =urlencode($_POST['card_type']);
$expMonth =urlencode( $_POST['month']);
$expMonth = str_pad($expMonth, 2, '0', STR_PAD_LEFT); //Month must be padded with leading zero
$expYear =urlencode( $_POST['year']);
$cvv = urlencode($_POST['cvv']);
//$amount = urlencode($_POST['car_price']);
$amount = 10;
$countryCode = "US";
$street = urlencode($_POST['address']);
$city = urlencode($_POST['city']);
$state = urlencode($_POST['province']);
$zip = urlencode($_POST['postal_code']);
$desc = urlencode($_POST['item']);
$pay = new Paypal();
$currencyCode = 'USD';
 
 $userdata = array(
   'IPADDRESS' => $_SERVER['REMOTE_ADDR'],        
   'PAYMENTACTION' => 'Sale',
   'CREDITCARDTYPE' => $cardType ,
   'DESC'=> $desc,
   'ACCT' => $cardNumber,
   'EXPDATE' => $expMonth.$expYear,          // Make sure this is without slashes (NOT in the format 07/2017 or 07-2017)
   'CVV2' => $cvv,
   'FIRSTNAME' => $firstName,
   'LASTNAME' => $lastName,
   'COUNTRYCODE' => $countryCode,
   'STATE' => $state,
   'CITY' => $city,
   'STREET' => $street,
   'ZIP' => $zip,
   'AMT' => $amount,               // This should be equal to ITEMAMT + SHIPPINGAMT
   'CURRENCYCODE' => $currencyCode       // USD for US Dollars
  );
 $payInfo = $pay->request('DoDirectPayment',$userdata);
 echo json_encode($payInfo);die;
