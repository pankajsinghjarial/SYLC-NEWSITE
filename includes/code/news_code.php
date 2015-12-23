<?php
extract($_POST);
extract($_GET);

$obj_setting = new common();
$common_function = new commonFunction();
/*Fetch tab content*/

if($slug != '') {
	$fetchSetting 	= $obj_setting->read('news_articles', "slug = '$slug'");
	$getSetting 	= $db->fetchNextObject($fetchSetting);
	$articleId	    = $getSetting->id;
}

/*Fetch categories*/
$total_rows = $obj_setting->numberOfRows('news_category'); //number of rows in pages table
$allCategories = $obj_setting->customQuery("SELECT * FROM  news_category WHERE  EXISTS (SELECT * FROM   news_articles
   WHERE  news_category.id = news_articles.category_id)");
   
/*Fetch articles*/
if ($articleId != '') {
	$total_articles = $obj_setting->numberOfRows('news_articles', "id='". $articleId . "'"); 
	$allArticles = $obj_setting->customQuery("SELECT category.category_name,category.id,articles.title,articles.content,articles.slug FROM  news_articles as articles LEFT JOIN news_category as category ON articles.category_id=category.id where articles.id='". $articleId ."'");
} else {	
	$total_articles = $obj_setting->numberOfRows('news_articles');
	$allArticles = $obj_setting->customQuery("SELECT category.category_name,category.id,articles.title,articles.content,articles.slug FROM  news_articles as articles LEFT JOIN news_category as category ON articles.category_id=category.id  order by title ASC");
}
$fetchSetting 	= $obj_setting->read('content_page', 'id = 7');		
$getSetting 	= $db->fetchNextObject($fetchSetting);
$sideBanner		= $getSetting->content;	

