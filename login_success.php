<?php session_start();
	if(!isset($_SESSION['myusername'])){
	header("location:login.php");
	}
	
	?>
<html>
 <body bgproperties="fixed" bgcolor="blue">	
 <h1> WELCOME</h1>
 <?php 
	
	echo "Hi: ".$_SESSION['myusername']."</br>";
 ?>


<?php
$CSV = $_POST['CSV'];
$rows=explode("\n",$CSV);
$numberofrows=count($rows);



















//$data = str_getcsv($CSV);
//$data2 = explode(",", $data)

//$darabok= explode(",",$CSV);
/*for($i =0; $i<7; $i++){
	echo "Darab $i=$darabok[$i] <br/>";
}*/
// insert record
//$sql="INSERT INTO posts (postTitle, postDescription) VALUES ('$_POST[formPostTitle]','$varFormPostDescription')";
?>
<form method="post">
Field:</br> <textarea name="CSV"></textarea>
<input type="submit">
</form>
 <A href="http://localhost/session_kill.php">Logout</A>
 </body>
 </html>