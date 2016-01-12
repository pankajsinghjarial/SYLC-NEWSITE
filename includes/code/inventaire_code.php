<?php  
extract($_GET);
if(isset($_POST['sendMail'])){
    $mail = new PHPMailer();
    $email=$_POST['email'];
    $body = '<table cellpadding="0" cellspacing="0" border="2">
        <tr>
            <td style="padding:10px;">Logistique pays</td>
            <td style="padding:10px;">'.$_POST['logistique_pays'].'/'.$_POST['logistique_pays1'].'</td>
        </tr>
        <tr>
            <td style="padding:10px;">Transport terrestre</td>
            <td style="padding:10px;">'.$_POST['transport_terrestre'].'/'.$_POST['transport_terrestre1'].'</td>
        </tr>
        
        <tr>
            <td style="padding:10px;">Transport international</td>
            <td style="padding:10px;">'.$_POST['transport_international'].'/'.$_POST['transport_international1'].'</td>
        </tr>
        <tr>
            <td style="padding:10px;">Assurance transport</td>
            <td style="padding:10px;">'.$_POST['assurance_transport'].'</td>
        </tr>
        <tr>
            <td style="padding:10px;">Frais transitaire</td>
            <td style="padding:10px;">'.$_POST['frais_transitaire'].'</td>
        </tr>';
        $homologation_francisation = "";
        if(isset($_POST['homologation_francisation'])){
            $homologation_francisation = $_POST['homologation_francisation'];
        }
        $body = '
        <tr>
            <td style="padding:10px;">Homologation francisation</td>
            <td style="padding:10px;">'.$homologation_francisation.'</td>
        </tr>';
        $body = '
        <tr>
            <td style="padding:10px;">Prix total HT</td>
            <td style="padding:10px;">'.$_POST['prix_total_ht'].'</td>
        </tr>
                
        <tr>
            <td style="padding:10px;">Nom</td>
            <td style="padding:10px;">'.$_POST['fname'].'</td>
        </tr>
        <tr>
            <td style="padding:10px;">Prénom</td>
            <td style="padding:10px;">'.$_POST['lname'].'</td>
        </tr>
        <tr>
            <td style="padding:10px;">Téléphone</td>
            <td style="padding:10px;">'.$_POST['phone'].'</td>
        </tr>
        <tr>
            <td style="padding:10px;">E-mail</td>
            <td style="padding:10px;">'.$_POST['email'].'</td>
        </tr>
        
        <tr>
            <td style="padding:10px;">Addresse</td>
            <td style="padding:10px;">'.$_POST['address'].'</td>
        </tr>
        <tr>
            <td style="padding:10px;">Code Postal</td>
            <td style="padding:10px;">'.$_POST['code_postal'].'</td>
        </tr>
        <tr>
            <td style="padding:10px;">Ville</td>
            <td style="padding:10px;">'.$_POST['ville'].'</td>
        </tr>
        <tr>
            <td style="padding:10px;">Pays</td>
            <td style="padding:10px;">'.$_POST['pays'].'</td>
        </tr>
        <tr>
            <td style="padding:10px;">Message</td>
            <td style="padding:10px;">'.$_POST['message'].'</td>
        </tr>
    </table>';
    
    $mail->IsSMTP();
    $mail->SMTPAuth   = true;
    $mail->Port       = 25;
    $mail->Host       = "mail.livemarketnews.com";
    $mail->Username   = "mails@livemarketnews.com";
    $mail->Password   = "Stone!@#";
    $mail->IsSendmail();
    $mail->From = $_POST['email'];
    $mail->FromName = "americancarcentrale";
    
    //$to = array("jelmaleh@seobrand.net");
    $to = array(SITE_ADMIN_EMAIL);
    foreach($to as $sendsto){
        $mail->AddAddress($sendsto);
    }
    $mail->Subject = "americancarcentrale";
    $mail->MsgHTML($body);

    if ($mail->Send() == true) {
        $_SESSION['success'] = 1;
    }
    else {
        echo "The email message has NOT been sent for some reason. Please try again later.<br/>";
    }
    $concar=mysql_connect(DB_HOST,DB_USER,DB_PASS);
    mysql_select_db(DB_NAME);
    $sql_last = "INSERT INTO contact_bid (logistique_pays,transport_terrestre,transport_international,assurance_transport,frais_transitaire,homologation_francisation,prix_total_ht,name,email,phone,message,address,code_postal,ville,pays,status,created)
    VALUES ('".$_POST['logistique_pays']."/".$_POST['logistique_pays1']."','".$_POST['transport_terrestre']."/".$_POST['transport_terrestre1']."','".$_POST['transport_international']."/".$_POST['transport_international1']."','".$_POST['assurance_transport']."','".$_POST['frais_transitaire']."','".$homologation_francisation."','".$_POST['prix_total_ht']."','".$_POST['lname']." ".$_POST['fname']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['message']."','".$_POST['address']."','".$_POST['code_postal']."','".$_POST['ville']."','".$_POST['pays']."',0,'".date('Y-m-d')."')";
    mysql_query($sql_last) or die(mysql_error());
    header("Location:". DEFAULT_URL."/thank_you.php");
}
//Car attributes
$item = $common->getCar($id);

//Shipping Calculations
$prestation = 3000;
$transportUSA = 1200;
$transportUSAFermee = 1800;
$transport = 2000;
$bank = 260;
$frais = 780;
$carPrice = $item['price'];
$year = $item['madeYear'];
$initPrice = ( ($carPrice + $common->ConvertPrice($transport)) * 0.10 * 0.20);
if($year < 1985){
    $initPrice = ( ($carPrice + $common->ConvertPrice($transport)) * 0.05);
}
$priceTTC = $initPrice + $carPrice + $common->ConvertPrice($transport)+ $common->ConvertPrice($prestation) + $common->ConvertPrice($transportUSA) + $common->ConvertPrice($bank) + $frais;


//Youtube Video Section
$firstVid = $common->getValueByField("superadmin_options" ,"option_name='firstVid'" ,"option_value" );
$secondVid = $common->getValueByField("superadmin_options" ,"option_name='secondVid'" ,"option_value" );
