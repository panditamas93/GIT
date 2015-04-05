

<!DOCTYPE html> 	
<html>
<head>
<title>Show table</title>
<meta charset='utf-8'>
<link rel="stylesheet" type="text/css" href="csstext.css" />
</head>

 <body>	
 
	<form id="search" action="" method="post">
				<select name="menu0" id="menu">
				<option value=\"0\" selected>(please select:)</option>
				<option value=\"1\">one</option>
				<option value=\"2\">two</option>
				<option value=\"3\">three</option>
				<option value=\"other\">other, please specify:</option>
				</select>
				<input type=\"text\" name=\"choicetext\"></div>
				
				
				<select name="menu1" id="menu">
				<option value=\"0\" selected>(please select:)</option>
				<option value=\"1\">one</option>
				<option value=\"2\">two</option>
				<option value=\"3\">three</option>
				<option value=\"other\">other, please specify:</option>
				</select>
				<input type=\"text\" name=\"choicetext\"></div>
				<div><input type="submit" value="search"></div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				</form>
				
<?php			
				if(isset($_POST['menu0']))
				{$selectOption = $_POST['menu0'];
				echo $selectOption;}
				else{echo ("szar");}
				if(isset($_POST['menu1']))
				{$selectOption = $_POST['menu1'];
				echo $selectOption;}
				else{echo ("szar");}
?>
</body>
 </html>