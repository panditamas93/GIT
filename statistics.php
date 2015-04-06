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
$mysqli = new mysqli("localhost", "root", "", "finanzen");
		if ($mysqli->connect_errno) {
			echo "<P/>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		else
		{
			$k=0;
			mysqli_set_charset($mysqli, "utf8");
			$mysqli->real_query("SELECT MONTH(TransaktionsDatum), KategorieName,count(*) 
								FROM Transaktionen  
								WHERE KategorieName IS NOT NULL
								GROUP BY KategorieName, MONTH(TransaktionsDatum)
;");
			$result = $mysqli->use_result();
			echo("<TABLE>");
			$stat = array();
			$j=0; 
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
			$j++;
			/*printf("<TR bgcolor='%s' font color='%s'><TD>%s </TD><TD>%s</TD><TD>%s</TD></TR></br>", 
			$bgcolor,$fontcolor, $row[0], $row[1], $row[2] );
			$k++;*/


		}
		echo("</TABLE>");
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
	  echo(" 'Year', 'Sales', 'Expenses', 'Profit' ");
	   echo("],");
        echo("  ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]); ");

        echo ("var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
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