<?php
session_start();

include ("verbinding1.php"); 
		
// All the submitted information is collected and are stored in variables

		$voornaam 	= $_POST["Voornaam"];
		$tussenvoegsel = $_POST["Tussenvoegsel"];
		$achternaam = $_POST["Achternaam"];
		$straatnaam = $_POST["Straatnaam"];
		$huisnummer = $_POST["Huisnummer"];
		$toevoeging = $_POST["Toevoeging"];
		$postcode 	= $_POST["Postcode"];
		$plaatsnaam = $_POST["Plaatsnaam"];
		$telefoon 	= $_POST["Telefoon"];

		$check = $_POST["Wachtwoord"];
		if($check != '')
			{
			$wachtwoord	= MD5($_POST["Wachtwoord"]);
			
			// This query updates the submitted accountinformation.
			// The password is only updated if the input is not blank.
			$sql=("	UPDATE Account 
				SET Wachtwoord		= '$wachtwoord',
					Voornaam 		= '$voornaam', 
					Tussenvoegsel 	= '$tussenvoegsel', 
					Achternaam 		= '$achternaam', 
					Straatnaam 		= '$straatnaam',
					Huisnummer 		= '$huisnummer',
					Toevoeging 		= '$toevoeging',
					Postcode 		= '$postcode',
					Plaatsnaam 		= '$plaatsnaam',
					Telefoon 		= '$telefoon'
				WHERE Account.Emailadres = '" . $_SESSION['email'] . "'");
			}
		else
			{
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
			}
		
if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

// After updating you get redirected to accountBaked.php

header	("Location: accountBaked.php");


include ("closedb.php");
?>
