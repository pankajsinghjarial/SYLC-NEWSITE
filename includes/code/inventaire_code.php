<?php  
extract($_GET);
//Car attributes
$item = $common->getCar($id);

//Shipping Calculations
$prestation = 3000;
$transportUSA = 1200;
$transportUSAFermee = 1800;
$transport = 2000;
$bank = 260;
$frais = 780;
$carPrice = $item['price'];
$year = $item['madeYear'];
$initPrice = ( ($carPrice + $common->ConvertPrice($transport)) * 0.10 * 0.20);
if($year < 1985){
    $initPrice = ( ($carPrice + $common->ConvertPrice($transport)) * 0.05);
}
$priceTTC = $initPrice + $carPrice + $common->ConvertPrice($transport)+ $common->ConvertPrice($prestation) + $common->ConvertPrice($transportUSA) + $common->ConvertPrice($bank) + $frais;


//Youtube Video Section
$firstVid = $common->getValueByField("superadmin_options" ,"option_name='firstVid'" ,"option_value" );
$secondVid = $common->getValueByField("superadmin_options" ,"option_name='secondVid'" ,"option_value" );
