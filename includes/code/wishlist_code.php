<?php
$userTblName = "wishlist";
$common = new common();
if(!isset($_GET['page'])){
    $page = 1;
}
if($_SESSION['User']['id']!=""){
    $userid = $_SESSION['User']['id'];
    $list = $common->customQuery("SELECT * FROM ".$userTblName." where user_id = ".$userid." ORDER BY created DESC LIMIT 0 ,25");
}
?>
