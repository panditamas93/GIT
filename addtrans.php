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
	<h1>ADD TRANSAKTION</h1>
	</div>
	<div id="wrapper">
    <div id="content">
      <p><strong>YESSS</strong></p>
      <p>ide kéne</p>
    </div>
  </div>
	<div id="menu">
	<p><strong>Menu</strong></p>
	<ul>
	<li><A href="http://localhost/addtrans.php">Neue Transaktion</A></li>
	<li><A href="http://localhost/tableaccess.php">Tableaccess</A></li>
	<li><A href="http://localhost/session_kill.php">Logout</A>
	</ul>
	</div>
 <?php 
	
	echo "Hi: ".$_SESSION['myusername']."</br>";
 ?>
 
 
 
 
 <div id="footer">
    <p>Panda 2015</p>
  </div>
 
 </div>
</body>
 </html>