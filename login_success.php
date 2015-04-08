<?php session_start();
	if(!isset($_SESSION['myusername'])){
	header("location:login.php");
	}
	
	?>
<!DOCTYPE html> 
<html>
<head>
<title>Welcome</title>
<meta charset='utf-8'>
<link rel="stylesheet" type="text/css" href="csstext.css" />

</head>
 <body>	
 <div id="keret">
	<div id="fejléc">
		<h1>Welcome</h1>
	</div>
	
	<div id="wrapper">
    <div id="content">
      <p><strong>Choose what you want to do</strong></p>
      
    </div>
  </div>
	
 <?php 
	include'menu.php';
	echo "Hi: ".$_SESSION['myusername']."</br>";
	
 ?>




 <div id="footer">
    <p>Panda 2015</p>
  </div>
 </div>
</body>
 </html>
