<?php
session_start();
include ("verbinding1.php"); 

$email = $_SESSION['email'];
$taart = $_POST['taartid'];

$query1 = mysql_query("SELECT Account_id
		       FROM Account
		       WHERE Emailadres='$email'");

		while($row1 = mysql_fetch_array($query1))
			{
			  $account = $row1['Account_id'];
			}

$query2 = mysql_query("SELECT Prijs
		       FROM Taarten
		       WHERE Taarten_id='$taart'");

		while($row2 = mysql_fetch_array($query2))
			{
			  $prijs = $row2['Prijs'];
			}

$lever = $_POST['besteldag']. '-' . $_POST['bestelmaand'] . '-' . $_POST['besteljaar'];



$sql="INSERT INTO Winkelwagen (Account_id, Tekst, Leverdatum, Taarten_id, Aantal, Kaarsjes, Prijs) 
		VALUES		
		('$account', '$_POST[Tekst]', '$lever','$_POST[taartid]', '$_POST[aantal]', '$_POST[kaarsjes]', '$prijs')";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }


include ("closedb.php");

header	("Location: winkelwagen.php");

?>
