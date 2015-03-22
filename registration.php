<!DOCTYPE html> 
<html> 
    <head>
	<title>Neuer Benutzer</title>
	<link rel="stylesheet" type="text/css" href="csstext.css" />
	</head> 
	
    <body> 
		<div id="keret">
		
		<div id="fejléc">
		<h1>Registration</h1>
		</div>
		
		<div id="wrapper">
    <div id="content">
      <p><strong>YESSS</strong></p>
      <p>ide kéne</p>
    </div>
  </div>
		
		<div id="menu">
		<p><strong>MENU</strong></p>
			</div>
		
<?php 
    if( isset( $_POST[ 'BenutzerName' ] ) ) { 
        $BenutzerName = $_POST[ 'BenutzerName' ]; 
        $Passwort     = $_POST[ 'Passwort' ]; 
		$md5hash = md5($Passwort);
		
		//CONTROL IF USER ALREADY EXISTY
		$mysqli = new mysqli("localhost","root","","finanzen");
				if($mysqli->connect_errno)
				{
					echo "MySQL Fehler: " . $mysqli->connect_error . "<BR/>";
				}
		$sql="SELECT BenutzerName FROM Benutzer WHERE BenutzerName='$BenutzerName'";
		$result=mysqli_query($mysqli,$sql);
		$count=mysqli_num_rows($result);
		
		$result->close(); 
		$mysqli->close(); 
		if($count==1){
			echo "<p align='center'> <font color=red  size='4pt'>YOU FCKIN LOOSER CHOOSER ANOTHER USRNAME</font> </p>";
		}
		else{
		
		//OPEN CONNECTION ADD USER
			$mysqli = new mysqli("localhost","root","","finanzen");
				if($mysqli->connect_errno)
				{
					echo "MySQL Fehler: " . $mysqli->connect_error . "<BR/>";
				}
 
        $query=sprintf("INSERT INTO Benutzer(BenutzerName, Passwort) 
		VALUES('%s','%s')" 
                        , mysql_real_escape_string($BenutzerName) 
                        , mysql_real_escape_string($md5hash) );
						
		
				$mysqli->query($query); 
				$mysqli->close(); 

		echo "<p align='center'> <font color=blue  size='6pt'>Neuer Benutzer gespeichert</font> </p>";
		}
    } 
?>
			<div id="login">
	  <form> 
            Benutzername: <input type="text" name="BenutzerName" /> <br /> 
            Passwort:     <input type="password" name="Passwort" /> <br /> 
			<input type="submit"/> 
        </form>
		</div>
		

		<p align='center'><A href="http://localhost/login.php">Log in</A></p>
		
		<div id="footer">
    <p>Panda 2015</p>
  </div>
		</div>
    </body> 
</html> 
