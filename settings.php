<?php 
	if ($_SERVER["HTTPS"] != "on")
{
			header('Location: https://localhost/settings.php');
	}
	

	session_start();
	if(!isset($_SESSION['myusername'])){
	header("location:login.php");
	}
	
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
		<h1>Settings</h1>
		</div>
		
		<div id="wrapper">
    <div id="content">
      <p><strong><h1>Kategoriebearbeitung<h1></strong></p>
      
    </div>
  </div>
		
<?php
		
		 include'menu.php';
		echo "Hi: ".$_SESSION['myusername']."</br>";
	//Add kategorie
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
	//Kategorie und ZEichenkette submitted
			
		if(isset($_POST['Zeichenkette']) ){
				$SelectOption =$_POST['menu'];
				$SelectOption2=$_POST['Zeichenkette'];
				if($SelectOption==NULL || $SelectOption2==NULL){
					echo("<h1><font color=\"red\">Select Kategorie UND Zeichenkette!</font></h1>");
				}
				if($SelectOption!=NULL && $SelectOption2!=NULL){
					$mysqli = new mysqli("localhost","root","","finanzen");
						if($mysqli->connect_errno)
						{
							echo "MySQL Fehler: " . $mysqli->connect_error . "<BR/>";
						}
							mysqli_set_charset($mysqli, "utf8");
							$mysqli->real_query("SELECT KategorieID FROM Kategorie WHERE KategorieName='$SelectOption' ");
							$result = $mysqli->use_result();
							$kategorie = array();
								while ( $row = $result->fetch_row() ) {
			
									$kategorie[]= $row;
								}
						//////echo $kategorie[0][0];
						$result->close();
						
						$query=sprintf("INSERT INTO Autokategorie(KategorieID, Zeichenkette) 
							VALUES('%s','%s')" 
                        , mysql_real_escape_string($kategorie[0][0]) 
                        , mysql_real_escape_string($SelectOption2) );
						
						echo("<h1><font color=\"red\">SUCCCEESSSSSS</font></h1>");
						$mysqli->query($query); 
						$mysqli->close();		
						
						
						
						
				}
				
			}
			echo("<div id=\"table\">");
	//KAtegorieliste
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
echo("<TABLE border=\"1\" align:left vertical-align:top>");
echo("<TR><TD>");
				echo("<TABLE>");
				echo("<TR><TH>KategorieID</TH><TH> KategorieName</TH></TR>");
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
		printf("<TR bgcolor='%s' font color='%s' ><TD>%s</TD><TD>%s</TD></TR>", $bgcolor,$fontcolor,$row[0],$row[1]);
		$i++;
		
				}	
				echo("</TABLE>");
			$mysqli->close();
			}
echo("</TD>");			
	//Autokategorieliste
			$mysqli = new mysqli("localhost", "root", "", "finanzen");
			if ($mysqli->connect_errno) {
				echo "<P/>Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			else
				{
					mysqli_set_charset($mysqli, "utf8");
					$mysqli->real_query("SELECT *  FROM autokategorie JOIN Kategorie ON Kategorie.KategorieID = autokategorie.KategorieID");
					$result = $mysqli->use_result();
					$i=1;
echo("<TD>");					
				echo("<TABLE>");
				echo("<TR><TH> AutokategorieID</TH><TH> Zeichenkette</TH><TH> KategorieID</TH><TH> KategorieName</TH></TR>");
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
		printf("<TR bgcolor='%s' font color='%s' ><TD>%s</TD><TD>%s</TD><TD>%s</TD><TD>%s</TD></TR>", $bgcolor,$fontcolor,$row[0],$row[1],$row[3],$row[4]);
		$i++;
		
				}	
				echo("</TABLE>");
			$result->close();
			$mysqli->close();
			}
echo("</TD></TR>");

?>	
<TR><TD>
	<h2>Add neue Kategorie</h2>
	<p><div id="login">
			<form method="POST"> 
				Add neue Kategorie:<input type="text" name="KategorieName" /> <br /> 
			<input type="submit" value="submit"/> 
			</form>
</TD>
<TD>
	<h2>Add neue Zeichenkette</h2>
<?php	//Combobox mit Kategorie
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
		
			$result->close();
			echo("<form method=\"POST\"> ");
			echo("Selecet kategorie:");
			printf("<select  name=\"menu\" id=\"0\" >");
			printf("<option value=\"\" selected>(please select:)</option>");
			for($i=0; $i<$j; $i++){
				printf("<option value=%s>%s</option>",$kategorie[$i][0], $kategorie[$i][0]);
			}
			printf("</select>");			
			}
		


?>	

			
				Add neue Zeichenkette:<input type="text" name="Zeichenkette" /> <br /> 
				
			<input type="submit" value="submit">
			</form>
			</div></p>
	</TD></TR>
	</TABLE>

			</div>
			<div id="footer">
    <p>Panda 2015</p>
  </div>
		</div>
    </body> 
</html> 