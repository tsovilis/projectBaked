<?php
include ("verbinding1.php"); 
		
		$taartnaam = $_POST["Taartnaam"];
		$kinfo = $_POST["KorteInfoTaart"];
		$info = $_POST["BeschrijvingTaart"];
		$prijs = $_POST["Prijs"];
		$id = $_POST["id"];
		

		$sql=("UPDATE Taarten SET Taartnaam = '$taartnaam', KorteInfoTaart = '$kinfo', BeschrijvingTaart = '$info', Prijs = '$prijs'
		       WHERE Taarten_id = '$id'");

	    


if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

header	("Location: adminBaked.php");


include ("closedb.php");
?>
