<?php session_start();
	if(!isset($_SESSION['myusername'])){
	header("location:login.php");
	}
	
	?>
	
<html>
<head>
<title>Insert CSV</title>
<meta charset='utf-8'>
</head>
 <body bgproperties="fixed" bgcolor="pink">	
 <h1> WELCOME</h1>
 <?php 
	
	echo "Hi: ".$_SESSION['myusername']."</br>";
 ?>
 
 
 
 <A href="http://localhost/tableaccess.php">Tableaccess</br></A>
<A href="http://localhost/session_kill.php">Logout</A>
 
</body>
 </html>