<?php 
extract($_POST);
extract($_GET);

$search = new search();
$common = new common();

/*Fetch tabs*/

$total_rows = $common->numberOfRows('content_page', "page_name='Logistique'"); 

$allTabs = $common->customQuery("SELECT slug,tab_title FROM  content_page where page_name='Logistique' ORDER BY id ASC");
if($slug == '') {
	$slug = 'notre_mission';
}
/*Fetch banner section content*/
$fetchSetting 	= $common->read('content_page', "slug = '$slug'");		
$getSetting 	= $db->fetchNextObject($fetchSetting);
$content		= $getSetting->content;
$bannerImage		= $getSetting->banner_image;
