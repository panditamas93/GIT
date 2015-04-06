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
	<li><A href="http://localhost/csv.php">Insert CSV</A></li>
	<li><A href="http://localhost/tableaccess.php">Tableaccess</A></li>
	<li><A href="http://localhost/settings.php">Settings</A></li>
	<li><A href="http://localhost/session_kill.php">Logout</A>
	</ul>
	</div>
 <?php 
	
	echo "Hi: ".$_SESSION['myusername']."</br>";
 ?>
	
 <?php 
 $kaki=1;
		if( isset( $_POST[ 'TransaktionsDatum' ])/*&& isset( $_POST[ 'BenutzerName' ]  ) &&
			isset( $_POST[ 'KontoNummer' ])       && isset( $_POST[ 'TransaktionsSumme' ])*/  ){
				
				
				
				$KategorieName = $_POST[ 'KategorieName' ];
				$TransaktionsDatum = $_POST[ 'TransaktionsDatum' ];
				$BenutzerName = $_POST[ 'BenutzerName' ];
				$BenutzerKonto = $_POST[ 'BenutzerKonto' ];
				$KontoName = $_POST[ 'KontoName' ];
				$KontoNummer = $_POST[ 'KontoNummer' ];
				$TransaktionsTyp = $_POST[ 'TransaktionsTyp' ];
				$TransaktionsSumme = $_POST[ 'TransaktionsSumme' ];
				$TransaktionsDevisen = $_POST[ 'TransaktionsDevisen' ];
				$TransaktionsUSumme = $_POST[ 'TransaktionsUSumme' ];
				$TransaktionsUDevisen = $_POST[ 'TransaktionsUDevisen' ];
				$EinnameoderAusgabe = $_POST[ 'EinnameoderAusgabe' ];
				$KartenNummer = $_POST[ 'KartenNummer' ];
				$Wertstellung = $_POST[ 'Wertstellung' ];
				$Mitteilung = $_POST[ 'Mitteilung' ];
				$Daten = $_POST[ 'Daten' ];
				$KontoStand = $_POST[ 'KontoStand' ];
				$DevisenTyp = $_POST[ 'DevisenTyp' ];
				
				$mysqli = new mysqli("localhost","root","","finanzen");
				if($mysqli->connect_errno)
				{
					echo "MySQL Fehler: " . $mysqli->connect_error . "<BR/>";
				}
				
				$sql=sprintf("INSERT INTO transaktionen (KategorieName,TransaktionsDatum,BenutzerName,BenutzerKonto,
					KontoName,KontoNummer,TransaktionsTyp,TransaktionsSumme,TransaktionsDevisen,TransaktionsUSumme,
					TransaktionsUDevisen,EinnameoderAusgabe,KartenNummer,Wertstellung,Mitteilung,Daten,
					KontoStand,DevisenTyp)
VALUES ('$KategorieName', '$TransaktionsDatum', '$BenutzerName','$BenutzerKonto','$KontoName','$KontoNummer',
'$TransaktionsTyp','$TransaktionsSumme','$TransaktionsDevisen','$TransaktionsUSumme','$TransaktionsUDevisen',
'$EinnameoderAusgabe', '$KartenNummer','$Wertstellung','$Mitteilung','$Daten','$KontoStand','$DevisenTyp')");
				$mysqli->query($sql);
				$mysqli->close(); 
				
				
				
				
				
				
				
				
			}
 ?>
 <div id="login">
	  <form method="POST"> 
            KategorieName: <input type="text" name="KategorieName" /> <br /> 
            TransaktionsDatum:     <input type="text" name="TransaktionsDatum" /> <br /> 
			BenutzerName:     <input type="text" name="BenutzerName" /> <br /> 
			BenutzerKonto:     <input type="text" name="BenutzerKonto" /> <br /> 
			KontoName:     <input type="text" name="KontoName" /> <br /> 
			 KontoNummer:     <input type="text" name=" KontoNummer" /> <br /> 
			TransaktionsTyp:     <input type="text" name="TransaktionsTyp" /> <br /> 
			TransaktionsSumme:     <input type="text" name="TransaktionsSumme" /> <br /> 
			TransaktionsDevisen:     <input type="text" name="TransaktionsDevisen" /> <br /> 
			TransaktionsUSumme:     <input type="text" name="TransaktionsUSumme" /> <br /> 
			TransaktionsUDevisen:     <input type="text" name="TransaktionsUDevisen" /> <br /> 
			EinnameoderAusgabe:     <input type="text" name="EinnameoderAusgabe" /> <br /> 
			KartenNummer:     <input type="text" name="KartenNummer" /> <br /> 
			Wertstellung:     <input type="text" name="Wertstellung" /> <br /> 
			Mitteilung:     <input type="text" name="Mitteilung" /> <br /> 
			Daten:     <input type="text" name="Daten" /> <br /> 
			KontoStand:     <input type="text" name="KontoStand" /> <br /> 
			DevisenTyp:     <input type="text" name="DevisenTyp" /> <br /> 
			<input type="submit"/> 
        </form>
		</div>
 <div id="footer">
    <p>Panda 2015</p>
  </div>
 
 </div>
</body>
 </html>