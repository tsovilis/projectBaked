<?php
include ("verbinding1.php"); 
		
		$taartnaam = $_POST["verwijderen"];
		

		$sql=("DELETE FROM Taarten WHERE Taartnaam='$taartnaam'");

	    


if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

header	("Location: adminBaked.php");


include ("closedb.php");
?>
