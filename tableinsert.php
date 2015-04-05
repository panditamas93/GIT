
<?php

<form action=\"< include 'tableinsert.php';?>\"><div>
				<select name=\"menu\">
				<option value=\"0\" selected>(please select:)</option>
				<option value=\"1\">one</option>
				<option value=\"2\">two</option>
				<option value=\"3\">three</option>
				<option value=\"other\">other, please specify:</option>
				</select>
				<input type=\"text\" name=\"choicetext\"></div>
				<div><input type=\"submit\" value=\"submit\"></div>
				</form>");
			//	$selectOption = $_POST['taskOption'];




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


?>

// jo kis tableaccess eredti kod

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

		//mysqli_set_charset($mysqli2, "utf8");
		
		$mysqli->real_query("SELECT *  FROM kategorie");
		$result2 = $mysqli->use_result();
	/*while ($row2 = $result2->fetch_row() ) {
		echo $row2[0];
	}*/
		/*printf("<select>
			<option value=\"Lebensmittel\">Lebensmittel</option>
		<option value=\"Sport\">Sport</option>
		<option value=\"Dienstleistungen\">Dienstleistungen</option>
		<option value=\"Sonstiges\">Sonstiges</option>
		</select>");*/
			printf("<select>");
				/*foreach($array as $key => $result2){
					printf("<option value=%s>%s</option>",$key,$key);
				}*/
			printf("</select>");
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
