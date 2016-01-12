<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo DEFAULT_URL; ?>/js/get_make_model.js"></script>
<!--script type="text/javascript" src="<?php echo DEFAULT_URL; ?>/jwplayer/jwplayer.js"></script>
<script type="text/javascript">jwplayer.key="a5kxJz7p2PKETtgsHHcgSswjpaKjwb81vBAy5A";</script-->
<script type="text/javascript"src="https://content.jwplatform.com/libraries/GxpjMdbJ.js"></script>
<script type="text/javascript" src="<?php echo DEFAULT_ADMIN_URL; ?>/js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		height : "350",
		editor_selector : "myTextEditor",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,

		// Example content CSS (should be your site CSS)
		//content_css : "css/content.css",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],
			file_browser_callback : 'myFileBrowser'

	});
	
	function myFileBrowser (field_name, url, type, win) {

    // alert("Field_Name: " + field_name + "nURL: " + url + "nType: " + type + "nWin: " + win); // debug/testing

    /* If you work with sessions in PHP and your client doesn't accept cookies you might need to carry
       the session name and session ID in the request string (can look like this: "?PHPSESSID=88p0n70s9dsknra96qhuk6etm5").
       These lines of code extract the necessary parameters and add them back to the filebrowser URL again. */

    var cmsURL = window.location.toString();    // script URL - use an absolute path!
    if (cmsURL.indexOf("?") < 0) {
        //add the type as the only query parameter
        cmsURL = cmsURL + "?type=" + type;
    }
    else {
        //add the type as an additional query parameter
        // (PHP session ID is now included if there is one at all)
        cmsURL = cmsURL + "&type=" + type;
    }

    tinyMCE.activeEditor.windowManager.open({
        file : "<?php echo DEFAULT_ADMIN_URL?>/js/tinymce/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php",
        title : 'My File Browser',
        width : 620,  // Your dimensions may differ - toy around with them!
        height : 400,
        resizable : "yes",
        inline : "yes",  // This parameter only has an effect if you use the inlinepopups plugin!
        close_previous : "no"
    }, {
        window : win,
        input : field_name
    });
    return false;
  }
  

 function countChar(val) {
        var len = val.value.length;
        if (len >= 200) {
          val.value = val.value.substring(0, 200);
        } else {
          $('#CharCount').text(200 - len);
        }
      };
  

