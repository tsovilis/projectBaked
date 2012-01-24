<?php
include ("verbinding1.php"); 
		
		$bestelling = $_POST["bestelling"];
		$status = $_POST["status"];
		

		$sql="UPDATE Bestellingen SET BestelStatus = $status  WHERE Bestellingen_id = $bestelling";

	    


if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

header	("Location: adminBaked.php");


include ("closedb.php");
?>
