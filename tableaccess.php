<?php session_start();
	if(!isset($_SESSION['myusername'])){
	header("location:login.php");
	}
	
	?>

	
<html>
<head>
<title>Show table</title>
<meta charset='utf-8'>
</head>
 <body bgproperties="fixed" bgcolor="pink">	
 <h1> Klicke um die Tabelle anzuzeigen</h1>
 <?php 
	
	echo "Hi: ".$_SESSION['myusername']."</br>";
 ?>
 
 <form action="tableaccess.php" method="get">
  <input type="hidden" name="act" value="run">
  <input type="submit" value="Tabelle anzeigen!">
</form>


<TABLE>
<TR><TH> TransaktionsID</TH><TH> BenutzerID</TH><TH> KategorieName</TH><TH> TransaktionsDatum</TH>
<TH> BenutzerName</TH><TH> BenutzerKonto</TH><TH> KontoName</TH><TH> KontoNummer</TH>
<TH> TransaktionsTyp</TH><TH> TransaktionsSumme</TH><TH> TransaktionsDevisen</TH><TH> TransaktionsUSumme</TH>
<TH> TransaktionsUDevisen</TH><TH> EinnameoderAusgabe</TH><TH> KartenNummer</TH><TH> Wertstellung</TH>
<TH> Mitteilung</TH><TH> Daten</TH><TH> KontoStand</TH><TH> DevisenTyp</TH>


</TR>
 <?php
  if (!empty($_GET['act'])) {
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
		
		printf("<TR bgcolor='%s'><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD>
		<TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD>
		<TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD><TD>%s </TD></TR></br>", 
		$bgcolor, $row[0], $row[1], $row[2],$row[3], $row[4], $row[5], $row[6], $row[7], $row[8]
		, $row[9], $row[10], $row[11], $row[12], $row[13], $row[14], $row[15], $row[16], $row[17], $row[18]
		, $row[19]); 
		$i++;
	}


    $result->close();
    $mysqli->close();
  } 
  }
?>
</TABLE>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
<A href="http://localhost/addtrans.php">Neue Transaktion</br></A>
 <A href="http://localhost/session_kill.php">Logout</A>
 
</body>
 </html>