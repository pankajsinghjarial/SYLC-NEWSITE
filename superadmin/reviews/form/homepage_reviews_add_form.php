<script type="text/javascript" src="<?php echo DEFAULT_ADMIN_URL; ?>/js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<!-- /TinyMCE -->
<?php //print_r($makes);?>
<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <div id="page-heading">
      <h1>Homepage Reviews</h1>
    </div>
    <form action="<?php echo $_SERVER['REQUEST_URI'];?>" enctype="multipart/form-data" method="post" name="account_form" id="account_form">
      <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
        <tr>
          <th rowspan="3" class="sized"><img src="<?php echo ADMIN_IMAGE_URL; ?>/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
          <th class="topleft"></th>
          <td id="tbl-border-top">&nbsp;</td>
          <th class="topright"></th>
          <th rowspan="3" class="sized"><img src="<?php echo ADMIN_IMAGE_URL; ?>/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
        </tr>
        <tr>
          <td id="tbl-border-left"></td>
          <td><!--  start content-table-inner -->
            <div id="content-table-inner">
              <table border="0" width="100%" cellpadding="0" cellspacing="0">
                <tr valign="top">
                  <td><!-- start id-form -->
                    <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                      <tr>
                        <td colspan="3"><?php if(isset($errorMsg)) {?>
                          <!--  start message-red -->
                          <div id="message-red">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                              <tr>
                                <td class="red-left" style="padding-left: 35px;"><?php echo $errorMsg;?></td>
                                <td class="red-right"><a class="close-red"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/icon_close_red.gif" alt="" /></a></td>
                              </tr>
                            </table>
                          </div>
                          <!--  end message-red -->
                          <?php } else if(isset($_SESSION['success_msg']) && $_SESSION['success_msg']!='') { ?>
                          <!--  start message-green -->
                          <div id="message-green">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                              <tr>
                                <td class="green-left" style="padding-left: 35px;"><?php echo $_SESSION['success_msg']?></td>
                                <td class="green-right"><a class="close-green"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/icon_close_green.gif"   alt="" /></a></td>
                              </tr>
                            </table>
                          </div>
                          <!--  end message-green -->
                          <?php 
							unset($_SESSION['success_msg']);
						} ?>
                        </td>
                      </tr>
                     <!--  <tr>
                        <th valign="top">Status:</th>
                        <td><input type="radio" name="publish" id="publish_active" checked="checked" value="1"/>
                          Active&nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="radio" name="publish" id="publish_inactive" value="0"/>
                          Inactive </td>
                        <td>&nbsp;</td>
                      </tr> -->
						<tr>
                      	<th valign="top">Review One:</th>
							<td>
								<select name="HomeReviewOne" id="HomeReviewOne" >
									<?php foreach($reviewslist as $id =>$val){?>
										<option value="<?php echo $id;?>" <?php if($id==$check_home_review_one){echo "selected='selected'";} ?> ><?php echo $val; ?></option>
									<?php }?>
								</select>
							</td>
							<td></td>
						</tr>
						
					  <tr>
                      	<th valign="top">Review Two:</th>
							<td>
								<select name="HomeReviewTwo" id="HomeReviewTwo" >
									<?php foreach($reviewslist as $id =>$val){?>
										<option value="<?php echo $id;?>" <?php if($id==$check_home_review_two){echo "selected='selected'";} ?> ><?php echo $val; ?></option>
									<?php }?>
								</select>
							</td>
							<td></td>
						</tr>
						
                      <tr>
                        <th>&nbsp;</th>
                        <td valign="top"><input type="submit" value="" class="form-submit" id="form-submitID"/>
                          <!--input type="button" class="form-reset" onclick="javascript:location.href='<?php echo DEFAULT_ADMIN_URL; ?>/reviews/'"/-->
                        </td>
                        <td></td>
                      </tr>
                    </table>
                    <!-- end id-form  -->
                  </td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><img src="<?php echo ADMIN_IMAGE_URL; ?>/shared/blank.gif" width="695" height="1" alt="blank" /></td>
                  <td></td>
                </tr>
              </table>
              <div class="clear"></div>
            </div>
            <!--  end content-table-inner  -->
          </td>
          <td id="tbl-border-right"></td>
        </tr>
        <tr>
          <th class="sized bottomleft"></th>
          <td id="tbl-border-bottom">&nbsp;</td>
          <th class="sized bottomright"></th>
        </tr>
      </table>
    </form>
    <div class="clear">&nbsp;</div>
  </div>
  <!--  end content -->
  <div class="clear">&nbsp;</div>
</div>
