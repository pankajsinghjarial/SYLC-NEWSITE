<?php require_once './conf/config.inc.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="STYLESHEET" type="text/css" href="style_test.css" />

<style type="text/css">
    body { padding: 15pt 26pt;font-size: 14px; }
  </style>

<style>
td.tdborder{border-style:solid; border-width:1px; padding-left:5px;  word-wrap: break-word;}
</style>

  <link rel="stylesheet" href="jquery.signaturepad.css">
  <!--[if lt IE 9]><script src="../build/flashcanvas.js"></script><![endif]-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

</head>
<body id="body">
<div id="wrapper">


<?php  

if(!$_POST)
{
	$hiddenpdf='';
}

extract($_GET);
//echo $id;

require 'admin/config/database.php';

$sel_query="Select * from leads where id='".$id."'";

$rs_sel=mysql_query($sel_query) or die(mysql_error());

$popup_details = (mysql_fetch_object($rs_sel));

if($from == 'admin')
{
	$subject ="Votre facture Sylc Corporation";
	$message = "
<table>
<tr>
<td colspan='2'>
<p>Vous êtes invités à signer votre facture par Sylc Corporation:</p>
</td>
<table>
</tr>
<tr>
<td>Ouvrez votre facture pdf en <a href='".DEFAULT_URL."/pop_form_details.php?id=".$id."&lead_id=".$lead_id."&from=user'>Cliquant Ici</a><br/><br/>
La signature électronique est simple, rapide et économise le papier. Il suffit juste de signer avec votre souris.</td>
</tr>
		  <tr>
          <td colspan='2'><p>Merci de votre confiance, SYLC Corporation</p></td>
          </tr>
		 </table>";
	require_once 'class.phpmailer.php';
	//SMTP MAIL STARTS
	
	try {
		$to_email = $popup_details->email;
		$mail = new PHPMailer(true); //New instance, with exceptions enabled
			
		$body             = $message;
		$body             = preg_replace('/\\\\/','', $body); //Strip backslashes
			
		$mail->IsSMTP();                           // tell the class to use SMTP
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->Port       = 25;                    // set the SMTP server port
        $mail->Host       = "localhost"; // SMTP server
        $mail->Username   = "test@sylc-export.com";     // SMTP server username
        $mail->Password   = "Sylc!@34";            // SMTP server password
			
		//$mail->IsSendmail();  // tell the class to use Sendmail
			
		$mail->AddReplyTo("no-reply@example.com","First Last");
			
		$mail->From       = "info@sylc-export.com";
		$mail->FromName   = "Sylc-Export Update";
			
			
		$mail->AddAddress($to_email);
			
		$mail->Subject  = $subject;
			
		//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		$mail->WordWrap   = 80; // set word wrap
			
		$mail->MsgHTML($body);
			
		$mail->IsHTML(true); // send as HTML
			
		$mail->Send();
		$custlogerrorMsg="<font color='#026701' family='verdana' size=2>Successfully Updated</font>";
		//echo 'Message has been sent.';
	} catch (phpmailerException $e) {
		echo $e->errorMessage();
	}
/*	$templateFromEmail = '4010@dothejob.org';
	
	$headers = "From: " . $templateFromEmail . "\r\n";
	$headers .= "Reply-To: ". $templateFromEmail . "\r\n";
	//$headers .= "CC: 4004@dothejob.org\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$to = $popup_details->email;
	$from = $templateFromEmail;
	mail($to,$subject,$message,$headers,'-fwebmaster@sylc.com'); */
	$date = date("Y-m-d H:i:s");
	 (mysql_query("Update lead_details Set `mail_sent` = '1' ,`mail_sent_date` ='$date' where id = '$lead_id'"));
	echo '<script>location.href="'.DEFAULT_ADMIN_URL.'/customer_info.php?id='.$id.'";</script>';
}


//echo "<pre>";
//print_r($popup_details);die;

//for address

$sql_address_check = "SELECT * FROM address_pdf";

$address_check = mysql_query($sql_address_check);