</script>
<!-- /TinyMCE -->
<?php //print_r($makes);?>
<div id="content-outer">
  <!-- start content -->
  <div id="content">
    <div id="page-heading">
      <h1>Add New Review</h1>
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
                        <th valign="top">Short Description:</th>
                        <td><textarea rows="4" maxlength="300" onkeyup='countChar(this)' type="text" class="inp-form-fullonetextarea" name="short_description" id="short_description" ><?php if(isset($short_description)){echo trim($short_description);}?> </textarea>
							<p id="CharCount"><?php if(isset($short_description)){echo (200 - strlen($short_description) );}?></p><p> charecters remaining</p>
                        </td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
                        <th valign="top">Choix Éditoriale:</th>
                        <td>
                        
							<input type="hidden" name="editorial" id="editorial_" value="0" />
							<input type="checkbox" name="editorial" value="1" <?php if(isset($editorial)){if(($editorial==1)){ echo "checked";}else{echo "";}} ?>  id="editorial" />
                        
                        </td>
                        <td>
                          </td>
                      </tr>
                      
						 <tr>
                        <th valign="top">PDSF de départ:</th>
                        <td><input type="text" class="inp-form-fullone" value="<?php echo $pdsf;?>" name="pdsf" id="pdsf" /></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
						 <tr>
                        <th valign="top">MPG Estimé:</th>
                        <td><input type="text" class="inp-form-fullone" value="<?php echo $mpg;?>" name="mpg" id="pdsf" /></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
                      <th valign="top">Type:</th>
							<td>
								<select name="old_new" id="old_new" >
									<option value="1" <?php if(isset($old_new)){ if($old_new ==1){echo "selected='selected'";} } ?> >New Car</option>
									<option value="0" <?php if(isset($old_new)){ if($old_new ==0){echo "selected='selected'";} }?>>30 Year old car</option>
								</select>
							</td>
							<td></td>
						</tr>
                      <tr>
                      	<th valign="top">Make:</th>
							<td>
								<select name="make" id="makeSelector" >
									<?php foreach($makes as $id =>$make){?>
									<option value="<?php echo $id;?>" ><?php echo $make; ?></option>
									<?php }?>
								</select>
							</td>
							<td></td>
						</tr>
						<tr>
							<th valign="top">Model:</th>
							<td>
								<select name="model" id="makeSelectorModel" >
									<?php foreach($models as $id =>$mode){?>
									<option value="<?php echo $id;?>" ><?php echo $mode; ?></option>
									<?php }?>
								</select>
								<img id="SpinnerImg" src="<?php echo ADMIN_IMAGE_URL; ?>/shared/spinner-small.gif" height="30px"/>
							</td>
							<td></td>
						</tr>
						
                      
						 <tr>
                        <th valign="top">Year:</th>
                        <td><input type="text" class="inp-form-fullone" value="<?php echo $year;?>" name="year" id="year" /></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
                        <th valign="top">Avis d’expert:</th>
                        <td><textarea rows="" cols="" class="form-textarea myTextEditor" name="expert" id="expert"><?php if(isset($expert)){echo $expert;}else{ ?> 
							
							 <div class="car-details-tab-head">
                                <h1>Avis d'experts</h1>
                              </div>
                              <h2>Adorable</h2>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has been
                              dustry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                              scrambled it to make a type specimen book. <span style="font-style:italic; color: #da2b10"> It has survived not only five centuries, but also the lea
                              electronic typesetting, remaining essentially unchanged </span> it was popularised in the with the release
                              of Letraset sheet containing orem Ipsum passages more recently with desktop publishing software
                              like Aldus PageMaker including versions off.<br><br>

                              <span style="font-style:italic; color: #000">Dustry's standard dummy text ever since the 1500s,</span> when an unknown printer took a galley of typ
                              scrambled it to make a type specimen book. It has survived not only five centuries, but also the lea
                              electronic typesetting, remaining essentially unchanged it was popularised in the 1960 with the re
                              of Letraset sheets containing <span style="font-style:italic; color: #da2b10"> Lorem Ipsum passages & more recently </span> with desktop publishing soft like Aldus PageMaker including versions off.<br><br>Scrambled it to make a type specimen book. It has survived not only five centuries, but also the lea
                              electronic typesetting, remaining essentially unchanged it was popularised in the 1960 with the re
                              of Letraset sheets containing <span style="font-style:italic; color: #000">Lorem Ipsum passages, & more recently with desktop publishing sof
                              like Aldus PageMaker including versions off.</span> <br><br>

                              Electronic typesetting, remaining essentially unchanged it was popularised in the 1960 with the re
                              of Letraset sheets containing Lorem Ipsum passages & more recently with desktop publishing soft
                              like Aldus PageMaker including versions off.<br><br>

                              <span style="font-style:italic; color: #da2b10">Electronic typesetting, remaining essentially unchanged it was popularised in the 1960 with the rel of Letraset sheets containing Lorem Ipsum passages, & more recently with desktop publishing sof
                              like Aldus PageMaker including versions off.</span>
                              </p>
                            </div>
							
							
							
							
							
							<?php } ?></textarea></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
                        <th valign="top">Vue d’ensemble:</th>
                        <td><textarea rows="" cols="" class="form-textarea myTextEditor" name="ensemble" id="ensemble"><?php if(isset($ensemble)){echo $ensemble;}else{ ?>
                        
                        <div class="col-md-12 feature-list no-padding">
							<h1 class="feature-tab-heading">Notable Features</h1>
							<div class="col-md-4">
							<ul style="list-style-type: square;">
							<li><span>Fold-into-floor second and third rowss</span></li>
							<li><span>Available dual-screen Blu-ray entertainment system</span></li>
							<li><span>Seats seven</span></li>
							<li><span>Value-priced American Value Package</span></li>
							<li><span>Related to Chrysler Town &amp; Country</span></li>
							</ul>
							</div>
							<div class="col-md-4">
							<h2>Available Engines:</h2>
							<p>283-hp, 3.6-liter V-6 (regular gas)</p>
							</div>
							<div class="col-md-4">
							<h2>Transmissions:</h2>
							<p>6-speed multi-speed automatic w/OD and auto-manual</p>
							<p>&nbsp;</p>
							</div>
							</div>
							<div class="col-md-12 feature-list no-padding">
							<h1 class="feature-tab-heading">Notable Features</h1>
							<div class="col-md-6">
							<h2 class="list-what">What We Like:</h2>
							<ul style="list-style-type: square;">
							<li><span>Seating flexibility </span></li>
							<li><span>Value </span></li>
							<li><span>Visibility</span></li>
							<li><span>Feature-packed rear entertainment system </span></li>
							<li><span>Soft ride</span></li>
							</ul>
							</div>
							<div class="col-md-6">
							<h2 class="list-what">What We Don't Like:</h2>
							<ul style="list-style-type: square;">
							<li><span>Accelerator lag </span></li>
							<li><span>Comfort of Stow 'n Go seats </span></li>
							<li><span>Outdated dashboard multimedia system </span></li>
							<li><span>Spotty crash tests </span></li>
							<li><span>Reliability for current generation </span></li>
							</ul>
							</div>
							</div>
                        
                        
                        <?php } ?>
                        </textarea></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
                        <th valign="top">Characteristique:</th>
                        <td><textarea rows="" cols="" class="form-textarea myTextEditor" name="characteristique" id="characteristique"><?php if(isset($characteristique)){echo $characteristique; }else{?>
                        
                        <div class="col-md-12 forth-tab no-padding">
							<div class="col-md-12">
							<h1 class="feature-tab-heading">Warranty</h1>
							<div class="col-md-3 no-padding">
							<p class="basic-table">Basic</p>
							<p class="basic-table">Powertrain</p>
							<p class="basic-table">Corrosion Perforation</p>
							<p class="basic-table">Roadside Assistance Coverage</p>
							</div>
							<div class="col-md-3 text-right no-padding">
							<p class="basic-table">36 months/36,000 miles</p>
							<p class="basic-table">60 months/100,000 miles</p>
							<p class="basic-table">60 months/100,000 miles</p>
							<p class="basic-table">60 months/100,000 miles</p>
							</div>
							</div>
							<div class="col-md-10">
							<h1 class="feature-tab-heading">Standard Features &amp; Options</h1>
							<table class="table table-striped table-condensed">
							<tbody>
							<tr>
							<td class="table-head">Styles</td>
							<td>AVP/SE</td>
							<td>SXT</td>
							<td>R/T</td>
							</tr>
							</tbody>
							<tbody>
							<tr>
							<td class="table-head">Starting MSRP</td>
							<td>$21,795</td>
							<td>$27,395</td>
							<td>$30,995</td>
							</tr>
							<tr>
							<td class="table-head">Body Exterior</td>
							<td>AVP/SE</td>
							<td>SXT</td>
							<td>R/T</td>
							</tr>
							<tr>
							<td class="table-head">Heated door mirrors</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							</tr>
							<tr>
							<td class="table-head">Power door mirrors</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							</tr>
							<tr>
							<td class="table-head">Right rear passenger:power sliding</td>
							<td>--</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							</tr>
							<tr>
							<td class="table-head">Spoiler</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							</tr>
							<tr class="table-head">
							<td>Trailer hitch receiver</td>
							<td>--</td>
							<td>--</td>
							<td class="price">$895</td>
							</tr>
							<tr class="table-head">
							<td>Left rear passenger door:power sliding</td>
							<td>--</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							</tr>
							<tr class="table-head">
							<td>Right rear passenger:power sliding</td>
							<td>--</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							</tr>
							<tr class="table-head">
							<td>Number of doors:4</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							</tr>
							</tbody>
							</table>
							</div>
							</div>
									  
                        <?php }?>
                        
                        </textarea></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
                        <th valign="top">Main Image:</th>
                        <td><input type="file" name="image" id="MainImage"  /><div id='ImagePreview'></div></td>
                        <td><div class="error-left"></div>
                          <div class="error-inner">This field is required.</div></td>
                      </tr>
                      <tr>
                        <th valign="top"></th>
                        <td><br><br><b>ADDITIONAL MEDIA :-</b><br><br>
						</td>
                        <td>
                          </td>
                      </tr>
                      <?php  if(isset($medias)){ 
						  
						  
						  foreach($medias as $mkey=>$media){
						  
							$mediaType = $media['mediatype'];
						    $order =  $media['order'];
						    $val = $media['value'];
						    
						    if($mediaType=='image'){
									
									$mediaTitle = 'Image';
									$mediaHtml = "<img width='200px' height='100px' src='/superadmin/images/reviews/media/".$val."' id='".$order."' class='AdditionalMedia'><input type='hidden' name='image-".$order."' value='".$val."'>";
								
							}else if($mediaType=='video'){
								$mediaTitle = 'Video';
								$mediaHtml = "<div class='AdditionalMedia' id='".$order."' src='/superadmin/images/reviews/media/".$val."'><div  id='video".$order."' ></div></div><input type='hidden' value='".$val."' name='video-".$order."'/>";
								
							}else if($mediaType=='youtube_link'){
								
								$mediaTitle = 'Youtube video link';
								$mediaHtml = "<input type='text' id='".$order."' value='".$val."' name='youtube_link-".$order."' class='inp-form-fullone AdditionalMedia YoutubeVideoLink'><p class='ErrorYoutubeUrl' id='youtube-".$order."'></p>";
							}
						    
						    
						    
						  ?>
							
							
							
							
						<tr>
                        <th valign="top"><?php echo $mediaTitle;?>:</th>
                        <td>	
							<?php echo $mediaHtml; ?>
						</td>
                        <td><div class="delete-media"></div></td>
                      </tr>
							
						<?php
							} //end foreach
						
						 } //end if ?>
                      
                      <tr>
                        <th valign="top">Add Media</th>
                        <td>
							<img id="mediaAddYoutubeLink" src="<?php echo ADMIN_IMAGE_URL; ?>/shared/add_youtube_link.png" height="30px"/>
							<img id="mediaAddImage" src="<?php echo ADMIN_IMAGE_URL; ?>/shared/add_image.png" height="30px"/>
							<img id="mediaAddVideo" src="<?php echo ADMIN_IMAGE_URL; ?>/shared/add_video.png" height="30px"/>
                        </td>
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
