<?php
include("conf/config.inc.php");
include("classes/Paypal.php");

$firstName =  $_POST['first_name'];
$lastName =  $_POST['last_name']; // as we dont have last name in order session 
$cardNumber = $_POST['card_number'];
$cardType = $_POST['card_type'];
$expMonth =  $_POST['month'];
$expMonth = str_pad($expMonth, 2, '0', STR_PAD_LEFT); //Month must be padded with leading zero
$expYear =  $_POST['year'];
$cvv = $_POST['cvv'];
$price = $_POST['car_price'];
$amount = 10;
$countryCode = "US";
$street = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['province'];
$zip = $_POST['postal_code'];
$desc = $_POST['item'];
$carId = $_POST['car_id'];
$caryear = $_POST['caryear'];
$make = $_POST['make'];
$model = $_POST['model'];
$first_name = $_POST['first_name'];
$name = $_POST['first_name']+" "+$_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['telephone'];
$country = $_POST['country'];
$price = $_POST['carprice'];
$exterior_color = $_POST['exterior_color'];
$interior_color = $_POST['interior_color'];
$trim = $_POST['trim'];
//Insert into temp table
$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
mysql_select_db(DB_SYL_NAME, $link) or die('Could not select database.');
$insertQuery = "INSERT INTO temp_car_detail_payment_info ( first_name, last_name, address, telephone, country, city, province, postal_code,email, make, model, year, price, exterior_color, interior_color, trim ) VALUES( '".mysql_real_escape_string($firstName)."', '".mysql_real_escape_string($lastName)."', '".mysql_real_escape_string($street)."', '".mysql_real_escape_string($phone)."', '".mysql_real_escape_string($country)."', '".mysql_real_escape_string($city)."', '".mysql_real_escape_string($state)."', '".mysql_real_escape_string($zip)."', '".mysql_real_escape_string($email)."', '".mysql_real_escape_string($make)."', '".mysql_real_escape_string($model)."', '".mysql_real_escape_string($caryear)."', '".mysql_real_escape_string($price)."', '".mysql_real_escape_string($exterior_color)."', '".mysql_real_escape_string($interior_color)."', '".mysql_real_escape_string($trim)."' )";

$result = mysql_query($insertQuery);

$lastid = mysql_query('select id from temp_car_detail_payment_info order by id DESC limit 0,1');

$lastfetch = mysql_fetch_object($lastid);
$custom = serialize(
            array(
                "pg"=>1, // page
                "ty"=>1, // type
                "id" =>$lastfetch->id 
            )
        );

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
    'EMAIL' => $email,
    'SOFTDESCRIPTORCITY' => $email,
    'COUNTRYCODE' => $phone,
    'STATE' => $state,
    'CITY' => $city,
    'STREET' => $street,
    'ZIP' => $zip,
    'NOTIFYURL' => 'http://seobrand-dev.com/ipn.php',
    'AMT' => $amount,               // This should be equal to ITEMAMT + SHIPPINGAMT
    'CURRENCYCODE' => $currencyCode,       // USD for US Dollars
    'CUSTOM' => $custom       // USD for US Dollars
);
$payInfo = $pay->request('DoDirectPayment',$userdata);
echo json_encode($payInfo);die;
