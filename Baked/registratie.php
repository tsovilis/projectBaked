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


	if($_POST['nieuwsbrief'] == '1')
			{
			$nieuwsbrief = 1;;
			}
	else{
	     $nieuwsbrief = 0;
	    }
	
			$encryptedpassword = md5($_POST['wachtwoord']);
	
			if($_POST['emailadres'] == $_POST['bevestig_emailadres']  && $_POST['wachtwoord'] == $_POST['bevestig_wachtwoord'])
			    {
				$sql="INSERT INTO Account (Emailadres,Wachtwoord,Voornaam,Tussenvoegsel,Achternaam,Postcode,Straatnaam,Huisnummer,Toevoeging,Plaatsnaam,Telefoon,Nieuwsbrief) 
				VALUES		
				('$_POST[emailadres]','$encryptedpassword','$_POST[voornaam]','$_POST[tussenvoegselnaam]','$_POST[achternaam]','$_POST[postcode]','$_POST[straatnaam]','$_POST[postbusnummer]','$_POST[postbustoevoeging]','$_POST     [plaatsnaam]','$_POST[telefoonnummer]','$nieuwsbrief')";

			    }
		
		if (!mysql_query($sql,$connection))
		  {
		  die('Uw emailadres is al in gebruik!');
		  }

		header	("Location: accountBaked.html");
	

include ("closedb.php");
	
?>
