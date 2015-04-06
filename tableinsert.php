
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
/////////////////////////////////////////////////////////////////////////////////
STATISTICS
>
<body>
<?php
    mysql_connect('localhost','root','');
    mysql_select_db('finanzen');
?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript"> 
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {var data = google.visualization.arrayToDataTable([
   <?php
   $str=" ['Month', 'Month'] ";
   
  SELECT country,COUNT(*)  
FROM author        
GROUP BY country;
   $query="select KategorieName, COUNT(*) as vi, DATE_FORMAT( date, '%M' ) as dat from Transaktionen group by DATE_FORMAT(TransaktionsDatum, '%Y-%M') order by DATE_FORMAT(TransaktionsDatum, '%Y-%M') ASC";  
   $result=mysql_query($query);   
   while($rows=mysql_fetch_array($result,MYSQL_BOTH)){
    $str =$str . ",['". $rows['dat'] ."'," .$rows['vi'] ."]" ;
   }
   echo $str;
   ?>
        ]);

      var options = {
          //title: 'Company Performance',
          hAxis: {title: 'Month', titleTextStyle: {color: 'red'}},
          vAxis: {title: 'Total views', titleTextStyle: {color: '#FF0000'}, maxValue:'5', minValue:'1'},
        };
  
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>       
   <p style="font-size:20px;">Monthly Stats</p>
   <div id="chart_div" style="width: 400px; height: 200px;"></div>
</body>
</html>

/////////////////////////////
STATISTICS ALPHA
echo("<html>
  <head>
    <script type=\"text/javascript\" src=\"https://www.google.com/jsapi\"></script>
    <script type=\"text/javascript\">
      google.load(\"visualization\", \"1.1\", {packages:[\"bar\"]});
      google.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Opening Move', 'Percentage'],
          [\"King's pawn (e4)\", 44],
          [\"Queen's pawn (d4)\", 31],
          [\"Knight to King 3 (Nf3)\", 12],
          [\"Queen's bishop pawn (c4)\", 10],
          ['Other', 3]
        ]);

        var options = {
          title: 'Chess opening moves',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Chess opening moves',
                   subtitle: 'popularity by percentage' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Percentage'} // Top x-axis.
            }
          },
          bar: { groupWidth: \"90%\" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
  </head>
  <body>
    <div id=\"top_x_div\" style=\"width: 900px; height: 500px;\"></div>
  </body>
</html>");