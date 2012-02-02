<?php

// Set up connection to database.
include ("verbinding1.php"); 
		
		$taartnaam = $_POST["verwijderen"];
		
		// Delete pie from pie list. (Administrator)
		$sql=("DELETE FROM Taarten WHERE Taartnaam='$taartnaam'");

	    


if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

header	("Location: adminBaked.php");

// Close connection to database.
include ("closedb.php");
?>
