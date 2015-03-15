<?php 
session_start();
?>
<!DOCTYPE html> 
<html> 
    <head><title>Log in</title></head> 
    <body bgcolor="lightgreen"> 
		<h1> Log in</h1>
<?php 

    if( isset( $_POST[ 'myusername' ] ) ) { 
        $myusername = $_POST[ 'myusername' ]; 
        $mypassword= $_POST[ 'mypassword' ]; 
		$mypassword = md5($mypassword);
		
		mysql_connect("localhost", "root", "")or die("cannot connect"); 
		mysql_select_db("test")or die("cannot select DB");

	
        // To protect MySQL injection (more detail about MySQL injection)
			$myusername = stripslashes($myusername);
			$mypassword = stripslashes($mypassword);
			$myusername = mysql_real_escape_string($myusername);
			$mypassword = mysql_real_escape_string($mypassword);

 
 
	
			$sql="SELECT * FROM Benutzer WHERE BenutzerName='$myusername' and Passwort='$mypassword'";
			$result=mysql_query($sql);
			$count=mysql_num_rows($result);

		if($count==1)
		{
			$_SESSION['myusername']=$myusername;
			header('Location:login_success.php');
		}
		else 
		{
			echo "Wrong Username or Password";
		}
	} 
?>
        <form method="POST"> 
            Benutzerame: <input type="text" name="myusername" /> <br /> 
            Passwort: <input type="password" name="mypassword" /> <br /> 
            <input type="submit"/> 
        </form>
		
			<A href="http://localhost/registration.php">Registrieren</A>
		
    </body> 
</html> 