<?php
$to = 'yoann.attia@sylc-export.com';
$subject = 'Par demande de d�sabonnement '.$_GET['name'];
$message = "Salut SYLC �quipe,<br /><br />J'ai demand� � r�silier votre abonnement � votre newsletter ou promotions. Les d�tails sont <br /><br />nom : ".$_GET['name']."<br />Email : ".$_GET['email']."<br /><br />Merci";
$from = $_GET['email'];
$headers = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
//$headers .= "CC: 4004@dothejob.org\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail($to,$subject,$message,$headers);
?>