<div class="main_middle">
    <div class="middle">
     <div class="middle_two">
     <div class="inner_page_one">
        <div class="inner_page_content_area">
        <div class="inner_page_content_area_top">&nbsp;</div>
        <div class="head_1">Accéder à mon compte</div>
        <div class="qui_txt_area"><p>Veuillez vous identifier pour accéder à votre compte :</p>

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
	width:120px;
	margin:5px 0 16px 0;
	height:50px;
	cursor:pointer;
	float:left;
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
      <div class="popup_cnt01"><?php if(isset($error_login_msg) && $error_login_msg!="") echo '<span class="error_msg">'.$error_login_msg.'</span>';?><br/><br/>
      <form method="post" id="calci" name="calci">
      	<table width="100%" cellspacing="0" cellpadding="0">
        <tbody><tr>
        <td width="36%"><div class="input_text"> Adresse email: </div></td>
        <td width="64%"><div style="position:relative;" class="input_outer"> <input type="text" value="" class="input_01" id="username" name="username"></div>
        </div>        	
        </td>
        </tr>
        <tr>
        <td><div class="input_text">Mot de passe:</div></td>
        <td><div class="input_outer"><input type="password" value="" class="input_01" id="password" name="password"></div></td>
        </tr>
        <tr>
        <td></td>
        <td><input type="submit" value="" class="submit_btn" name="calci_submit"><a href="<?php echo DEFAULT_URL."/forgotpswd"?>" class="forgot_password_link">Mot de passe oublié ?</a></td>
        </tr>  
        <tr height="35">
        <td></td>
        <td class="alignLeft">Nouveau centre de voiture américaine?<br/>Commencez dès maintenant. C'est rapide et facile!</td>
        </tr> 
        <tr height="15"></tr>
        <tr>
        <td></td>
        <td class="alignLeft"><a href="<?php echo DEFAULT_URL."/createaccount"?>"><img src="<?php echo DEFAULT_URL."/images/create-account.png"; ?>"></a></td>
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
<div class="clear"></div>
</div></div> 
<div class="clear"></div>
</div>
<style>
.inner_page_one {
  text-align:center;
  background: #ebf1f2;
  padding: 5px;
  margin: 0 0 24px 0;
  float:left;
}
.input_outer {
  width: 284px;
  height: 37px;
  background: url(images/input_outer.jpg) no-repeat;
  border: none;
  margin: 0 0 20px 0;
}
.inner_page_content_area .head_1 {
  font-size: 30px;
  color: #b60101;
  text-transform: uppercase;
  margin: 0px 0 4px 14px;
  display: block;
  line-height: 32px;
  font-family: 'MontserratRegular';
}
.input_text {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
  text-align: right;
  color: #333333;
  padding: 0px 23px 20px 0;
}
.inner_page_content_area .qui_txt_area {
  color: #b60101;
  float: left;
  width: 645px;
  margin: 5px 0 0 14px;
  display: block;
}
.inner_page_content_area {
  float: left;
  width: 670px;
  background: url(../images/inner_page_content_area_mid.jpg) repeat-y top left;
}
.middle_two{
    margin: 0 auto;
    width:670px;
}
.inner_page_content_area_bottom {
  background: url(../images/inner_page_content_area_bottom.jpg) no-repeat top center;
  height: 34px;
  width: 669px;
  float: left;
}
.alignLeft{
    float:left;
    text-align:left;
}
.clear{
    clear:both;
}
</style>

