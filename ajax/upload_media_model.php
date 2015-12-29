<?php 
include_once('../conf/config.inc.php'); 
if(isset($_GET['files']))
{	
	$error = false;
	$files = array();
	$Mediatype  = $_GET['files'];
	$uploaddir = LIST_ROOT_ADMIN_REVIEW_IMAGEPATH.'/';
	$uploadUrl = DEFAULT_ADMIN_URL_REVIEW_IMAGEPATH.'/';
	foreach($_FILES as $file)
	{
		$fileNameToSave = time().'-'.basename($file['name']);
	
		if(move_uploaded_file($file['tmp_name'], $uploaddir .$fileNameToSave))
		{
			$files['path'] = $uploadUrl.$fileNameToSave;
			$files['imagename'] = $fileNameToSave;
			$files['type'] = $Mediatype;
		}
		else
		{
		    $error = true;
		}
	}
	$data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
}
else
{
	$data = array('error' => 'The request is not valid');
}

echo json_encode($data);

?>
