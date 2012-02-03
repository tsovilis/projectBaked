<?php
session_start();
// Set up connection to database.
include ("verbinding1.php"); 

$email = $_SESSION['email'];
$taart = $_POST['taartid'];

// Select account id which is connected to the login (session) of the user.
$query1 = mysql_query("SELECT Account_id
		       FROM Account
		       WHERE Emailadres='$email'");
		
		// Get the value of the account id.
		while($row1 = mysql_fetch_array($query1))
			{
			  $account = $row1['Account_id'];
			}
// Select the price of the selected pie.
$query2 = mysql_query("SELECT Prijs
		       FROM Taarten
		       WHERE Taarten_id='$taart'");
		// Get the value of the price.
		while($row2 = mysql_fetch_array($query2))
			{
			  $prijs = $row2['Prijs'];
			}

$lever = $_POST['besteldag']. '-' . $_POST['bestelmaand'] . '-' . $_POST['besteljaar'];

$tekst = $_POST['Tekst'];
if ($tekst == 'Wat voor tekst wilt u erop? (max 32)'){
	$tekst = '';} 
// Add the product (pie) to the shopping cart.
$sql="INSERT INTO Winkelwagen (Account_id, Tekst, Leverdatum, Taarten_id, Aantal, Kaarsjes, Prijs) 
		VALUES		
		('$account', '" . mysql_real_escape_string(htmlentities($tekst)) . "', '$lever','$_POST[taartid]', '$_POST[aantal]', '$_POST[kaarsjes]', '$prijs')";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

// Close database connection.
include ("closedb.php");
// Redirect to shopping cart page.
header	("Location: winkelwagen.php");

?>
