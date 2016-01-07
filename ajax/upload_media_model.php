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
		$timest = time();
		$fileNameToSave = $timest.'-'.basename($file['name']);
	
		if(move_uploaded_file($file['tmp_name'], $uploaddir .$fileNameToSave))
		{
			$files['path'] = $uploadUrl.$fileNameToSave;
			$files['imagename'] = $fileNameToSave;
			$files['type'] = $Mediatype;
			
			if($Mediatype =='video'){
			
			// where ffmpeg is located, such as /usr/sbin/ffmpeg
			$ffmpeg = 'ffmpeg';
			 
			// the input video file
			$video  = $uploaddir.$fileNameToSave;
			 
			// where you'll save the image
			$image  = $uploaddir.$timest. '.jpg';
			 
			// default time to get the image
			$second = 1;

			// get the duration and a random place within that
			$cmd = "$ffmpeg -i $video 2>&1";
			if (preg_match('/Duration: ((\d+):(\d+):(\d+))/s', `$cmd`, $time)) {
				$total = ($time[2] * 3600) + ($time[3] * 60) + $time[4];
				$second = rand(1, ($total - 1));
			}

			// get the screenshot
			$cmd = "$ffmpeg -i $video -deinterlace -an -ss $second -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $image 2>&1";

			$return = `$cmd`;	
							
				
			}
			
			
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
