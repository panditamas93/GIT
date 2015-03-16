<?php session_start();
	if(!isset($_SESSION['myusername'])){
	header("location:login.php");
	}
	
	?>
<html>
 <body bgproperties="fixed" bgcolor="pink">	
 <h1> WELCOME</h1>
 <?php 
	
	echo "Hi: ".$_SESSION['myusername']."</br>";
 ?>


<?php
	$CSV = $_POST['CSV'];
	
	
//MULTIDIMENSIONAL ARRAY/GET NUMBER OF ROWS

$array = array();
$array = explode("\n", $CSV);
$numberofrows=count($array);
//echo $numberofrows;
foreach($array as $key => $CSV)
{
	$array[$key] = explode(",", $CSV);
	
}
echo "<pre>";
print_r($array);

$numberofitems = array_sum(array_map("count", $array));
$numberofitems = $numberofitems/$numberofrows;
//echo $numberofitems;

//PUT IN DATABASE

	$mysqli = new mysqli("localhost","root","","finanzen");
				if($mysqli->connect_errno)
				{
					echo "MySQL Fehler: " . $mysqli->connect_error . "<BR/>";
				}
for($i=1; $i<$numberofrows+1; $i++){
	for($j=0; $j<$numberofitems; $j++){
		if(!isset($array[$i][$j])){
			
			$array[$i][$j]=null;
		}
	}
}
				
		echo implode(",", $array[0]);		
				
				
	for($i=1; $i<$numberofrows+1; $i++){
			$cunci= implode(",", $array[$i]);
			echo $cunci;
			$sql= sprintf("INSERT INTO transaktionen (TransaktionsDatum, BenutzerName, BenutzerKonto, KontoName, KontoNummer,
    TransaktionsTyp, TransaktionsSumme, TransaktionsDevisen, TransaktionsUSumme, TransaktionsUDevisen, EinnameoderAusgabe,
	KartenNummer, Wertstellung, Mitteilung, Daten, KontoStand, DevisenTyp) VALUES($cunci)");
	}
	
	
			
			
		
		
		
		
	
	/*$sql= "INSERT INTO Finanzen ( TransaktionsDatum, BenutzerName, BenutzerKonto, KontoName, KontoNummer,
    TransaktionsTyp, TransaktionsSumme, TransaktionsDevisen, TransaktionsUSumme, TransaktionsUDevisen, EinnameoderAusgabe,
	KartenNummer, Wertstellung, Mitteilung, Daten, KontoStand, DevisenTyp) VALUES "*/
	//$sql= "INSERT INTO Finanzen( TransaktionsDatum) VALUES ($data[$array])";








/*$count = 0;
foreach ($array as $type) {
    $count+= count($type);
}
echo $count;*/


	
//GET NUMBER OF ITEMS IN ROW
	
	/*$items=explode("\n",$CSV);
	$numberofrows=count($items);
	echo $numberofrows;
	$rowsanditems = array();
	
	$coin=0;
	foreach ($items as $item){
		$exploded = explode(",",$item);
		$rowsanditems[$exploded[0]] = $exploded[1];
		$coin++;
	}
		//$numberofitems = count($rowsanditems);
		echo $coin;*/
?>
<form method="post">
Field:</br> <textarea name="CSV"></textarea>
<input type="submit">
</form>
 <A href="http://localhost/session_kill.php">Logout</A>
 </body>
 </html>