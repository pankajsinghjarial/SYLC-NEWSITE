 <div class="middle_two_right_announces">
          <?php  if(strpos($_SERVER['REQUEST_URI'],'search-result')==true) { ?>
          <div class="nos_partenaires_announces">
            <div class="head_1">Narrow Your Search</div>
            <div class="nos_stock_area">
              <div class="table_price">
                <table width="100%" border="1">
                  <tr>
                    <td width="32%"><div class="head_4">Price</div></td>
                    <td width="11%">&nbsp;</td>
                    <td width="57%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td valign="top"><input name="" type="checkbox" value="" />
                    <span class="price_checkbox_txt">Up to</span></td>
                    <td>&nbsp;</td>
                    <td>$5,000 (10)</td>
                  </tr>
                  <tr>
                    <td valign="top"><input name="" type="checkbox" value="" />
                      <span class="price_checkbox_txt">$5,001</span></td>
                    <td>-</td>
                    <td>$10,000 (17)</td>
                  </tr>
                  <tr>
                    <td valign="top"><input name="" type="checkbox" value="" />
                      <span class="price_checkbox_txt">$10,001</span></td>
                    <td>-</td>
                    <td>$15,000 (30)</td>
                  </tr>
                  <tr>
                    <td valign="top"><input name="" type="checkbox" value="" />
                      <span class="price_checkbox_txt">$15,001</span></td>
                    <td>-</td>
                    <td>$20,000 (30)</td>
                  </tr>
                  <tr>
                    <td valign="top"><input name="" type="checkbox" value="" />
                      <span class="price_checkbox_txt">$20,001</span></td>
                    <td>-</td>
                    <td>$30,000 (45</td>
                  </tr>
                  <tr>
                    <td colspan="2" ><div class="more_options"><a href="#">more options</a></div></td>
                  </tr>
                </table>
              </div>
              <div class="clear"></div>
            </div>
            <div class="nos_stock_area">
              <div class="table_price">
                <table width="100%" border="1">
                  <tr>
                    <td width="53%"><div class="head_4">Mileage</div></td>
                    <td width="47%"><div class="head_4">Year</div></td>
                  </tr>
                  <tr>
                    <td width="53%">
                    <form action="" method="get">
               <div class="mileage_select_bg"> 
               <select name="">
                  <option>10,000 or less</option>
                </select>
                </div>
              </form></td>
                    <td width="47%"><form action="" method="get">
               <div class="mileage_select_bg"> 
                <select name="">
                  <option>Select</option>
                </select>
                </div>
              </form></td>
                  </tr>
                </table>
              </div>
              <div class="clear"></div>
            </div>
            <div class="nos_stock_area">
              <div class="table_price">
                <table width="100%" border="1">
                  <tr>
                    <td width="53%"><div class="head_4">Style</div></td>
                    <td width="47%"><div class="head_4">Body Style</div></td>
                  </tr>
                  <tr>
                    <td width="53%"><form action="" method="get">
                    <div class="mileage_select_bg">
                      <select name="select">
                        <option>Select</option>
                      </select>
                    </div>
              </form></td>
                    <td width="47%"><form action="" method="get">
                    <div class="mileage_select_bg"> 
                <select name="">
                  <option>Select</option>
                </select>
                </div>
              </form></td>
                  </tr>
                </table>
              </div>
              <div class="clear"></div>
            </div>
            <div class="nos_stock_area">
              <div class="table_price">
                <table width="100%" border="1">
                  <tr>
                    <td width="52%"><div class="head_4">Fuel</div></td>
                    <td width="48%"><div class="head_4">Transmission</div></td>
                  </tr>
                  <tr>
                    <td width="52%"><form action="" method="get">
                    <div class="mileage_select_bg"> 
                <select name="">
                  <option>Select</option>
                </select>
                </div>
              </form></td>
                    <td width="48%"><form action="" method="get">
                    <div class="mileage_select_bg"> 
                <select name="">
                  <option>Select</option>
                </select>
                </div>
              </form></td>
                  </tr>
                </table>
              </div>
              <div class="clear"></div>
            </div>
            <div class="nos_stock_area">
              <div class="table_price">
                <table width="100%" border="1">
                  <tr>
                    <td width="52%"><div class="head_4">Exterior Color</div></td>
                    <td width="48%"><div class="head_4">Drivetrain</div></td>
                  </tr>
                  <tr>
                    <td width="52%"><form action="" method="get">
                    <div class="mileage_select_bg">
                      <select name="select2">
                        <option>Select</option>
                      </select>
                    </div>
              </form></td>
                    <td width="48%"><form action="" method="get">
                    <div class="mileage_select_bg"> 
                <select name="">
                  <option>Select</option>
                </select>
                </div>
              </form></td>
                  </tr>
                </table>
              </div>
              <div class="clear"></div>
            </div>
            <div class="expertise"> <a href="#"><img src="<?php echo DEFAULT_URL ?>/images/search_now.png" width="279" height="54" alt="Expertise" /></a></div>
          </div>
          <?php }  else { ?>
          <div class="nos_partenaires" style="width:300px;">
            <div class="head_1">Nos partenaires</div>
            <div class="nos_partenaires_img_area flexslider">
            <ul class="slides">
	    	<?php	$slide = $common->CustomQuery("Select * from banner where publish = 1 and type = 3");
                   		while($image = mysql_fetch_object($slide)){ ?>
                     <li>
                      <?php if($image->website != "") { ?><a href="<?php echo $image->website; ?>" target="_blank"> <?php } ?>
                     <img src="<?php echo DEFAULT_URL; ?>/images/banner/<?php echo $image->image;  ?>" alt="Banner" />
                     <?php if($image->website != "") { ?></a> <?php } ?>
                     </li>
                    <?php } ?>
		</ul>
	 </div>
          </div>
          <div class="nos_partenaires" style="width:300px;">
            <div class="head_1">GARANTIE</div>
            <div class="nos_partenaires_img_area1 flexslider">
            <ul class="slides">
	    <?php	$slide = $common->CustomQuery("Select * from banner where publish = 1 and type = 4");
				while($image = mysql_fetch_object($slide))
				{
				 ?>
				 <li>
				 <img src="<?php echo DEFAULT_URL; ?>/images/banner/<?php echo $image->image;  ?>" alt="Banner" />
				 </li>
				<?php } ?>
				</ul>
            </div>
          </div>
          <?php } ?>
        </div>
        <div class="clear"></div>
	<link rel="stylesheet" href="<?php echo DEFAULT_URL; ?>/css/flexslider.css" type="text/css" media="screen" />
	<script src="<?php echo DEFAULT_URL; ?>/js/jquery.flexslider-min.js"></script>

	<script type="text/javascript">
	jq = jQuery.noConflict();
		jq(window).load(function() {
			jq('.nos_partenaires_img_area').flexslider();
		});
			jq(window).load(function() {
			jq('.nos_partenaires_img_area1').flexslider();
		});
	</script>
