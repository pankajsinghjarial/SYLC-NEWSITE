<div class="main_middle">
    <div class="middle">
     <div class="middle_two">
     <img class="top_page_banner" src="<?php echo DEFAULT_URL."/images/banner/banner_02_988x166.jpg"?>" alt="Banner"/>
     <div class="inner_page_one">
        <div class="inner_page_content_area">
        <div class="inner_page_content_area_top">&nbsp;</div>
        <div class="head_1">Mot de passe oublié ?</div>
        <div class="qui_txt_area"><p>Saisissez l'email que vous avez fourni lors de la création de votre compte, et votre mot de passe vous sera envoyé.
        </p>
        <script src="<?php echo DEFAULT_URL; ?>/js/jquery.min.js" type="text/javascript"></script>
<style type="text/css">
.popup_cnt {
	width:100%;
	overflow:hidden;
	margin:0 auto;
}	
.popup_cnt01 {
	overflow:hidden;
}
.input_text {
	font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:right;  color:#333333;  padding:10px 23px 0 0;
	}
.input_text01 {
	font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:right;  color:#333333;  padding:4px 23px 0 0;
	}

.input_outer {
	width:284px;
	height:37px;
	background:url(images/input_outer.jpg) no-repeat;
	border:none;
	margin:0 0 20px 0;
}
.input_outer input {
	width:265px;
	border:0px;
	color:#515151;
	font-size:13px;
	background:none;
	margin:9px 0 0 6px;
}
.input_outer select {
	width:265px;
	border:0px;
	color:#515151;
	font-size:13px;
	background:none;
	margin:9px 0 0 6px;
}

.submit_btn {
	background:url(images/submit.png) no-repeat;
	border:none;
	width:169px;
	margin:5px 0 16px 0;
	height:50px;
	cursor:pointer;
}

#calc_error_sdasfsdf{
	display:block;
	position:absolute;
	right:0;
	top:6px;
}
#calc_error_sdasfsdf .err{
	border:#F00 solid 1px;
	font-size:14px;
	padding:3px;
	background-color:#F2F2F2;
	font-weight:bold;
}
#calc_error_sdasfsdfs .errs {
  background-color: #F2F2F2;
  border: 1px solid #FF0000;
  float: right;
  font-size: 14px;
  font-weight: bold;
  margin: -20px 29px 0 0;
  padding: 3px;
  width: 145px;
}

</style>

<div class="popup_cnt">
      <div class="popup_cnt01"><?php if(isset($error_login_msg) && $error_login_msg!="") echo $error_login_msg;?><br/><br/>
      <form method="post" id="calci" name="calci">
      	<table width="100%" cellspacing="0" cellpadding="0">
        <tbody><tr>
        <td width="36%"><div class="input_text"> Adresse email: </div></td>
        <td width="64%"><div style="position:relative;" class="input_outer"> <input type="text" value="" class="input_01" id="useremail" name="useremail"></div>
        </div>        	
        </td>
        </tr>        
        <tr>
        <td></td>
        <td><input type="submit" value="" class="submit_btn" name="calci_submit"></td>
        </tr>               
      </tbody></table>
      </form>
      </div>
    </div>

</div>
<div class="inner_page_content_area_bottom">&nbsp;</div>
</div>
<div class="clear"></div>
</div>   
  <?php  include(LIST_ROOT."/includes/views/staticsidebar.php"); ?>
<div class="clear"></div>
</div></div> 
<div class="clear"></div>
</div>

