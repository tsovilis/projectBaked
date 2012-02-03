<?php
// Set up connection to database.
include ("verbinding1.php"); 
		
		$bestelling = $_POST["bestelling"];
		$status = $_POST["status"];
		
		if(!($bestelling))	
		{
		header ("location: adminBaked.php");
		}
		// Edit status of orders in the database.
		$sql="UPDATE Bestellingen SET BestelStatus = $status  WHERE Bestellingen_id = $bestelling";

	    


if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

header	("Location: adminBaked.php");

// Close connection to database.
include ("closedb.php");
?>
