<script>
function resetForm() {
    document.getElementById("car_products").reset();
}
</script>

<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <div id="page-heading">
      <h1>Product Cars</h1>
    </div>
    <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" name="car_products" id="car_products" enctype="multipart/form-data">
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
                        <td colspan="3"><?php if (isset($_GET['response']) && $_GET['response']=='error') {?>
                          <!--  start message-red -->
                          <div id="message-red">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                              <tr>
                                <td class="red-left" style="padding-left: 35px;"><?php echo 'Error'; ?></td>
                                <td class="red-right"><a class="close-red"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/icon_close_red.gif" alt="" /></a></td>
                              </tr>
                            </table>
                          </div>
                          <!--  end message-red -->
                          <?php } else if (isset($_GET['response']) && $_GET['response']=='success') { ?>
                          <!--  start message-green -->
                          <div id="message-green">
                            <table border="0" width="100%" cellpadding="0" cellspacing="0">
                              <tr>
                                <td class="green-left" style="padding-left: 35px;"><?php echo 'Video Code Added Successfully'; ?></td>
                                <td class="green-right"><a class="close-green"><img src="<?php echo ADMIN_IMAGE_URL; ?>/table/icon_close_green.gif"   alt="" /></a></td>
                              </tr>
                            </table>
                          </div>
                          <!--  end message-green -->
                          <?php 
							
						} ?>
                        </td>
                      </tr>
                      <tr>
                        <th valign="top">First Video:</th>
                        <td><input type="text" class="inp-form" name="firstVid" id="firstVid" value="<?php echo $firstVid; ?>" /></td>
                        
                      </tr>
                      <tr>
                        <th valign="top">Second Video:</th>
                        <td><input type="text" class="inp-form" name="secondVid" id="secondVid" value="<?php echo $secondVid; ?>"/></td>
                        
                      </tr>
                     
                      <tr>
                        <th>&nbsp;</th>
                        <td valign="top"><input type="submit" value="submit" name="submit" class="form-submit" />
                          <input type="button" class="form-reset" onclick="resetForm()" />
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