$address_for_pdf = mysql_fetch_array($address_check);

//echo $address_for_pdf['address_column'];die;
 
$count_car_quantity = 1;
//Fetch details of the model and brand
 $leadddetail = (mysql_query("SELECT * FROM lead_details where id = '$lead_id'")); 
 $leadfetch = (mysql_fetch_object($leadddetail)); 
 $brand1 = $leadfetch->car_brand; 
 $model1 = $leadfetch->model;
 $year1 = $leadfetch->year;
 $interior1 = $leadfetch->interior;
 $exterior1 = $leadfetch->exterior;
 $car_serial1 = $leadfetch->serial;
 $destination1 = $leadfetch->destination;
 $date1 = date('m/d/Y',strtotime($leadfetch->created_at));
 $maildate = $leadfetch->mail_sent_date;

 $now = time(); // or your date as well
 $your_date = strtotime($maildate);
 $datediff = $now - $your_date;
//echo $datediff/(60*60*24); die; 
 if($datediff/(60*60*24) > 2)
 {
 	echo "Your Link Has Expired. Please request Admin to resend the Link.";
 	die;
 }
 
 
 if($leadfetch->status != "") {
 $statusdetail = (mysql_query("SELECT * FROM status where id = '$leadfetch->status'"));
 $statusfetch = (mysql_fetch_object($statusdetail));
 $statusfetchname = $statusfetch->name;
 } else { $statusfetchname ='';}
 $description['Price'] = $leadfetch->carprice;
 $feedetail = (mysql_query("SELECT * FROM lead_fee_detail where lead_detail_id = '$lead_id'")); 
 if(mysql_num_rows($feedetail) > 0)
 {
 	while($feefetch = (mysql_fetch_object($feedetail)))
 	{
 		$description["$feefetch->title"] = $feefetch->amount;
 	}
 }
 $upselldetail = (mysql_query("SELECT * FROM lead_upsell_details where lead_detail_id = '$lead_id'"));
 if(mysql_num_rows($upselldetail) > 0)
 {
 	while($upsellfetch = (mysql_fetch_object($upselldetail)))
 	{
 		$description["$upsellfetch->title"] = $upsellfetch->amount;
 	}
 }
 
$total = 0;
?>

