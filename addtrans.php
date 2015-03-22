<?php session_start();
	if(!isset($_SESSION['myusername'])){
	header("location:login.php");
	}
	
	?>
<!DOCTYPE html> 	
<html>
<head>
<title>Add transaktion</title>
<meta charset='utf-8'>
<link rel="stylesheet" type="text/css" href="csstext.css" />
</head>
 <body>	
 <div id="keret">
	<div id="fejléc">
	ADD TRANSAKTION
	</div>
	
	<div id="menu">
	<A href="http://localhost/addtrans.php">Neue Transaktion</br></A>
	<A href="http://localhost/tableaccess.php">Tableaccess</br></A>
	<A href="http://localhost/session_kill.php">Logout</A>
	</div>
 <?php 
	
	echo "Hi: ".$_SESSION['myusername']."</br>";
 ?>
 
 
 
 
 
 
 </div>
</body>
 </html>