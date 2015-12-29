<?php 
extract($_POST);
extract($_GET);

$search = new search();
$common = new common();

/*Fetch tabs*/
if (!isset($_GET['page'])) {
	$pagesnum = 1;
	$pagesPhotonum = 1;
}
if (isset($_GET['media']) && $_GET['media'] == 'photo') {
	$pagesnum = 1;
	$pagesPhotonum = $_GET['page'];
}
if (isset($_GET['media']) && $_GET['media'] == 'video') {
	
	$pagesPhotonum = 1;
	$pagesnum = $_GET['page'];
}


$pagesPhoto = new Paginator;
$pagesPhoto->default_ipp = 8;
$total_rows = $common->numberOfRows('media', "type='1'"); 
$pagesPhoto->items_total  = $total_rows;
$pagesPhoto->extraParam  = 'photo';
$pagesPhoto->paginate();
$limit = 8;
$eu = $limit * ($pagesPhotonum-1);
$allMedia = $common->customQuery("SELECT * FROM  media where type = '1' ORDER BY id ASC limit $eu, $limit");

$pages = new Paginator;
$pages->default_ipp = 8;
$totalVideos = $common->numberOfRows('media', "type='0'"); 
$pages->items_total  = $totalVideos;
$pages->extraParam  = 'video';
$pages->paginate();
$limit = 8;
$eu = $limit * ($pagesnum-1);

$allVideo = $common->customQuery("SELECT * FROM  media where type = '0' ORDER BY id ASC limit $eu, $limit");

$fetchSetting 	= $common->read('content_page', 'id = 16');		
$getSetting 	= $db->fetchNextObject($fetchSetting);
$bannerImage	= $getSetting->banner_image;	
$content		= $getSetting->content;	
