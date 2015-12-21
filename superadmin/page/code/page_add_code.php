<?php
/*************************************************************************************************************
#Coder         : Kapil Verma
#Description : This Code is used to Manage Pages
*************************************************************************************************************/

extract($_GET);
extract($_POST);

$obj_setting 		= new common();
$obj 				= new validation();

#Code to Fetch page category data  
#END
$publish = 1;
/* Get Current Date Time Stamp */ 
$currentTimestamp   = getCurrentTimestamp();
 
if($_SERVER['REQUEST_METHOD']=='POST')
    {
		$error='';
		  
		$obj->add_fields($name, 'req', 'Please Enter Page Title');
		$obj->add_fields($desc, 'req', 'Please Enter Description');
		$obj->add_fields($banner, 'banner', 'Please Enter Banner 1');
		$obj->add_fields($secbanner, 'secbanner', 'Please Enter Banner 2');
		$obj->add_fields($_FILES['banner'], 'ftype=jpg,gif,png', 'Please Upload Valid Banner1');
	//	$obj->add_fields($_FILES['banner'], "imgwh=1250,300", "Please Upload Valid Banner1(1250pxX00px)");
		
		$obj->add_fields($_FILES['secbanner'], 'ftype=jpg,gif,png', 'Please Upload Valid Banner2');
	//	$obj->add_fields($_FILES['secbanner'], "imgwh=145,350", "Please Upload Valid Banner2(145pxX350px)");		  
 		$error = $obj->validate();		   
		  
		if ($error) {
 				$errorMsg= "<font color='#FF0000' family='verdana' size=2>Please fill all required fields.</font>";
 		} else {
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
				if ($_FILES['banner']['name'] != "" ) {
				  $image_name = time().$_FILES['banner']['name'];
				  $path = LIST_ROOT.'/images/pages/';
				  move_uploaded_file($_FILES["banner"]["tmp_name"],$path.$image_name);
				} else {
					$image_name = $oldbanner;
				}
				
				if ($_FILES['secbanner']['name'] != "" ) {
				  $secBannerName = time().$_FILES['secbanner']['name'];
				  $path = LIST_ROOT.'/images/pages/';
				  move_uploaded_file($_FILES["secbanner"]["tmp_name"],$path.$secBannerName);
				} else {
					$secBannerName = $oldsecbanner;
				}
				
				$_SESSION['success_msg'] = 'New page has been saved successfully.';
				$dataArr = array('name'=>$name,'slug'=>$slug,'desc'=>$desc, 'publish'=>$publish,'metatitle'=>$metatitle,'metakeyword'=>$metakeyword,'metadescription'=>$metadescription,'can_delete'=>$can_delete,'creation_date'=>$currentTimestamp,'page_cat'=>$page_cat, 'banner' => $image_name, 'secbanner' => $secBannerName);
				$update_site		=	$obj_setting->save(TBL_PAGE, $dataArr);
				echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/page";</script>'; 
				exit;
			}
		}
		$fetchPage_cat = $obj_setting->customQuery("SELECT * FROM pages where page_cat=0");
		
?>
