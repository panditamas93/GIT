<?php session_start();
	if(!isset($_SESSION['myusername'])){
	header("location:login.php");
	}
	
	?>
<html>
 <body bgproperties="fixed" bgcolor="pink">	
 <h1> WELCOME</h1>
 <?php 
	
	echo "Hi: ".$_SESSION['myusername']."</br>";
 ?>


<?php
	if( isset( $_POST[ 'CSV' ] ) ) {
	$CSV = $_POST['CSV'];
	
	
//MULTIDIMENSIONAL ARRAY/GET NUMBER OF ROWS

$array = array();
$array = explode("\n", $CSV);
$numberofrows=count($array);
//echo $numberofrows;
	$mysqli = new mysqli("localhost","root","","finanzen");
				if($mysqli->connect_errno)
				{
					echo "MySQL Fehler: " . $mysqli->connect_error . "<BR/>";
				}
foreach($array as $key => $CSV)
{
	$currentrowarray =explode(",",$CSV );
	
	
	
	
	$query= sprintf("INSERT INTO transaktionen (TransaktionsDatum, BenutzerName, BenutzerKonto, KontoName, KontoNummer,
    TransaktionsTyp, TransaktionsSumme, TransaktionsDevisen, TransaktionsUSumme, TransaktionsUDevisen, EinnameoderAusgabe,
	KartenNummer, Wertstellung, Mitteilung, Daten, KontoStand, DevisenTyp)  VALUES( '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'
	,'%s','%s','%s','%s','%s','%s','%s')",$currentrowarray[0], $currentrowarray[1],$currentrowarray[2],$currentrowarray[3],$currentrowarray[4],
	$currentrowarray[5],$currentrowarray[6],$currentrowarray[7],$currentrowarray[8],$currentrowarray[9],$currentrowarray[10],
	$currentrowarray[11],$currentrowarray[12],$currentrowarray[13],$currentrowarray[14],$currentrowarray[15],$currentrowarray[16]); 
	$mysqli->query($query); 
}






$mysqli->close(); 

	}

		
?>
<form method="post">
Field:</br> <textarea name="CSV"></textarea>
<input type="submit">
</form>
 <A href="http://localhost/session_kill.php">Logout</A>
 

 
 
 
 
 
 
 </body>
 </html>
