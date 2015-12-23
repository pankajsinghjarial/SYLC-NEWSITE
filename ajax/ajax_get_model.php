<?php
include("../conf/config.inc.php");
$brand = (isset($_POST['manufact']))?$_POST['manufact']:false;
if($brand){
    $modelLists = $common->getModelsByBrands($brand);
    echo json_encode($modelLists);
}else{
    echo 0;
}
