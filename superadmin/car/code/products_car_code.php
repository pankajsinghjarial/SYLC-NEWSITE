<?php
$obj_setting = new common();
$firstVid = $obj_setting->getValueByField("superadmin_options" ,"option_name='firstVid'" ,"option_value" );
$secondVid = $obj_setting->getValueByField("superadmin_options" ,"option_name='secondVid'" ,"option_value" );
    if(isset($_POST) && $_POST['submit'] == 'submit'){
	foreach ($_POST as $key=>$value){
		if ($value != 'submit' ){
		 $checkExist = $obj_setting->getValueByField("superadmin_options" ,"option_name='".trim($key)."'" ,"option_value" );
		 if($checkExist) {
		    $settings_save	= $obj_setting->customQuery("UPDATE `superadmin_options` SET `option_name`='$key',`option_value`='$value'  WHERE  `option_name`='".$key."'");
		} else {
		    $settings_save	= $obj_setting->customQuery("INSERT INTO `superadmin_options`(`option_name`, `option_value`) VALUES ('".trim($key)."' , '".trim($value)."')");
		}
	    }
	}
   
    if($settings_save){
	 echo '<script>location.href = "'.DEFAULT_ADMIN_URL.'/car/productcars.php?response=success";</script>';
    } else {
	 echo '<script>location.href = "'.DEFAULT_ADMIN_URL.'/car/productcars.php?response=error";</script>';
    }
}

?>
