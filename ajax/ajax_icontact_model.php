<?php

//

include("../lib/iContactApi.php");

if(isset($_POST['email'])){
	
	$email = $_POST['email'];
	
	iContactApi::getInstance()->setConfig(array(
		'appId'       => '5PzjmGvRsjZiSs9ca4aOs0adVE8Txels', 
		'apiPassword' => '230300AY1', 
		'apiUsername' => 'Sylccorp'
	));

	$oiContact = iContactApi::getInstance();
	$fName = NULL;
	$lName = NULL;
	$phone= NULL;
	$company=NULL;
	$comments=NULL;
	$productName=NULL;
	$cid = $oiContact->CustomaddContact($email,'normal' , NULL ,$fName,$lName, NULL ,NULL , NULL, NULL , NULL , NULL ,$phone,NULL,$company,$comments,$productName);
	$res = $oiContact->subscribeContactToList($cid->contactId, 80444, 'normal');
	
	if(isset($res[0]->subscriptionId)){
		
		echo "<div class='contactSuccess'>Thank you for subscription.</div>";
		
	}else{
		echo "<div class='contactFailure'>Email Already added.</div>";
		
	}
	
	die;

}else{
	
	
}
