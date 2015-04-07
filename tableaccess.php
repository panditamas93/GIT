<?php session_start();
	if(!isset($_SESSION['myusername'])){
	header("location:login.php");
	}
	
	?>

<!DOCTYPE html> 	
<html>
<head>
<title>Show table</title>
<meta charset='utf-8'>
<link rel="stylesheet" type="text/css" href="csstext.css" />
</head>
 <div id="keret">
 <body>	
	<div id="fejléc">
		<h1>Klicke um die Tabelle anzuzeigen</h1>
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
 <div id="gomb">
 <form action="tableaccess.php" method="get">
  <input type="hidden" name="act" value="run">
  <input type="submit" value="Tabelle anzeigen!">
</form>
</div>


 <?php
 
	
  if (!empty($_GET['act'])) {
	  printf("<div id=\"tábla\">
	<TABLE>
		<TR><TH> TransaktionsID</TH><TH> BenutzerID</TH><TH> KategorieName</TH><TH> TransaktionsDatum</TH>
		<TH> PartnerName</TH><TH> BenutzerKonto</TH><TH> KontoName</TH><TH> KontoNummer</TH>
		<TH> TransaktionsTyp</TH><TH> TransaktionsSumme</TH><TH> TransaktionsDevisen</TH><TH> TransaktionsUSumme</TH>
		<TH> TransaktionsUDevisen</TH><TH> EinnameoderAusgabe</TH><TH> KartenNummer</TH><TH> Wertstellung</TH>
		<TH> Mitteilung</TH><TH> Daten</TH><TH> KontoStand</TH><TH> DevisenTyp</TH>


		</TR>");
	//Kategorie beolvasás tömbbe	
	$mysqli = new mysqli("localhost", "root", "", "finanzen");
		if ($mysqli->connect_errno) {
			echo "<P/>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		else
		{
			mysqli_set_charset($mysqli, "utf8");
			$mysqli->real_query("SELECT KategorieName  FROM Kategorie");
			$result = $mysqli->use_result();
			$kategorie = array();
		
		$j=0;
		while ( $row = $result->fetch_row() ) {
			
			$kategorie[]= $row;
			$j++;
		}
		
		/*for($i=0; $i<$j; $i++){
			echo $kategorie[$i][0];
		}*/
	$result->close();
    
  
  ////////////////////////////
  //tabla beolvasás
		$mysqli->real_query("SELECT *  FROM Transaktionen");
		$result = $mysqli->use_result();
		$k=0; //number of selected row
		
		echo("<form id=\"search\" action=\"\" method=\"post\">");
		$KatNum=0; //count of kategories
		while ($row = $result->fetch_row() ) {
			if($k % 2 == 1)
			{
				$bgcolor ="red";
				$fontcolor ="yellow";
			}
			else
			{
				$bgcolor ="lightblue";
				$fontcolor ="red";
			}
			
		if(!$row[2]){
			
			printf("<TR bgcolor='%s' font color='%s' ><TD>%s </TD><TD>%s </TD><TD>",$bgcolor,$fontcolor, $row[0], $row[1]);
			printf("<select  name=\"menu%s\" id=\"%s\" >",$KatNum,$KatNum);
			printf("<option value=\"\" selected>(please select:)</option>");
			for($i=0; $i<$j; $i++){
				printf("<option value=%s>%s</option>",$kategorie[$i][0], $kategorie[$i][0]);
			}
			${'Menu'.$KatNum}= $row[0];
			printf("</select>");
			printf("</TD><TD>%s </TD><TD>%s </TD>
				<TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD>
				<TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD></TR></br>", 
				$row[3], $row[4], $row[5], $row[6], $row[7], $row[8]
				, $row[9], $row[10], $row[11], $row[12], $row[13], $row[14], $row[15], $row[16], $row[17], $row[18]
				, $row[19]);
				
				
			$KatNum++;	
		}
		else{	
			printf("<TR bgcolor='%s' font color='%s'><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD>
			<TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD>
			<TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD></TR></br>", 
			$bgcolor,$fontcolor, $row[0], $row[1], $row[2],$row[3], $row[4], $row[5], $row[6], $row[7], $row[8]
			, $row[9], $row[10], $row[11], $row[12], $row[13], $row[14], $row[15], $row[16], $row[17], $row[18]
			, $row[19]); 
		}
		$k++;
		
		}	
		
		echo("</TABLE>");
		echo("</div>");
		//echo("<input type=\"text\" name=\"choicetext\"></div>");
		echo("<div><input type=\"submit\" value=\"submit\"></div>");
		echo("</form>");
		$result->close();
		$mysqli->close();
		
		}	
		
		
		
$mysqli = new mysqli("localhost","root","","finanzen");
				if($mysqli->connect_errno)
				{
					echo "MySQL Fehler: " . $mysqli->connect_error . "<BR/>";
				}
			mysqli_set_charset($mysqli, "utf8");
		$BULI=0;
		for($i=0;$i<$KatNum;$i++){
		if(isset($_POST['menu'.$i]))
			{
				
				$SelectOption =$_POST['menu'.$i];
				if($SelectOption!=NULL){
				$sql = sprintf("UPDATE Transaktionen SET KategorieName='%s' WHERE TransaktionsID='%s'",$SelectOption,${'Menu'.$i});
				$mysqli->query($sql); 
				$BULI=1;
				
				}
			}
			
			/*else {
				echo("SZAR");
				
			
			}*/
		}
			
		
  $mysqli->close();
  /////////////////////////////////////////////////////
  //combobox select feldolgozás
	
	if($BULI==1){
		
		echo("<div id=\"gomb\">
 <form action=\"tableaccess.php\" method=\"get\">
  <input type=\"hidden\" name=\"act\" value=\"run\">
  <input type=\"submit\" value=\"REFRESH PAGE!\">
</form>");

		
		
		
		
	}	
  }
		?>
		
		







<div id="footer">
    <p>Panda 2015</p>
  </div>
 
 
 
 
 
 </div>
</body>
 </html>