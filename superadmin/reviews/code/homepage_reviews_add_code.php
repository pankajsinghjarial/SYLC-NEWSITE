<?php
/*************************************************************************************************************
#Coder         : Ishan Siddiqui
#Description   : This Code is used to Manage Homepage reviews
*************************************************************************************************************/
include(LIST_ROOT."/getEntity.php");
extract($_GET);
extract($_POST);


$obj_setting 		= new common();
$obj 				= new validation();

$all_reviews = $obj_setting->customQuery("SELECT * FROM reviews ");

$reviewslist =array();
while($review = mysql_fetch_object($all_reviews)){
	
	$review_id = $review->id;
	$review_make = $review->make_name;
	$review_model = $review->model_name;
	$review_year = $review->year;
	$name = $review_make.' '.$review_model.' '.$review_year;
	$reviewslist[$review_id] = $name; 
}


$check_home_review_one = $obj_setting->getValueByField("superadmin_options" ,"option_name='HomeReviewOne'" ,"option_value" );
$check_home_review_two = $obj_setting->getValueByField("superadmin_options" ,"option_name='HomeReviewTwo'" ,"option_value" );


if($_SERVER['REQUEST_METHOD']=='POST')
    {
		 
		 
		$error='';
		  
		$obj->add_fields($HomeReviewOne, 'req', 'Please Select a Review');
		$obj->add_fields($HomeReviewTwo, 'req', 'Please Select a Review');
		$error = $obj->validate();		   
		

		  
		  
		if($error){
 			$errorMsg = "<font color='#FF0000' family='verdana' size=2>Please Select values in both selectboxes.</font>";
 				
 		}  
		else
		{
			$_SESSION['success_msg'] = 'New review has been saved successfully.';
			
			if($check_home_review_one) {
				$settings_save	= $obj_setting->customQuery("UPDATE `superadmin_options` SET `option_name`='HomeReviewOne',`option_value`='$HomeReviewOne'  WHERE  `option_name`='HomeReviewOne'");
			} else {
				$settings_save	= $obj_setting->customQuery("INSERT INTO `superadmin_options`(`option_name`, `option_value`) VALUES ('HomeReviewOne' , '".trim($HomeReviewOne)."')");
			}
			if($check_home_review_two) {
				$settings_save	= $obj_setting->customQuery("UPDATE `superadmin_options` SET `option_name`='HomeReviewTwo',`option_value`='$HomeReviewTwo'  WHERE  `option_name`='HomeReviewTwo'");
			} else {
				$settings_save	= $obj_setting->customQuery("INSERT INTO `superadmin_options`(`option_name`, `option_value`) VALUES ('HomeReviewTwo' , '".trim($HomeReviewTwo)."')");
			}
			echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/reviews/homepage_reviews.php";</script>'; 
			exit;
			
		}
	}
		
	
?>
