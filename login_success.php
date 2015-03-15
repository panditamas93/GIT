<?php session_start();
	if(!isset($_SESSION['myusername'])){
	header("location:login.php");
	}
	
	?>
<html>
 <body background="GranTurismo5CorvetteStingray.jpg" bgproperties="fixed" bgcolor="blue">	
 <h1> WELCOME</h1>
 <?php 
	
	echo "Hi: ".$_SESSION['myusername']."</br>";
 
 
 ?>
<form method="POST"> 
	Nachricht: <input type="text" name="Nachricht" /> <br /> 
    <input type="submit"/> 
	</form>
 <?php
 
    	$_SESSION['Nachricht']=$_POST['Nachricht'];
?>
	<hr/>
<?php
echo($_SESSION['Nachricht']);
?>

 <A href="http://localhost/session_kill.php">Logout</A>
 </body>
 </html>