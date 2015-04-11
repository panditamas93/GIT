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
			echo("<TABLE><TR><TH>Monat</TH><TH>Kategorie</TH><TH>Anzahl</TH></TR>");
			for($i=0; $i<$k; $i++){
			echo("<TR>");
			echo("<TD>");
			echo $stat[$i][0];
			echo("</TD>");
			echo("<TD>");
			echo $stat[$i][1];
			echo("</TD>");
			echo("<TD>");
			echo $stat[$i][2];
			echo("</TD>");
			echo("</TR>");
			$maxmonat=$stat[$i][0];
		}
		echo("</TABLE>");
		}
		
/////////////////////////////make javascript ready
		$tempa = array(); //get only kategorie from array
		$temp =	$stat[0][1];
		$tempa[]= $stat[0][1];
		$i=1; 
		$trigger=0;
		$kategorieanzahl=1; //kategorieanzahl
		
		//////////////////////////////////////////////////////////////////////////////////6
		
		
		
		
		while($i<$k){
			$temp =	$stat[$i][1];
			for($j=0;$j<$kategorieanzahl;$j++){
				if($temp ==	$tempa[$j]) $trigger=1;
				
			}
			if($trigger==1){
				$i++;
				$trigger=0;
				
			}
			else{
				
				$tempa[]= $stat[$i][1];
				$kategorieanzahl++;
				$i++;
			}
		}
		echo("<TABLE>");
		echo("<TR><TH>Kategorien</TH></TR>");
		for($z=0; $z<$kategorieanzahl; $z++){
			echo("<TR>");
			echo("<TD>");
			echo $tempa[$z];
			echo("</TD>");
			echo("</TR>");
		}			
		echo("</TABLE>");
		
		
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
		for($z=0; $z<$kategorieanzahl; $z++){
			if($z<$kategorieanzahl-1){
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
		$r=0;
		$billen=0;
		$monat= $stat[0][0];
		$z=0;
		while($monat<13 && $r<$k){
			
			if($stat[$r][0]==$monat){
				if($stat[$r][1] == $tempa[$z]){
					if($billen==0){
						echo ("[");
						echo("'");
						echo $stat[$r][0];
						echo(". Monat'");
						echo (",");
						echo $stat[$r][2];
						echo(",");
						$billen=1;
						$r++;
					}
					else{
						if($r==$k-1){
							
							if($z==$kategorieanzahl-1){
								echo $stat[$r][2];
								
							}
							else{
								echo $stat[$r][2];
								echo(",");
								while($z<$kategorieanzahl-2){
									echo("0,");
									$z++;
								}
								$z++;
								if($z==$kategorieanzahl-1){
									echo("0");
								}
								
							
							echo ("]");
							
							$r++;
							}
						}
						else{
							if($stat[$r+1][0]==$monat){
							echo $stat[$r][2];
							echo (",");
							$r++;
							}
							else{
								echo $stat[$r][2];
							$r++;
							}
						}
					}
				}
				else{
					if($z==$kategorieanzahl-1){
						$z=0;
					}
					else{
						$z++;
						if($stat[$r][1] != $tempa[$z]){
							if($r<$k-1){
								echo("0,");
							}
							else{
								echo("0");
							}
						}
						
					}
				}	
				
			}
			else{
				echo("]");
				echo(",");
				//echo("vége");
				$monat++;
				$billen=0;
		}
				
				
				
		
		
		}
		//echo $z;
		//echo $kategorieanzahl;
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