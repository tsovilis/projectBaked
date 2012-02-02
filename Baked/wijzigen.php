<?php
// Set up connection to database.
include ("verbinding1.php"); 
		
		$taartnaam = $_POST["Taartnaam"];
		$kinfo = $_POST["KorteInfoTaart"];
		$info = $_POST["BeschrijvingTaart"];
		$prijs = $_POST["Prijs"];
		$id = $_POST["id"];
		
		// Edit pie info.
		$sql=("UPDATE Taarten SET Taartnaam = '$taartnaam', KorteInfoTaart = '$kinfo', BeschrijvingTaart = '$info', Prijs = '$prijs'
		       WHERE Taarten_id = '$id'");

	    


if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

header	("Location: adminBaked.php");

// Close connection to database
include ("closedb.php");
?>
