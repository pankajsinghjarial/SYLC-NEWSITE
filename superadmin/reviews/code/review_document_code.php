<?php
/*************************************************************************************************************
#Coder         : Ishan Siddiqui
#Description   : This Code is used to Manage Homepage reviews
*************************************************************************************************************/
extract($_GET);
extract($_POST);


$obj_setting 		= new common();
$obj 				= new validation();
$docfile = '';
$doc_exists = 0;


//DEFAULT_ADMIN_URL_REVIEW_DOCUMENT_PATH


if(file_exists(LIST_ROOT_ADMIN_REVIEW_DOCUMENT.'/document.pdf')){
	
	$docfile= DEFAULT_ADMIN_URL_REVIEW_DOCUMENT_PATH;
	$doc_exists = 1;
}


if($_SERVER['REQUEST_METHOD']=='POST')
    {
		 
		 
		$error='';
		$obj->add_fields($_FILES['document']['name'], 'req', 'Please Upload Document');
		$obj->add_fields($_FILES['document'], 'ftype=pdf', 'Please Upload Valid PDF Document');
		$error = $obj->validate();
		
		if($error){
 			
 			$errorMsg = "<font color='#FF0000' family='verdana' size=2 >Please select a PDF file.</font>";
	
 		}  
		else
		{
				$image_name = 'document.pdf';
				//$path = LIST_ROOT.'/images/reviews/media/';
				$path = LIST_ROOT_ADMIN_REVIEW_DOCUMENT.'/';
				move_uploaded_file($_FILES["document"]["tmp_name"],$path.$image_name);
				$_SESSION['success_msg'] = 'New Document  has been updated successfully.';
				
			
			
		}
	}
		
	
?>
