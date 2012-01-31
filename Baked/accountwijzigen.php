<?php
session_start();

include ("verbinding1.php"); 
		
		$voornaam 	= $_POST["Voornaam"];
		$tussenvoegsel = $_POST["Tussenvoegsel"];
		$achternaam = $_POST["Achternaam"];
		$straatnaam = $_POST["Straatnaam"];
		$huisnummer = $_POST["Huisnummer"];
		$toevoeging = $_POST["Toevoeging"];
		$postcode 	= $_POST["Postcode"];
		$plaatsnaam = $_POST["Plaatsnaam"];
		$telefoon 	= $_POST["Telefoon"];
		

		$sql=("	UPDATE Account 
				SET Voornaam 		= '$voornaam', 
					Tussenvoegsel 	= '$tussenvoegsel', 
					Achternaam 		= '$achternaam', 
					Straatnaam 		= '$straatnaam',
					Huisnummer 		= '$huisnummer',
					Toevoeging 		= '$toevoeging',
					Postcode 		= '$postcode',
					Plaatsnaam 		= '$plaatsnaam',
					Telefoon 		= '$telefoon'
				WHERE Account.Emailadres = '" . $_SESSION['email'] . "'");

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

header	("Location: accountBaked.php");


include ("closedb.php");
?>