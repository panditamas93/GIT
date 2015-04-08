<?php session_start();
	if(!isset($_SESSION['myusername'])){
	header("location:login.php");
	}
	
	?>
<!DOCTYPE html> 
<html>
<head>
<title>Statistics</title>
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
      <p><strong>Choose what you want to do</strong></p>
      
    </div>
  </div>
	
 <?php 
	include'menu.php';
	echo "Hi: ".$_SESSION['myusername']."</br>";
	
 ?>

<?php
$mysqli = new mysqli("localhost", "root", "", "finanzen");
		if ($mysqli->connect_errno) {
			echo "<P/>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		else
		{
			$k=0; //rownumber
			mysqli_set_charset($mysqli, "utf8");
			$mysqli->real_query("SELECT MONTH(TransaktionsDatum), KategorieName,count(*) 
								FROM Transaktionen  
								WHERE KategorieName IS NOT NULL
								GROUP BY KategorieName, MONTH(TransaktionsDatum)
								ORDER BY MONTH(TransaktionsDatum), KategorieName
;");
			$result = $mysqli->use_result();
			echo("<TABLE>");
			$stat = array();
			
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
			$stat[]= $row;
			
			/*printf("<TR bgcolor='%s' font color='%s'><TD>%s </TD><TD>%s</TD><TD>%s</TD></TR></br>", 
			$bgcolor,$fontcolor, $row[0], $row[1], $row[2] );*/
			$k++;
			}
			for($i=0; $i<$k; $i++){
			echo $stat[$i][0];
			echo $stat[$i][1];
			echo $stat[$i][2];
			$maxmonat=$stat[$i][0];
		}
		echo("</TABLE>");
		}
		
/////////////////////////////make javascript ready
		$tempa = array(); //get only kategorie from array
		$temp =	$stat[0][1];
		$tempa[]= $stat[0][1];
		$i=1; //kategorieanzahl
		while($i<$k){
			if($temp ==	$stat[$i][1]){
				$i++;
				
			}
			else{
				$temp =	$stat[$i][1];
				$tempa[]= $stat[$i][1];
				$i++;
			}
		}
		for($z=0; $z<$i; $z++){
			
			echo $tempa[$z];
		}			
		
		
		
echo("<html>
  <head>
    <script type=\"text/javascript\" src=\"https://www.google.com/jsapi\"></script>
    <script type=\"text/javascript\">
      google.load(\"visualization\", \"1.1\", {packages:[\"bar\"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([ ");
		
		echo("   [");
		echo(" 'Monat', ");
		//echo first row of statistics
		for($z=0; $z<$i; $z++){
			if($z<$i-1){
				echo("'");
				echo $tempa[$z];
				echo("',");
			}
			else{
				echo("'");
				echo $tempa[$z];
				echo("'");
			}
			
		}
		echo("],");
		////////////////////////////
		$monat=1;
		$r=0;
		$z=0;
		$ergebnisarray = array();
		$count=0;
		while($monat<13 && $r<$k){
			
			if($stat[$r][0]==$monat){
				
				$ergebnisarray[]=$stat[$r][2];
				
				$count++;
				$r++;
				
			}
			else{
				if((($stat[$r][0])+1)==$monat){
					echo("[");
					for($z=1; $z<$count+1; $z++){
						if($z=$count){
						echo $ergebnisarray[$z];
						}
						else{
							echo $ergebnisarray[$z];
							echo(",");
							
						}
					
					}
					echo("]");
					unset($ergebnisarray);
					$count=0;
					$monat++;
				}
				else $monat++;
			}
		}
				
				
				
		
		
		
		
        echo("]); ");

        echo ("var options = {
          chart: {
            title: 'Transaktionen',
            subtitle: 'Monat, Kategoriename und Anzahl',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id=\"barchart_material\" style=\"width: 900px; height: 500px;\"></div>
  </body>
</html> ");

?>
 <div id="footer">
    <p>Panda 2015</p>
  </div>
 </div>
</body>
 </html>