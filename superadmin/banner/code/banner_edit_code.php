<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description   : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
extract($_POST);
$obj_setting 			= new common();
$obj 					= new validation();

$currentTimestamp   = getCurrentTimestamp();
 
if ($_SERVER['REQUEST_METHOD']=='POST' && $submit = "submit")
    {
		  $error='';
		    if ($web != "")
		  {
					  $obj->add_fields($web, 'validURL', 'Please Enter A Valid Website Url');
  
			  }
		  if ($_FILES['file']['name'] != "" ) {
		  $obj->add_fields($_FILES['file'], 'ftype=jpg,gif,png', 'Please Upload Valid Image');

		  if ($type == 1 && $_FILES['file']['name'] != "")
		  { 
		  $obj->add_fields($_FILES['file'], "imgwh=988,358", "Please Upload Valid Image(988px X 358px) ");
		  }
		  else if ($type == 2 && $_FILES['file']['name'] != "")
		  {
		  $obj->add_fields($_FILES['file'], "imgwh=198,199", "Please Upload Valid Image(198px X 199px) ");
		  }
		  else if ($type == 3 && $_FILES['file']['name'] != "")
		  {
		  $obj->add_fields($_FILES['file'], "imgwh=191,115", "Please Upload Valid Image(191px X 115px) ");
		  }
		  else if ($type == 4 && $_FILES['file']['name'] != "")
		  {
		  $obj->add_fields($_FILES['file'], "imgwh=167,179", "Please Upload Valid Image(167px X 179px) ");
		  }
		  else if ($type == 5 && $_FILES['file']['name'] != "")
		  {
		  $obj->add_fields($_FILES['file'], "imgwh=300,216", "Please Upload Valid Image(300px X 216px) ");
		  }
		     else if ($type == 6 && $_FILES['file']['name'] != "")
		  {
		  $obj->add_fields($_FILES['file'], "imgwh=278,112", "Please Upload Valid Image(278px X 112px) ");
		  }
		  }
		  
 		  $error = $obj->validate();		   
		  
		  if ($error){
 				$errorMsg= "<font color='#FF0000' family='verdana' size=2>".$error."</font>";
 		   }
		  else
		    {
				if ($_FILES['file']['name'] != "" )
		  {
		  $image_name = $_FILES['file']['name'];
		   $path = LIST_ROOT.'/images/banner/';
          move_uploaded_file($_FILES["file"]["tmp_name"],$path.$_FILES["file"]["name"]);
		  }
		  else
		  {
			  $image_name = $oldimage;
		  }
		 
		   
		  $dataArr  =  array('title'=>$title ,'type'=>$type,'image'=>$image_name,'publish'=>$publish,'website'=>$web);
		  $banner_insert = $obj_setting->update('banner',$dataArr,"id=".$id);
		   $_SESSION['success_msg']='Successfully Edited';

		  echo '<script>location.href="'.DEFAULT_URL.'/superadmin/banner/index.php";</script>'; 

		  exit;
		  
		  
		  }
		}

else{
$fetchSetting 			= $obj_setting->read('banner', 'id = '.$id);
$getSetting 			= $db->fetchNextObject($fetchSetting);
$id	 					= $getSetting->id;
$title	 				= $getSetting->title;
$web				= $getSetting->website;
$type				= $getSetting->type;
$publish 				= $getSetting->publish;
$image				= $getSetting->image;
}
unset($obj_setting);
unset($obj);
			
?>
