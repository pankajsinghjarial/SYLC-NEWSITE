<div class="main_middle">
    <div class="middle">
        <div class="middle_two">
            <img class="top_page_banner" src="<?php echo DEFAULT_URL."/images/banner/banner_02_988x166.jpg"?>" alt="<?php  echo $terms->name; ?>"/>
            <div class="inner_page_one">
                <div class="inner_page_content_area">
                    <div class="inner_page_content_area_top">&nbsp;</div>
                    <div class="head_1">Accéder à mon compte</div>
                    <div class="qui_txt_area">
                        <p>Veuillez vous identifier pour accéder à votre compte :</p>
                        <script src="<?php echo DEFAULT_URL; ?>/js/jquery.min.js" type="text/javascript"></script>
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
                                <td><input type="submit" value="" class="submit_btn" name="calci_submit"><a href="<?php echo DEFAULT_URL."/forgotpswd"?>" class="forgot_password_link link">Mot de passe oublié ?</a></td>
                                </tr>  
                                <tr height="35">
                                <td></td>
                                <td>Nouveau centre de voiture américaine?<br/>Commencez dès maintenant. C'est rapide et facile!</td>
                                </tr> 
                                <tr>
                                <td></td>
                                <td><a href="<?php echo DEFAULT_URL."/createaccount"?>"><img src="<?php echo DEFAULT_URL."/images/create-account.png"; ?>"></a></td>
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
        </div>
    </div> 
    <div class="clear"></div>
</div>

