<?php
include("conf/config.inc.php");
$success = false;
$failure = false;
$warning = false;
if(isset($_POST['payment']) && $_POST['payment'] == 'process'){
    include_once("classes/Paypal.php");

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
    $insertQuery = "INSERT INTO temp_car_detail_payment_info ( first_name, last_name, address, telephone, country, city,  postal_code,email, make, model, year, price, exterior_color, interior_color, trim ) VALUES( '".mysql_real_escape_string($firstName)."', '".mysql_real_escape_string($lastName)."', '".mysql_real_escape_string($street)."', '".mysql_real_escape_string($phone)."', '".mysql_real_escape_string($country)."', '".mysql_real_escape_string($city)."', '".mysql_real_escape_string($zip)."', '".mysql_real_escape_string($email)."', '".mysql_real_escape_string($make)."', '".mysql_real_escape_string($model)."', '".mysql_real_escape_string($caryear)."', '".mysql_real_escape_string($price)."', '".mysql_real_escape_string($exterior_color)."', '".mysql_real_escape_string($interior_color)."', '".mysql_real_escape_string($trim)."' )";

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
        'COUNTRYCODE' => 'US',
        'CITY' => $city,
        'STREET' => $street,
        'ZIP' => $zip,
        'NOTIFYURL' => 'http://seobrand-dev.com/ipn.php',
        'AMT' => $amount,               // This should be equal to ITEMAMT + SHIPPINGAMT
        'CURRENCYCODE' => $currencyCode,       // USD for US Dollars
        'CUSTOM' => $custom       // USD for US Dollars
    );
    $payInfo = $pay->request('DoDirectPayment',$userdata);
    //~ ACK	Acknowledgement status, which is one of the following values:
    //~ Success — A successful operation.
    //~ SuccessWithWarning — A successful operation; however, there are messages returned in the response that you should examine.
    //~ Failure — The operation failed; the response also contains one or more error messages explaining the failure.
    //~ FailureWithWarning — The operation failed and there are messages returned in the response that you should examine.
    if($payInfo['ACK'] == 'Success'){
        $success = "Payment Successfully Done. Please check email for details.";
    }
    if($payInfo['ACK'] == 'SuccessWithWarning'){
        $warning = $payInfo['L_LONGMESSAGE0'];
    }
    if($payInfo['ACK'] == 'Failure' || $payInfo['ACK'] == 'FailureWithWarning'){
        $failure = $payInfo['L_LONGMESSAGE0'];
    }
    mysql_close($link);
}

