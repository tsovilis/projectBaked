<?php
session_start();

// Set up connection to database.
include ("verbinding1.php"); 


// This query is used to select the account id of the person
// that is logged in.
$query = mysql_query("
		SELECT 	Account_id 
		FROM Account 
		WHERE Account.Emailadres = '" . $_SESSION['email'] . "'");

		
// This while-statement deletes all the products in the shopping
// cart of the person who is logged in (using the account id).		
	while($user = mysql_fetch_array($query))	
		$sql=("DELETE FROM Winkelwagen WHERE Account_id = '" . $user['Account_id'] . "'");

		
// If there is no query, the database search stops.		
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

  
// When the shopping cart has successfully been emptied,
// the user is redirected to the shopping cart page, which is now empty.
header	("Location: winkelwagen.php");

// Close connection to database.
include ("closedb.php");
?>
