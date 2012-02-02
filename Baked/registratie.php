<?php
include ("verbinding1.php"); 

if(!($_POST['voornaam']))
	{
	header ("Location: welcomeBaked.html");
	}

if(!($_POST['achternaam']))
	{
	header ("Location: welcomeBaked.html");
	}

if(!($_POST['wachtwoord']))
	{
	header ("Location: foutmelding.php");
	}

if(!($_POST['postcode']))
	{
	header ("Location: foutmelding.php");
	}

if(!($_POST['straatnaam']))
	{
	header ("Location: foutmelding.php");
	}

if(!($_POST['postbusnummer']))
	{
	header ("Location: foutmelding.php");
	}

if(!($_POST['plaatsnaam']))
	{
	header ("Location: foutmelding.php");
	}

if(!($_POST['telefoonnummer']))
	{
	header ("Location: foutmelding.php");
	}

if(!($_POST['emailadres']))
	{
	header ("Location: foutmelding.php");
	}

	if($_POST['nieuwsbrief'] == "")
		{
		$nieuwsbrief='0';
		}

	else
		{
		$nieuwsbrief='1';
		}

	
			$encryptedpassword = md5($_POST['wachtwoord']);
	
			if($_POST['emailadres'] == $_POST['bevestig_emailadres']  && $_POST['wachtwoord'] == $_POST['bevestig_wachtwoord'])
			    {
				$sql="INSERT INTO Account (Emailadres,Wachtwoord,Voornaam,Tussenvoegsel,Achternaam,Postcode,Straatnaam,Huisnummer,Toevoeging,Plaatsnaam,Telefoon,Nieuwsbrief) 
				VALUES		
				(	'" . mysql_real_escape_string(htmlentities($_POST[emailadres])) . "',
					'" . mysql_real_escape_string(htmlentities($encryptedpassword)) . "',
					'" . mysql_real_escape_string(htmlentities($_POST[voornaam])) . "',
					'" . mysql_real_escape_string(htmlentities($_POST[tussenvoegselnaam])) . "',
					'" . mysql_real_escape_string(htmlentities($_POST[achternaam])) . "',
					'" . mysql_real_escape_string(htmlentities($_POST[postcode])) . "',
					'" . mysql_real_escape_string(htmlentities($_POST[straatnaam])) . "',
					'" . mysql_real_escape_string(htmlentities($_POST[postbusnummer])) . "',
					'" . mysql_real_escape_string(htmlentities($_POST[postbustoevoeging])) . "',
					'" . mysql_real_escape_string(htmlentities($_POST[plaatsnaam])) . "',
					'" . mysql_real_escape_string(htmlentities($_POST[telefoonnummer])) . "',
					'" . mysql_real_escape_string(htmlentities($nieuwsbrief)) . "' )";

			    }
		
		if (!mysql_query($sql,$connection))
		  {
		  die('Uw emailadres is al in gebruik!');
		  }

		header	("Location: gelukt.php");
	

include ("closedb.php");
	
?>
