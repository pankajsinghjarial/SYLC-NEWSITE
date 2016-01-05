<?php 
include("conf/config.inc.php");
extract($_POST);
if($page == 'logout') {
	$_SESSION['loginuser']=array();
	unset($_SESSION['loginuser']['username']);
	//session_destroy();	
}else {

$con = mysql_connect(DB_HOST,DB_USER,DB_PASS)or die('Host not connected');
// Check connection
if (!$con)
{
	echo "Failed to connect to mysql: ";
}
mysql_select_db(DB_SYL_NAME,$con)or die('database not selected');
$pass = md5($id);
$result = mysql_query("SELECT * FROM users where username = '$page' and password = '$pass'");
mysql_num_rows($result);
if(mysql_num_rows($result) > 0 )
{
	$row = mysql_fetch_object($result);
	$_SESSION['loginuser'] = array('id'=>$row->id,'username'=>$row->username,'popup'=>1);

	/*if(isset($_SESSION['loginuser']['id'])) {
		$loginid = $_SESSION['loginuser']['id'];
		$concar=mysql_connect("localhost","sylcexpo_syadmin","admin1234");
		// Check connection
		mysql_select_db('sylcexpo_sylcorp',$concar);
		$result1 = mysql_query("select l.*,ld.* from lead_details as ld left join leads as l on l.id=ld.lead_id where l.user_id = '$loginid'");
		if(mysql_num_rows($result1) > 0 ) {
			//if(mysql_num_rows($result1) == 1) {
			     $row1 = mysql_fetch_object($result1);?>
				<script type="text/javascript">location.href = 'http://www.sylc-export.com/voitures-americaines/landing.php?lead_detail=<?php echo $row1->id ?>';</script> <?php 
				// } 
			    }
			}*/



	?>
	<script type="text/javascript">
	location.reload();
	</script>

	<?php
    //print_r($_SESSION);
}
else {
	echo "<font color='#FF0000' family='verdana' size=2> Nom d'utilisateur et Mot de passe ne correspondent pas </font>";
}

} ?>
