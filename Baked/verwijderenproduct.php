<?php
include ("verbinding1.php"); 
		
		$product = $_GET["verwijderen"];
		$sql=("DELETE FROM Winkelwagen WHERE Taarten_id='$product'");

	    


if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

header	("Location: winkelwagen.php");


include ("closedb.php");
?>
