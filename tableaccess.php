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
		<TH> BenutzerName</TH><TH> BenutzerKonto</TH><TH> KontoName</TH><TH> KontoNummer</TH>
		<TH> TransaktionsTyp</TH><TH> TransaktionsSumme</TH><TH> TransaktionsDevisen</TH><TH> TransaktionsUSumme</TH>
		<TH> TransaktionsUDevisen</TH><TH> EinnameoderAusgabe</TH><TH> KartenNummer</TH><TH> Wertstellung</TH>
		<TH> Mitteilung</TH><TH> Daten</TH><TH> KontoStand</TH><TH> DevisenTyp</TH>


		</TR>");
   $mysqli = new mysqli("localhost", "root", "", "finanzen");
	if ($mysqli->connect_errno) {
	    echo "<P/>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	else
	{
	mysqli_set_charset($mysqli, "utf8");
	$mysqli->real_query("SELECT *  FROM Transaktionen");
	$result = $mysqli->use_result();
    $i=1;
	
	while ($row = $result->fetch_row() ) {
		if($i % 2 == 1)
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
		printf("<select>
			<option value=\"Lebensmittel\">Lebensmittel</option>
		<option value=\"Sport\">Sport</option>
		<option value=\"Dienstleistungen\">Dienstleistungen</option>
		<option value=\"Sonstiges\">Sonstiges</option>
		</select>");
		printf("</TD><TD>%s </TD><TD>%s </TD>
		<TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD>
		<TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD></TR></br>", 
		 $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]
		, $row[9], $row[10], $row[11], $row[12], $row[13], $row[14], $row[15], $row[16], $row[17], $row[18]
		, $row[19]);
		
	}
		
	else{	
		printf("<TR bgcolor='%s' font color='%s'><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD>
		<TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD>
		<TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD></TR></br>", 
		$bgcolor,$fontcolor, $row[0], $row[1], $row[2],$row[3], $row[4], $row[5], $row[6], $row[7], $row[8]
		, $row[9], $row[10], $row[11], $row[12], $row[13], $row[14], $row[15], $row[16], $row[17], $row[18]
		, $row[19]); 
	}
		$i++;
	}


    $result->close();
    $mysqli->close();
  } 
  }
?>

</TABLE>
</div>



<div id="footer">
    <p>Panda 2015</p>
  </div>
 
 
 
 
 
 </div>
</body>
 </html>