<?php
	if ($_SERVER["HTTPS"] != "on")
{
			header('Location: https://localhost/csv.php');
	}
	
	
	session_start();
	if(!isset($_SESSION['myusername'])){
	header("location:login.php");
	}
	
	?>
<!DOCTYPE html> 
<html>
<head>
<title>Insert CSV</title>
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
      <p><strong>Bitte CSV Datei eingeben</strong></p>
      <p><div id="insert">
<form method="post" accept-charset="utf-8">
Field:</br> <textarea rows="15" cols="75" name="CSV"></textarea>
<input type="submit">
</form>
</div></p>
    </div>
  </div>
	
 <?php 
	include'menu.php';
	
	
 ?>

<?php
	if( isset( $_POST[ 'CSV' ] ) ) {
	$CSV = $_POST['CSV'];
	
	$array = array();
	$array = explode("\n", $CSV);
	$numberofrows=count($array);
//MYSQL KAPCSOLAT/2. EXPLODE/ VÉDELEM "" ELLEN/PARTNER NEVE SOR KIHAGY
	$mysqli = new mysqli("localhost","root","","finanzen");
				if($mysqli->connect_errno)
				{
					echo "MySQL Fehler: " . $mysqli->connect_error . "<BR/>";
				}
			mysqli_set_charset($mysqli, "utf8");
			foreach($array as $key => $CSV)
			{
				$currentrowarray =explode(",",$CSV );
				for($i=0; $i<17; $i++){
					$currentrowarray[$i] =stripslashes($currentrowarray[$i]);
					$currentrowarray[$i] =mysql_real_escape_string($currentrowarray[$i]);
	
				}
				
			
				
			
			if($currentrowarray[0]!='Tranzakció dátuma'){
				$sql="SELECT KategorieName FROM Kategorie JOIN Autokategorie ON Kategorie.KategorieID = autokategorie.KategorieID 
				WHERE '$currentrowarray[1]'  LIKE CONCAT('%', Zeichenkette, '%')";
					$result=mysqli_query($mysqli,$sql);
					$count=mysqli_num_rows($result);
					//echo $count;
					if($count!=0){
						$KategName = array();
								while ( $row = $result->fetch_row() ) {
			
									$KategName[]= $row;
								}
						//echo $KategName[0][0];
						$query= sprintf("INSERT INTO transaktionen (KategorieName,TransaktionsDatum, BenutzerName, BenutzerKonto, KontoName, KontoNummer,
				TransaktionsTyp, TransaktionsSumme, TransaktionsDevisen, TransaktionsUSumme, TransaktionsUDevisen, EinnameoderAusgabe,
				KartenNummer, Wertstellung, Mitteilung, Daten, KontoStand, DevisenTyp)  VALUES('%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'
				,'%s','%s','%s','%s','%s','%s','%s')",$KategName[0][0],$currentrowarray[0], $currentrowarray[1],$currentrowarray[2],$currentrowarray[3],$currentrowarray[4],
				$currentrowarray[5],$currentrowarray[6],$currentrowarray[7],$currentrowarray[8],$currentrowarray[9],$currentrowarray[10],
				$currentrowarray[11],$currentrowarray[12],$currentrowarray[13],$currentrowarray[14],$currentrowarray[15],$currentrowarray[16]); 
				$mysqli->query($query);
					}
					else{
						$query= sprintf("INSERT INTO transaktionen (TransaktionsDatum, BenutzerName, BenutzerKonto, KontoName, KontoNummer,
				TransaktionsTyp, TransaktionsSumme, TransaktionsDevisen, TransaktionsUSumme, TransaktionsUDevisen, EinnameoderAusgabe,
				KartenNummer, Wertstellung, Mitteilung, Daten, KontoStand, DevisenTyp)  VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'
				,'%s','%s','%s','%s','%s','%s','%s')",$currentrowarray[0], $currentrowarray[1],$currentrowarray[2],$currentrowarray[3],$currentrowarray[4],
				$currentrowarray[5],$currentrowarray[6],$currentrowarray[7],$currentrowarray[8],$currentrowarray[9],$currentrowarray[10],
				$currentrowarray[11],$currentrowarray[12],$currentrowarray[13],$currentrowarray[14],$currentrowarray[15],$currentrowarray[16]); 
				$mysqli->query($query);
					}
							
				
	}
			}
$mysqli->close(); 
	}

		
?>


 <div id="footer">
    <p>Panda 2015</p>
  </div>
 </div>
</body>
 </html>
