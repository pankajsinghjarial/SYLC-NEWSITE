<div class="main_middle">
    <div class="middle">
        <div class="middle_two">
            <div class="middle_two_mid_announces">
            <div style="min-height: 25px;" class="car">
                <span class="head_3">Ma sélection</span>
                <?php if(isset($_GET['msg']) && $_GET['msg']=='success'){?> <span class="wishlist_cardelete">Deleted Successfully.</span><?php }?>
            </div>
            <?php if(isset($_SESSION['User']) && $_SESSION['User']['id']!=""){?>
                <div class="voitures voitures02">
                    <?php if(mysql_num_rows($list)>0){?>
                    <?php while($data = mysql_fetch_object($list)){?>
                    <div class="all_result_area">
                        <div class="inner">
                            <div class="car_img">
                            <?php if($data->car_type=='inventory'){?>
                                <a href="<?php echo DEFAULT_URL; ?>/inventaire/<?php echo $data->car_id;?>"> <img alt="<?php echo $data->car_name;?>" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $data->car_img; ?>&newWidth=87&newHeight=58"></a>
                            <?php }else{?>
                                <a href="<?php echo DEFAULT_URL; ?>/ebay/<?php echo $data->car_id;?>"> <img alt="<?php echo $data->car_name;?>" src="<?php echo DEFAULT_URL; ?>/image_resizer.php?img=<?php echo $data->car_img; ?>&newWidth=87&newHeight=58"></a>
                            <?php }?>
                            </div>
                            <div class="car_name">
                            <?php if($data->car_type=='inventory'){?>
                                <span class="company_name"><a href="<?php echo DEFAULT_URL?>/inventaire/<?php echo $data->car_id;?>"><?php echo $data->car_name;?></a></span>
                            <?php }else{?>
                                <span class="company_name"><a href="<?php echo DEFAULT_URL?>/ebay/<?php echo $data->car_id;?>"><?php echo $data->car_name;?></a></span>
                            <?php }?>								
                                <a href="delete_selection/<?php echo $data->car_id;?>" class="example5"><span class="read_btn">supprimer de mes favoris</span> </a>
                            </div>							
                            <div class="ajouter">
                                <div class="prix_de_vente">									
                                    <span class="price price_usd">$ <?php echo number_format($data->car_price, 2);?><span class="usd">USD</span>
                                    </span> <span class="price price_euro"><a style="color: #EC310C; cursor: pointer;"><?php echo $common->CurrencyConverter($data->car_price);?> &euro; </a> </span>
                                </div>
                            </div>							
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <?php }?>
                    <?php }else{?>
                        <div class="selection_txt">No records found</div>
                    <?php }?>
                </div>
            <?php }else{?>
            <div class="voitures voitures02">
                <div style="height: 70px;" class="inner">
                    <div class="selection_txt">Retrouvez ici toutes les voitures que vous avez ajoutés à votre sélection.</div>
                </div>
            </div>
            <?php }?>	
            </div>
            <?php include(LIST_ROOT."/includes/views/account_sidebar.php"); ?>
        </div>
    </div>
</div>
<style>
.all_result_area {
  float: left;
  width: 673px;
  font-weight: normal;
  color: #666666;
}
.all_result_area .inner {
  background: url(../images/all_result_area_inner.png) repeat-x top left;
  padding: 11px 0 11px 9px;
  border-top: 1px solid #cedbdd;
  border-right: 1px solid #cedbdd;
  border-left: 1px solid #cedbdd;
  border-bottom: none;
  width: 657px;
  height: 110px;
}
.all_result_area .inner .car_img {
  float: left;
  width: 87px;
}
.all_result_area .inner .car_name {
  float: left;
  margin: 0 0 0 15px;
  width: 220px;
}
.all_result_area .inner .ajouter {
  float: right;
  margin: 0 18px 0 0;
  font-size: 12px;
  color: #235f9b;
  text-align: right;
}
.all_result_area .inner .car_img a {
  display: block;
  margin: 0px 0 0 0;
  font-size: 11px;
  color: #336699;
}
.all_result_area .inner .car_img a img {
  margin: 0 5px 0 0;
}
.all_result_area .inner .company_name {
  font-size: 14px;
  color: #235f9b;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: bold;
}
.all_result_area .inner .company_name a {
  font-size: 14px;
  color: #235f9b;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: bold;
  text-decoration: none;
}
.all_result_area .inner .read_btn {
  background: url(../images/read_btn_bg.png) no-repeat top left;
  width: 149px;
  height: 25px;
  font-size: 12px;
  color: #333333;
  line-height: 24px;
  text-align: center;
  margin: 12px 5px;
}
.all_result_area .inner .prix_de_vente {
  float: left;
  margin: 0 0px 0 0;
  font-size: 13px;
  color: #333333;
}
.all_result_area .inner .prix_de_vente .price {
  font-size: 24px;
  color: #c90000;
  margin: 0 0 0 0;
}
.prix_de_vente .price_usd {
  font-size: 14px !important;
  margin: 3px 0 0 0;
  width: 100%;
}
.all_result_area .inner span {
  display: block;
}
.usd {
  font-size: 14px;
  display: inline !important;
}
.wishlist_cardelete {
  margin: 10px 20px;
  font-size: 14px;
  font-weight: bold;
  text-align: center;
  color: green;
}
.selection_txt{
    font-family: Arial,Helvetica,sans-serif;
    font-size: 18px;
    margin:10px 20px;
    padding: 11px 0 0px 0px;
    border-top: 1px solid #cedbdd;
 }
</style>

