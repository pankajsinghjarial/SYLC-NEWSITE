<?php
extract($_GET);
extract($_POST);
#getting array of ids from multiple checkbox and then imploding those ids with ',' to put in IN()
$totalIds = implode("','",$allselect);

$obj_setting = new common();

# Here we are deleting all selected pages
if(isset($totalIds) and $totalIds!=''){

	if(isset($searchtext) and $searchtext!=''){
			$addToUrl = '?searchtext='.$searchtext.'&searchcombo='.$searchcombo;
	}else{
			$addToUrl = '';
	}
    $obj_setting->delete('reviews'," id IN('$totalIds')");
    $all_reviews_media = $obj_setting->customQuery("SELECT * FROM reviews_media where review_id IN('$totalIds')");
    while($all_reviews_m = mysql_fetch_object($all_reviews_media))
    {
			$mediaNme = $all_reviews_m->media_name;
			unlink(LIST_ROOT_ADMIN_REVIEW_IMAGEPATH.'/'.$mediaNme);
			
	}
    $obj_setting->delete('reviews_media'," review_id IN('$totalIds')");
    
	$_SESSION['success_msg'] = 'Pages deleted successfully.';
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/reviews/index.php'.$addToUrl.'";</script>'; 
}

?>
