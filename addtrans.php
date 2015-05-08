<?php 

	if ($_SERVER["HTTPS"] != "on")
{
			header('Location: https://localhost/addtrans.php');
	}


	session_start();
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
	<h1>Add transaktion</h1>
	</div>
	<div id="wrapper">
    <div id="content">
      <p><strong>YESSS</strong></p>
      <p>ide kéne</p>
    </div>
  </div>
	
 <?php 
	include'menu.php';
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

echo("
 <div id=\"login\">");
 echo("<TABLE>");
	  echo("<form method=\POST\">");
			
			
			echo("<TR><TD>KategorieName:</TD>");
            echo("<TD><input type=\"text\" name=\"KategorieName\" /> <br /> </TD></TR>"); 
			echo("<TR><TD>TransaktionsDatum:</TD>");
            echo("<TD><input type=\"text\" name=\"TransaktionsDatum\" /> <br /> </TD></TR>");
			echo("<TR><TD>BenutzerName:</TD>");
			echo("<TD><input type=\"text\" name=\"BenutzerName\" /> <br /></TD></TR>"); 
			echo("<TR><TD>BenutzerKonto:</TD>");
			echo("<TD><input type=\"text\" name=\"BenutzerKonto\" /> <br /></TD></TR>"); 
			echo("<TR><TD>KontoName:</TD>");
			echo("<TD><input type=\"text\" name=\"KontoName\" /> <br /></TD></TR>"); 
			echo("<TR><TD>KontoNummer:</TD>");
			echo("<TD><input type=\"text\" name=\" KontoNummer\" /> <br /></TD></TR>"); 
			echo("<TR><TD>TransaktionsTyp:</TD>");
			echo("<TD><input type=\"text\" name=\"TransaktionsTyp\" /> <br /></TD></TR>"); 
			echo("<TR><TD>TransaktionsSumme:</TD>");
			echo("<TD><input type=\"text\" name=\"TransaktionsSumme\" /> <br /> </TD></TR>");
			echo("<TR><TD>TransaktionsDevisen:</TD>");
			echo("<TD><input type=\"text\" name=\"TransaktionsDevisen\" /> <br /></TD></TR>");
			echo("<TR><TD>TransaktionsUSumme:</TD>");
			echo("<TD><input type=\"text\" name=\"TransaktionsUSumme\" /> <br /></TD></TR>");  
			echo("<TR><TD>TransaktionsUDevisen:</TD>");
			echo("<TD><input type=\"text\" name=\"TransaktionsUDevisen\" /> <br /> </TD></TR>");
			echo("<TR><TD>EinnameoderAusgabe:</TD>");
			echo("<TD><input type=\"text\" name=\"EinnameoderAusgabe\" /> <br /> </TD></TR>");
			echo("<TR><TD>KartenNummer:</TD>");
			echo("<TD><input type=\"text\" name=\"KartenNummer\" /> <br /> </TD></TR>");
			echo("<TR><TD>Wertstellung:</TD>");
			echo("<TD><input type=\"text\" name=\"Wertstellung\" /> <br /> </TD></TR>");
			echo("<TR><TD>Mitteilung: </TD>");
			echo("<TD><input type=\"text\" name=\"Mitteilung\" /> <br /> </TD></TR>"); 
			echo("<TR><TD>Daten:</TD>");
			echo("<TD><input type=\"text\" name=\"Daten\" /> <br /></TD></TR>"); 
			echo("<TR><TD>KontoStand:</TD>");
			echo("<TD><input type=\"text\" name=\"KontoStand\" /> <br /></TD></TR>"); 
			echo("<TR><TD>DevisenTyp:</TD>");
			echo("<TD><input type=\"text\" name=\"DevisenTyp\" /> <br /> </TD></TR>"); 
			echo("<TR><TD><input type=\"submit\"/></TD></TR>");
			 
        echo("</form>");
		echo("</TABLE>");
		
		echo("</div>");
		?>
 <div id="footer">
    <p>Panda 2015</p>
  </div>
 
 </div>
</body>
 </html>