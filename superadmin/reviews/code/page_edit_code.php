<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description   : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
$obj_setting 			= new common();
$obj 					= new validation();

#Code to Fetch seleted ID's data  
$fetchSetting 			= $obj_setting->read('reviews', 'id = '.$id);
$getSetting 			= $db->fetchNextObject($fetchSetting); 
$id	 					= $getSetting->id;
$description			= $getSetting->description;
$nameToShow				= $getSetting->title;
$title                  = $getSetting->title;
$publish = 1;


//$publish 				= $getSetting->publish;
$image_url 					= $getSetting->desc;

extract($_POST);

/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();
#saving data in database after validation
if($_SERVER['REQUEST_METHOD']=='POST')
    {
		  $error	=	'';
		  
		  $obj->add_fields($name, 'req', 'Please Enter Page Title');
		  $obj->add_fields($desc, 'req', 'Please Enter Description');			  
 		  $error = $obj->validate();		   
		  
		  if($error){
		  
 				$errorMsg= "<font color='#FF0000' family='verdana' size=2>Please fill all required fields.</font>";
 		   }
		  else
		    {
				if(trim($slug)){
						$slug = makeAlias($slug);
				}else{
						$slug = makeAlias($name);
				}
				
				if(trim($metatitle)){
						$metatitle = $metatitle;
				}else{
						$metatitle = $name;
				}
				
				if(isset($searchtext) and $searchtext!=''){
						$addToUrl = '?searchtext='.$searchtext.'&searchcombo='.$searchcombo;
				}else{
						$addToUrl = '';
				}
				
				$_SESSION['success_msg'] = 'Page has been edited successfully.';
				$dataArr = array('name'=>$name,'slug'=>$slug,'desc'=>$desc, 'publish'=>$publish,'metatitle'=>$metatitle,'metakeyword'=>$metakeyword,'metadescription'=>$metadescription,'can_delete'=>$can_delete,'page_cat'=>$page_cat);
				$update_site		=	$obj_setting->update(TBL_PAGE, $dataArr,' id='.$id);
				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/page/index.php'.$addToUrl.'";</script>'; 
				exit;
			}
		}
		
unset($obj_setting);
unset($obj);
			
?>
