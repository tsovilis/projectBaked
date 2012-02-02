<?php
session_start();

include ("verbinding1.php"); 

$query = mysql_query("
		SELECT 	Account_id 
		FROM Account 
		WHERE Account.Emailadres = '" . $_SESSION['email'] . "'");
		
	while($user = mysql_fetch_array($query))	
		$sql=("DELETE FROM Winkelwagen WHERE Account_id = '" . $user['Account_id'] . "'");

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

header	("Location: logout.php");


include ("closedb.php");
?>