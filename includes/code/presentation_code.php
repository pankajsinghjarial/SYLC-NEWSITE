<?php
extract($_POST);
extract($_GET);

$obj_setting = new common();
/*Fetch tab content*/

if($tab_title == '') {
	$tab_title = 'presentation';
}
$fetchSetting 	= $obj_setting->read('content_page', "slug = '$tab_title'");
$getSetting 	= $db->fetchNextObject($fetchSetting);
$content	    = $getSetting->content;

/*Fetch banner section content*/
$fetchSetting 	= $obj_setting->read('content_page', 'id = 6');		
$getSetting 	= $db->fetchNextObject($fetchSetting);
$topBanner		= $getSetting->content;

$fetchSetting 	= $obj_setting->read('content_page', 'id = 7');		
$getSetting 	= $db->fetchNextObject($fetchSetting);
$sideBanner		= $getSetting->content;	

