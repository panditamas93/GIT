<?php 
/*if ($_SERVER["HTTPS"] != "on")
{
	
		header("Location: https://".$_SERVER["HTTP_HOST"].
								$_SERVER["REQUEST_URI"]);
								exit();
								VAGY
			header('Location: https://localhost/login.php');
	
	
}*/
if ($_SERVER["HTTPS"] != "on")
{
			header('Location: https://localhost/login.php');
	}

session_start();
?>
<!DOCTYPE html> 
<html> 
    <head>
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="csstext.css" />
	</head> 
    <body> 
	<div id="keret">
		<div id="fejléc">
		<h1>Login</h1>
		</div>
		
		<div id="wrapper">
    <div id="content">
      <p><strong>Log in</strong></p>
      <p><div id="login">
			<form method="POST"> 
				Benutzerame: <input type="text" name="BenutzerName" /> <br /> 
				Passwort: <input type="password" name="Passwort" placeholder="password" /> <br /> 
            <input type="submit"/> 
			</form>
			</div></p>
    </div>
  </div>
		
	
<?php 
		include'menu.php';
    if( isset( $_POST[ 'BenutzerName' ] ) ) { 
        $BenutzerName = $_POST[ 'BenutzerName' ]; 
        $Passwort= $_POST[ 'Passwort' ]; 
		$md5hash = md5($Passwort);
		
		$mysqli = new mysqli("localhost","root","","finanzen");
				if($mysqli->connect_errno)
				{
					echo "MySQL Fehler: " . $mysqli->connect_error . "<BR/>";
				}

		
			$sql="SELECT * FROM Benutzer WHERE BenutzerName='$BenutzerName' and Passwort='$md5hash'";
			$result=mysqli_query($mysqli,$sql);
			$count=mysqli_num_rows($result);
			echo $count;
			
		
		
       if($count==1)
		{
			$_SESSION['myusername']=$BenutzerName;
			header('Location:login_success.php');
		}
		else 
		{
			echo "<p align='center'> <font color=red  size='4pt'>WRONG USERNAME OR PASSWORD</font> </p>";
			
		}
		
	} 
?>
			<A href="http://localhost/registration.php">Registration</A>
			<div id="footer">
    <p>Panda 2015</p>
  </div>
		</div>
    </body> 
</html> 