<?php if($from == 'user')
{?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="44%" style="padding:1% 1% 1% 2%;"><img src="logo.jpg" width="287" height="75" alt=" " /></td>
<td width="4%">&nbsp;</td>
<td width="44%" style="padding:1% 2%;" class="header_right"><p><strong>SYLC CORPORATION</strong><br />
1822 N. DIXIE HWY, Hollywood, Florida 33020<br />
PHONE: 305-332-9761<br />
FAX: 305-647-6533</p></td>
</tr>
</table>   
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="invoice_bg">Invoice</td>
  </tr>
</table>

<br />

<?php $currenttime_canada_for_sign=  date("Y/m/d,  H:i:s");
      // $currenttime_canada_for_sign=  date("Y-m-d");?>
<form action="mail_pdf.php" class="sigPad" name="pop_pdf" method="post">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%"><table width="95%" border="0" cellspacing="0" cellpadding="0" class="table01">
       
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%"><strong>Purchaser Name:</strong> <?php echo $popup_details->name;?> <?php echo $popup_details->first_name;?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%"><strong>Address:</strong> <?php echo $popup_details->address;?></td>
            <td width="50%"><strong>Zip/Post Code:</strong> <?php echo $popup_details->postcode;?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%"><strong>City/Province(State):</strong> <?php echo $popup_details->city;?></td>
            <td width="50%"><strong>Ph:</strong> <?php echo $popup_details->phone;?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="50%" style="padding-left:1em;"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="table01">
      <tr>
        <td align="left" valign="top"><strong>Date:</strong> <?php echo $date1;?></td>
      </tr>
      <tr>
        <td align="left" valign="top"><strong>Serial#:</strong> <?php echo $car_serial1;?></td>
      </tr>
      <tr>
        <td align="left" valign="top"><strong>Final Destination:</strong> <?php echo $destination1;?></td>
      </tr>
       
    </table></td>
  </tr>
</table>
<br />

 <table width="100%" border="0.2" cellspacing="0" cellpadding="0.2"  class="details_table">
  <tr>
  <th scope="col" width="10%">Brand	
</th>
<th scope="col" width="10%">Model	
</th>
       <th scope="col" width="10%">Year	
</th>
</th>
       <th scope="col" width="10%">Status	
</th>
   
    <th scope="col" width="10%">Exterior 	
</th>
    <th scope="col" width="10%">Interior		
</th>
<th scope="col" width="30%">Price Description				
</th>
    <th scope="col" width="10%">Amount		
</th>
  </tr>
  
     
  <tr>
  <td valign="top" class="tdborder" style="text-align: center;"><?php echo $brand1;?><br/></td>
  <td valign="top" class="tdborder" style="text-align: center;"><?php echo $model1;?><br/></td>
  <td valign="top" class="tdborder" style="text-align: center;"><?php echo $year1;?><br/></td>
  <td valign="top" class="tdborder" style="text-align: center;"><?php echo $statusfetchname;?><br/></td>
  <td valign="top" class="tdborder" style="text-align: center;"><?php echo $exterior1;?><br/></td>
    <td valign="top" class="tdborder" style="text-align: center;"><?php echo $interior1;?><br/></td>
 <td valign="top" class="tdborder" style="text-align: center;">
  <?php foreach($description as $key=>$value) { echo $key."<br/>"; } ?>
</td>

<?php /* ?>
<td valign="top" class="tdborder" style="text-align: center;">
  <?php foreach($description as $key=>$value) { echo "$ ".number_format($value, 2, '.', ',')."<br/>"; $total += $value; } 
  $total = number_format($total, 2, '.', ',');?>
</td><?php */ ?>

<td valign="top" class="tdborder" style="text-align: center;">
  <?php foreach($description as $key=>$value) { 
  	
  	if($value < 0){

  	echo "-$ ".@number_format(str_replace('-','',$value), 2, '.', ',')."<br/>"; $total += $value;	

  	}else{
  	
  	echo "$ ".@number_format($value, 2, '.', ',')."<br/>"; $total += $value;} } 
  $total = number_format($total, 2, '.', ',');?>
</td>

  </tr>
  
 
 
 </table>
 <br/><br/>
<table width="61%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ccc;"><tr><td style="text-align:center;font-size: 14px ; font-family:Helvetica; font-weight:bold; color:white; background-color:black; padding:14px 2%;">Banking Information</td></tr></table>
<table width="61%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ccc;">
                
                <tr><?php echo $address_for_pdf['address_column']; ?>
                 
                </tr>
              </table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ccc;" class="bottom_text">
  <tr>
    <td width="70%" class="first_text" valign="top"><p>Unless otherwise specified in writing, the Purchaser is obliged to pay the purchase price in full or pay a predetermined deposit prior to shipment of the goods by the Sylc Corporation.<br />
                Sylc Corporation makes no representations or warranties of any kind, expressed or implied, with respect to the vehicle(s), including, without
                limitation, any representations or warranties as to merchantability or fitness for any particular purpose, it being agreed that all such
                risks are to be borne by purchaser. The vehicle(s) is (are) being bought by purchaser "AS-IS "with all faults. The Sylc Corporation shall not be liable for the nonperformance of any of its obligations hereunder occasioned by any Act of God or any cause comprehended in the term "force majeure." The Vendor shall not be liable for any delay in the shipment or delivery of the goods.</p></td>
                
    <td width="15%" valign="top"><p class="small_text">Subtotal<br />
               
                <strong>Total</strong><br />
              </p>
             </td>
    <td width="15%" valign="top"><p class="small_text"><?php echo '$ '.$total;//echo $popup_details->subtotal;?><br />
                 
                <strong ><?php echo '$ '.$total; //echo $popup_details->total;?></strong><br />
              </p>
               <p class="small_text"><span>USD</span> </p></td>
  </tr>
</table>

<div style="padding-left: 45%;">
 <p class="drawItDesc">Write your Initials</p>
    <ul class="sigNav">
      <li class="drawIt"><a href="#draw-it" >Write It</a></li>
  
    </ul>
    <div class="sig sigWrapper" style="width: 63px;">
      <div class="typed"></div>
      
      <input type="text" name="output_initial" class="output_initial" style="width: 61px;height: 38px;" >
  
    </div>
       <div style="margin-top: 6px"> <?php echo $currenttime_canada_for_sign; ?> </div> 
</div>

<div class="text_content">
  <h1>Terms and Conditions</h1>
  
 <p>1. Sylc Corporation is a licensed automotive dealer under the laws of the State of Florida (“SC”), and specializes in the purchase and sale of automobiles in the
United States for the purpose of export.</p>
  <p>2. The Purchaser named in the Purchaser Order on the reverse side of this document hereby gives to SC the exclusive right to purchase the automobile identified
to the contract, or its reasonable equivalent (the “Automobile”), for a period of one year from the date hereof. The Purchaser understands, however, that this
Purchaser Order does not guarantee that SC will be able to locate and purchase the exact Automobile so specified.</p>
  <p>3. SC agrees to make diligent and continued efforts to locate and purchase the Automobile in accordance with the terms and conditions hereof.</p>
  <p>4. The Purchaser agrees to immediately make payment in full to SC if and when SC locates the Automobile and advises the Purchaser of the price therefor. SC
shall have the right, but not the obligation, to advance its own funds for the purchase of the Automobile. When SC acts as a transaction broker for the purchase of
the Automobile, the Purchaser has the affirmative obligation of wire transferring to SC the full amount of all funds required to purchase the Automobile, plus all
expenses, fees and/or commissions that are so specified by SC. If the Purchaser pays a deposit to SC prior to the purchase of the Automobile, and subsequently
fails to pay the full amount of the purchase price specified by SC after SC has located the Automobile, then SC shall be entitled to retain ( ) fifty (50%) percent of
the deposit; or ( ) the entire deposit [check one] as liquidated damages.</p>
  <p>5. SC may, at its option, act as either a Broker or a Dealer with respect to the purchase and sale of an automobile on behalf of the Purchaser. If SC elects to act
as a Broker, the Purchaser assents to SC acting as a transaction broker rather than strictly as a buyer’s broker. As a transaction broker or as a dealer, SC shall
facilitate the purchase and sale of the automobile on behalf of the Purchaser, but shall not have a fiduciary obligation to the Purchaser.</p>
  <p>6. The Purchaser shall indemnify and hold harmless SC and its officers, directors, employees, advisors, attorneys and agents from losses, damages, costs and
expenses of any nature, including attorneys’ fees through all appeals, and from liability to any person that SC may incur. This clause shall survive SC’s
performance and transfer of title to the automobile to the Purchaser.</p>
  <p>7. SC makes no warranties, express or implied, with respect to the Automobile, which shall be sold “as is” to the Purchaser. This Agreement will be construed
under Florida law. All controversies, claims and other matters arising out of this Purchase Order will be settled by first attempting mediation under the rules of the
American Mediation Association or other mediator selected by SC. Disputes not settled by mediation shall be resolved by neutral binding arbitration in Miami-
Dade County, Florida in accordance with the rules of the American Arbitration Association. An arbitrator shall be selected by SC from the panel of independent
Arbitrators in Miami-Dade County, Florida. Each party to the Arbitration shall pay its own fees and expenses, including attorneys’ fees, and shall equally split the
fees of the Arbitrator and administrative fees of the Arbitration.</p>
  <p>8. Purchaser is solely responsible for inspection and verification of condition, authenticity, and completeness of any purchased vehicle, any and all statements,
representations or warranties of any type of kind whatsoever made by SC employees or staff, including those printed in catalogs, brochures, signs, window cards,
verbal statements, or those appearing on SC’s website, represent only SC opinions. Further, purchaser acknowledges and agrees that he/she inspect or individual
of choice inspect the purchased vehicle prior to purchase. Purchaser should disregard statements or representations concerning the authenticity or condition of
the purchased vehicle, including that the vehicle is rust free. Purchaser agrees and acknowledges that SC and/or consignor of the vehicle disclaim all warranties,
expressed or implied, concerning and in relation to merchantability or fitness, condition, originality, authenticity, origin or provenance, matching numbers, previous
use or ownership, manufacturing or restoration processes, year or age, serial number, make, model, options, tools, components or mileage of any purchased
vehicle.</p>
  <p>9. In the event that the Purchaser requests SC to arrange for additional services on behalf of the Purchaser with respect to the Automobile (e.g. painting,
reconditioning, mechanical repairs, body repairs, etc.), SC shall select certain third parties to perform such services (the “Additional Services”), but in no event
shall SC be responsible for the Additional Services performed by such third parties, and the Purchaser shall be solely responsible for the payment of such
Additional Services, which may either be billed directly to the Purchaser by such third parties, or billed to the Purchaser by SC as an accommodation to the
Purchaser.</p>
  <p>10. SC has attempted to determine the authenticity and factory production figures of the vehicle you are purchasing. Not with standing SC's efforts regarding
documentation concerning the originality and/or authenticity of your vehicle, over the last several years many individuals with the benefit of modern technology
have "fake(d)" documents supporting to authenticate vehicle originality, including, but not limited to : "Re stamping Engines", "Sales Invoices", "Bills of Sale",
"Window Stickers", "Build Sheets", and/or Warranty Booklets and Materials. Because of the proliferation of re stamped engines and "fake(d)" documents SC is not
responsible for authenticating data concerning the originality or authenticity of the vehicle you are purchasing.</p>
  <p>11. The terms and conditions hereof are binding on the Purchaser, his/her heirs, successors and assigns. No prior or present agreements between SC and the
Purchaser shall be binding unless included as an addendum to this Purchaser Order Agreement.</p>          		
  

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:15px 0;" class="btm_tbll">
<tr><td  width="100%" align="center" class="btm_heading"> We Appreciate Your Business</td></tr>
          <tr >
          
          <td width="100%" align="center"> 
          
           <?php /*?><label for="name">Print your name</label>
    <input type="text" name="name" id="name" class="name"><?php */?>
    <p class="drawItDesc drawItDesc02">Draw your Signature</p>
    <ul class="sigNav sigNav02">
      <li class="drawIt"><a href="#draw-it" >Draw It</a></li>
      <li class="clearButton clearButton02"><a href="#clear">Clear</a></li>
    </ul>
    <div class="sig sigWrapper sigWrapper02">
      <div class="typed"></div>
      <canvas class="pad" width="198" height="55"></canvas>
      <input type="hidden" name="output" class="output">
  
    </div>
       <div style="margin-top: 6px"> <?php echo $currenttime_canada_for_sign; ?> </div> 
        
     
          </tr>
          
          
          <tr><td  width="100%" align="center"> 
          <input type="hidden" name="idforpdfmail" value="<?php echo $id;?>">
           <input type="hidden" name="lead_id" value="<?php echo $lead_id;?>">
             <input type="hidden" name="hiddenpdf" value="hiddenpdfvalue">
            <input type="hidden" name="sign_date" value="<?php echo $currenttime_canada_for_sign;?>" id="sign_date">
            <input type="hidden" name="email_for_user_pdf" value="<?php echo $popup_details->email; ?>" id="email_for_user_pdf">
          <input type="submit" value="Submit" class="submit"/></td> </tr>
          
        </table>
</form>

</div> 
   
</div>




  <script src="jquery.signaturepad.min.js"></script>
  <script>
    $(document).ready(function() {
    	$('.sigPad').signaturePad({drawOnly:true});
      //$('.sigPad').signaturePad();
    });
  </script>
  <script src="json2.min.js"></script>
  <?php }?>
</body>
</html>
