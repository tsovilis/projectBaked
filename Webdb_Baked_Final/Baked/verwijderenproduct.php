<?php
// Set up connection to database.
include ("verbinding1.php"); 
		
		// Delete product from shopping cart.
		$product = $_GET["verwijderen"];
		$sql=("DELETE FROM Winkelwagen WHERE Product_id='$product'");

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

// When the product has been deleted, redirect to shopping cart.
header	("Location: winkelwagen.php");

// Close connection to database.
include ("closedb.php");
?>