$carid = $_REQUEST['car_id'];
$ebayid = $common->CustomQuery("Select * from ebay_car where itemId = ".$carid);
$item = '';
if(mysql_num_rows($ebayid) > 0){
	$item = mysql_fetch_object($ebayid);
	if($item->vin == ''){
		$ebayid = fetchEbayCar($carid, "update");
	}
	
}
else{
	$ebayid = fetchEbayCar($carid,"save");
	$item = mysql_fetch_object($ebayid);
}
$specs = array();
$spec = explode("~",$item->stdequip);
foreach($spec as $spex)
{
	$spexs = explode("^",$spex)	;
	$car_meta_values['description'] .= $spexs[0].": ". $spexs[1].", ";
    $specs[$spexs[0]] = $spexs[1];
}
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <link rel="shortcut icon" href="<?php echo DEFAULT_URL; ?>/images/favicon.ico" type="image/x-icon">
            <title>SYL Corporation : Paypal Payment</title>
            <!--scripts-->
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/jquery.validate.min.js"></script>    
            <!--Search scripts-->
            <!-- Bootstrap -->
            <link href="<?php echo DEFAULT_URL; ?>/css/font/fontcabin.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/font/fontroboto.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/font/fontOswald.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/animate.min.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/font-awesome.min.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/style.css" rel="stylesheet">
            <link href="<?php echo DEFAULT_URL; ?>/css/jquery-ui.css" rel="stylesheet">

            <!--[if lt IE 9]-->
            <script src="<?php echo DEFAULT_URL; ?>/js/html5shiv.min.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/respond.min.js"></script>          
            <!--[endif]-->
            <script src="<?php echo DEFAULT_URL; ?>/js/bootstrap.min.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/style.js"></script>
            <script src="<?php echo DEFAULT_URL; ?>/js/wow.min.js"></script>
			<script src="<?php echo DEFAULT_URL; ?>/js/jquery-ui.min.js"></script>
			<!-- Add fancyBox -->
			<!-- Add jQuery library -->
            <script>
                new WOW().init();
            </script>
            <style type="text/css">
                .product-page .product-hide-show-form{display:block;}
                .container{padding:0px;}
                .product-page .product-hide-show-form{margin:0px;border:none;}
                .validateError{  color: red;  border: 1px solid red;  margin: 10px 0px;  padding: 5px 5px;}
                .validateSuccess{  color: green;  border: 1px solid green;  margin: 10px 0px;  padding: 5px 5px;}
                .validateWarning{  color: yellow;  border: 1px solid green;  margin: 10px 0px;  padding: 5px 5px;}
                @media (min-width: 500px) and (max-width:767px){
                    .col-sm-6 {
                      width: 50%;
                      float:left;
                    }
                    .col-sm-3 {
                      width: 25%;
                      float:left;
                    }
                    .col-md-3,.col-md-3 button {
                      float: left;
                      padding: 5px 15px !important;
                    }
                }

            </style>
        </head>
        <body>
            <section class="product-page">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 product-page-couple wow fadeInLeft" data-wow-duration="2s" data-wow-delay=".5s">
                            <div class="col-md-12 product-hide-show-form no-padding">
                                <?php
                                    if($success){
                                        echo '<div class="validateSuccess">'.$success.'</div>';
                                    }
                                    if($warning){
                                        echo '<div class="validateWarning">'.$warning.'</div>';
                                    }
                                    if($failure){
                                        echo '<div class="validateError">'.$failure.'</div>';
                                    }
                                ?>
                                <h2>Pour effectuer la réservation de ce véhicule, s'il vous plaît procéder et de remplir vos informations de facturation et de carte de crédit informations ci-dessous pour traiter les paiements.</h2>
                                <form class="form-horizontal" method="POST" onsubmit="javascript:return validatePayment(event);">
                                    <div class="col-md-12 no-padding product-right-bottom">

                                        <div class="form-group">
                                            <div class="col-sm-6 product-fst-input">
                                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Pre Nom">
                                            </div>
                                            <div class="col-sm-6 product-snd-input">
                                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Nom de famille">
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="col-sm-6 product-fst-input">
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                                            </div>
                                            <div class="col-sm-6 product-snd-input">
                                                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Numero de telephone">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6 product-fst-input">
                                                <input type="text" class="form-control" id="country" name="country" placeholder="Pays">
                                            </div>
                                            <div class="col-sm-6 product-snd-input">
                                                <input type="text" class="form-control" id="city" name="city" placeholder="Ville">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-6 product-fst-input">
                                                <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Code postal">
                                            </div>
                                            <div class="col-sm-6 product-snd-input">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <h2>Information de paiment :</h2>
                                        <div class="form-group">
                                            <div class="col-sm-6 product-fst-input">
                                                <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Numero de carte">
                                            </div>
                                            <div class="col-sm-6 product-snd-input">
                                                <select id="card_type" name="card_type" class="form-control">
                                                    <option value="">Type de cart</option>
                                                    <option value="Visa">Visa</option>
                                                    <option value="MasterCard">MasterCard</option>
                                                    <option value="Discover">Discover</option>
                                                    <option value="Amex">Amex</option>
                                                    <option value="JCB">JCB</option>
                                                    <option value="Maestro">Maestro</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <p>Date d'expiration :</p>
                                            </div>
                                            <div class="col-sm-3 product-fst-input">
                                                <input type="text" class="form-control" maxlength="2" id="month" name="month" placeholder="Mois">
                                            </div>
                                            <div class="col-sm-3 product-duta-input">
                                                <input type="text" class="form-control" maxlength="4" id="year" name="year" placeholder="Année">
                                            </div>
                                            <div class="col-sm-3 product-thrd-input">
                                                <input type="password" class="form-control" maxlength="4" id="cvv" name="cvv" placeholder="cvv">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="1" id="chkTerms"> J’ai lu et j’accepte expressement la <a href="">politique de confidential</a>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group hide-show-bottom">
                                            <div class="col-md-3 no-right-padding">
                                                <h6>Paiement traité par </h6>
                                            </div>
                                            <div class="col-md-3 no-left-padding">
                                                <img src="<?php echo DEFAULT_URL; ?>/images/product/paypal.png">
                                            </div>
                                            <div class="col-md-3 no-left-padding">
                                                <h6>Montant $2,100</h6>
                                            </div>
                                            <div class="col-md-3 no-left-padding">
                                                <button type="submit" class="btn btn-default" value="process" name="payment" id="btnPayment"> Soumettre <i class="fa fa-angle-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="item" name="item" value="<?php echo strtoupper($item->title);?>" />
                                    <input type="hidden" id="itemID" name="itemID" value="<?php echo $carid;?>" />
                                    <input type="hidden" id="caryear" name="caryear" value="<?php echo $item->Year;?>" />
                                    <input type="hidden" id="make" name="make" value="<?php echo $item->Make;?>" />
                                    <input type="hidden" id="model" name="model" value="<?php echo $item->Model;?>" />
                                    <input type="hidden" id="carprice" name="carprice" value="<?php echo $common->ConvertPrice($item->buyItNowPrice);?>" />
                                    <input type="hidden" id="trim" name="trim" value="<?php echo (isset($specs['Trim']))?$specs['Trim']:'NA';?>" />
                                    <input type="hidden" id="interior_color" name="interior_color" value="<?php echo (isset($specs['Interior Color']))?$specs['Interior Color']:'NA';?>" />
                                    <input type="hidden" id="exterior_color" name="exterior_color" value="<?php echo (isset($specs['Exterior Color']))?$specs['Exterior Color']:'NA';?>" />
                                </form>
                            </div>
                        </div>
                    </div><!--  col-md-7 -->
                </div>
            </section>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#year,#cvv").keypress(function (e) {
                        //if the letter is not digit then display error and don't type anything
                        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                            //display error message
                            return false;
                        }
                    });
                    $("#month").keypress(function (e) {
                        //if the letter is not digit then display error and don't type anything
                        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                            //display error message
                            return false;
                        }
                    });
                });

                function validatePayment(e){
                    $('.validateError').remove();
                    $('.validateSuccess').remove();
                    var first_name = $('#first_name').val();
                    var last_name = $('#last_name').val();
                    var address = $('#address').val();
                    var telephone = $('#telephone').val();
                    var country = $('#country').val();
                    var city = $('#city').val();
                    var postal_code = $('#postal_code').val();
                    var email = $('#email').val();
                    var card_number = $('#card_number').val();
                    var card_type = $('#card_type').val();
                    var month = $('#month').val();
                    var year = $('#year').val();
                    var cvv = $('#cvv').val();
                    var carprice = $('#carprice').val();
                    var item = $('#item').val();
                    var year = $('#year').val();
                    var caryear = $('#caryear').val();
                    var make = $('#make').val();
                    var model = $('#model').val();
                    var trim = $('#trim').val();
                    var exterior_color = $('#exterior_color').val();
                    var interior_color = $('#interior_color').val();
                    if(first_name.trim() == ""){
                        $('#first_name').focus();
                        $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrez le nom</div>");
                        return false;
                    }
                    if(last_name.trim() == ""){
                        $('#last_name').focus();
                        $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Nom de famille</div>");
                        return false;
                    }
                    if(address.trim() == ""){
                        $('#address').focus();
                        $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Address</div>");
                        return false;
                    }
                    if(telephone.trim() == ""){
                        $('#telephone').focus();
                        $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Numero de telephone</div>");
                        return false;
                    }
                    if(country.trim() == ""){
                        $('#country').focus();
                        $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Pays</div>");
                        return false;
                    }
                    if(city.trim() == ""){
                        $('#city').focus();
                        $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Ville</div>");
                        return false;
                    }
                    if(postal_code.trim() == ""){
                        $('#postal_code').focus();
                        $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Code Postal</div>");
                        return false;
                    }
                    if(email.trim() == ""){
                        $('#email').focus();
                        $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Email</div>");
                        return false;
                    }
                    if(card_number.trim() == ""){
                        $('#card_number').focus();
                        $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Numero de carte</div>");
                        return false;
                    }
                    if($('#card_type').val() == ''){
                        $('#card_type').focus();
                        $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît sélectionner le type de carte</div>");
                        return false;
                    }
                    if(month.trim() == ""){
                        $('#month').focus();
                        $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Mois</div>");
                        return false;
                    }
                    if(year.trim() == ""){
                        $('#year').focus();
                        $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer Année</div>");
                        return false;
                    }
                    if(cvv.trim() == ""){
                        $('#cvv').focus();
                        $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît entrer cvv</div>");
                        return false;
                    }
                    if($('#chkTerms:checked').length == 0){
                        $('.product-close-icon').after("<div class=\"validateError\">S'il vous plaît accepter politique de confidentialité</div>");
                        return false;
                    }
                    $('#btnPayment').hide();
                    jQuery("#btnPayment").after('<img class="ajaxLoader" src="<?php echo DEFAULT_URL; ?>/images/popup/loading.gif" />');
                }
            </script>
        </body>
    </html>
