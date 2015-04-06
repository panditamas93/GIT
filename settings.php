<?php 

session_start();
?>
<!DOCTYPE html> 
<html> 
    <head>
	<title>Settings</title>
	<link rel="stylesheet" type="text/css" href="csstext.css" />
	</head> 
    <body> 
	<div id="keret">
		<div id="fejléc">
		<h1>Set things</h1>
		</div>
		
		<div id="wrapper">
    <div id="content">
      <p><strong>IDenézz</strong></p>
      
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
		
		 
	
	
		if( isset( $_POST[ 'KategorieName' ] ) ) {
			$KategorieName= $_POST['KategorieName'];
			$mysqli = new mysqli("localhost", "root", "", "finanzen");
			if ($mysqli->connect_errno) {
				echo "<P/>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
		else
		{
		mysqli_set_charset($mysqli, "utf8");
		$query=sprintf("INSERT INTO Kategorie(KategorieName) 
		VALUES('%s')" 
                        , mysql_real_escape_string($KategorieName));
			
		$mysqli->query($query); 
		$mysqli->close();
		}
		}
			
			$mysqli = new mysqli("localhost", "root", "", "finanzen");
			if ($mysqli->connect_errno) {
				echo "<P/>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			else
				{
					mysqli_set_charset($mysqli, "utf8");
					$mysqli->real_query("SELECT *  FROM Kategorie");
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
		printf("<TR><TD>%s</TD><TD>%s</TD></TR></br>",$row[0],$row[1]);
				}	
	
			}
	
			
		
	
	
	
		
		
		?>
	<p><div id="login">
			<form method="POST"> 
				KategorieName:<input type="text" name="KategorieName" /> <br /> 
				
            <input type="submit"/> 
			</form>
			</div></p>

			
			<div id="footer">
    <p>Panda 2015</p>
  </div>
		</div>
    </body> 
</html> 