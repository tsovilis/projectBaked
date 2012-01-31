<?php
  session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Baked!</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="baked.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
<!--
function validateForm()
{
var x=document.forms["register"]["voornaam"].value;
if (x==null || x=="")
	{
	alert("U moet nog uw voornaam invullen.");
	return false;
	}
	
var x=document.forms["register"]["achternaam"].value;
if (x==null || x=="")
	{
	alert("U moet nog uw achternaam invullen.");
	return false;
	}

var x=document.forms["register"]["postcode"].value;
if (x==null || x=="")
	{
	alert("U moet nog uw postcode invullen.");
	return false;
	}

var x=document.forms["register"]["straatnaam"].value;
if (x==null || x=="")
	{
	alert("U moet nog uw straatnaam invullen.");
	return false;
	}
	
var x=document.forms["register"]["postbusnummer"].value;
if (x==null || x=="")
	{
	alert("U moet nog uw huisnummer invullen.");
	return false;
	}

var x=document.forms["register"]["plaatsnaam"].value;
if (x==null || x=="")
	{
	alert("U moet nog uw plaatsnaam invullen.");
	return false;
	}

var x=document.forms["register"]["telefoonnummer"].value;
if (x==null || x=="")
	{
	alert("U moet nog uw telefoonnummer invullen invullen.");
	return false;
	}
	
var telefoon=document.forms["register"]["telefoonnummer"].value;
if((parseFloat(telefoon) == parseInt(telefoon)) && !isNaN(telefoon)){
	continue;
	} else { 
	alert("Het telefoonnummer mag alleen cijfers bevatten.");
	return false;
	}

var email=document.forms["register"]["emailadres"].value;
if (email==null || email=="")
	{
	alert("U moet nog uw emailadres invullen.");
	return false;
	}	
 
if (bevestigEmail==null || bevestigEmail=="")
	{
	alert("U moet nog uw emailadres bevestigen.");
	return false;
	}

if (pass==null || pass=="")
	{
	alert("U moet nog uw wachtwoord invullen.");
	return false;
	}

if (bevestigPass==null || bevestigPass=="")
	{
	alert("U moet nog uw wachtwoord bevestigen.");
	return false;
	} 
 
var atpos=email.indexOf("@");
var dotpos=email.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
	{
	alert("Dit e-mailadres is niet juist.");
	return false;
	}

var bevestigEmail=document.forms["register"]["bevestig_emailadres"].value;
if (email != bevestigEmail)
	{
	alert("Deze email adressen zijn niet hetzelfde.")
	return false;
	}
	
var pass=document.forms["register"]["wachtwoord"].value;


var bevestigPass=document.forms["register"]["bevestig_wachtwoord"].value;
if (pass != bevestigPass)
	{
	alert("Deze wachtwoorden zijn niet hetzelfde.")
	return false;
	}
}

function pwstrength()
{
  id = document.getElementById("wachtwoord");
  count = document.getElementById("count");
  strength = "slecht";
  if (id.value.length > 3) {
    strength= "middelmatig";
  }
  if (id.value.length > 6) {
    strength= "goed";
  }
  count.innerHTML = "Kwaliteit van uw wachtwoord: " + strength;
}
//-->
</script>

</head>

<body>
<div id="main">
	<a href="infoBaked.php"><img src="images/Bakedsign.png" alt=""/></a>

	<div id="content">
		
		<div id="totheleft">
			<?php include ("snelmenuBaked.html"); ?> 
		</div>
		
		<div id="rightside">	

			<?php include ("loginform.php"); ?>

		<div style="height:10px"></div>
        <div class="lijntje"></div>
        <div style="height:10px"></div>

		<strong>Privacy Policy</strong>
<br /><br />
Uw persoonlijke gegevens worden veilig opgeslagen en alleen gebruikt volgens onze
<a href="privacypolicyBaked.php">Privacy Policy</a>.

<br /><br />
Baked respecteert de privacy van alle gebruikers van haar site en draagt er zorg voor dat de 
persoonlijke informatie die u ons verschaft vertrouwelijk wordt behandeld. 
Wij gebruiken uw gegevens om de bestellingen zo snel en gemakkelijk mogelijk te laten verlopen.  
Baked zal uw persoonlijke gegevens niet aan derden verkopen en zal deze uitsluitend aan derden 
ter beschikking stellen die zijn betrokken bij het uitvoeren van uw bestelling.

		</div>
		

		
		<div id="inhoud">
<h2>
Nieuw bij Baked
</h2>
Als u nieuw bent bij Baked, kunt u hier een account aanmaken. <br />
Vul hierbij uw woon of vestigingsgegevens in. <br />
Velden gemarkeerd met een * zijn verplicht.

<h3>
Accountgegevens
</h3>

<div>
<div>
<h4>
Persoonlijke gegevens
</h4>

<table>
<tr>

<form name="register" action="registratie.php" method="post" onsubmit="return validateForm();">

	<tr>
	<td> Voornaam:* </td> <td> <input type="text" name="voornaam" /> </td><td> <label name="label_voornaam"></label></td>
	</tr>

	<tr>
	<td>Tussenvoegsel:</td> <td> <input type="text" name="tussenvoegselnaam" /> (bv. van der)</td>
	</tr>

	<tr>
	<td>Achternaam:*</td> <td> <input type="text" name="achternaam" /> </td>
	</tr>

	<tr>
	<td>Postcode:*</td> <td> <input type="text" name="postcode" /> (1234AB) </td>
	</tr>

	<tr>
	<td> Straatnaam:* </td> <td> <input type="text" name="straatnaam" /></td>
	</tr>

	<tr>
	<td> Huisnummer:* </td> <td> <input type="text" name="postbusnummer" /> (alleen nummer) </td><td> <label name="label_huisnummer"></label></td>
	</tr>

	<tr>
	<td> Toevoeging: </td> <td> <input type="text" name="postbustoevoeging" /> (bv. a) </td>
	</tr>

	<tr>
	<td> Plaats:* </td><td> <input type="text" name="plaatsnaam" /> </td>
	</tr>
	
	<tr>
	<td> Telefoonnummer:*</td> <td> <input type="text" name="telefoonnummer" /> </td>
	</tr>
	</table>
	</div>

	<div>

	<h4>
	Inloggegevens
	</h4>

	Uw e-mailadres en wachtwoord heeft u nodig om toegang te krijgen tot uw gegevens.
	Tevens zullen we u via dit e-mailadres op de hoogte houden van de status van uw bestellingen.
	<br/><br />
	<table>
	<tr>
	<td> E-mailadres:*</td> <td><input type="text" name="emailadres" /></td>
	</tr>

	<tr>
	<td>Bevestig e-mailadres:*</td> <td><input type="text" name="bevestig_emailadres" /></td>
	</tr>


	<tr>
	<td>Wachtwoord:*</td> <td><input type="password" name="wachtwoord" id="wachtwoord" onkeyup="pwstrength();"/></td> <td><p id="count">Uw wachtwoord</p>
	</tr>

	<tr>
	<td>Bevestig wachtwoord:*</td> <td><input type="password" name="bevestig_wachtwoord"/></td>
	</tr>

	</table>


	<h4>
	Nieuwsbrief
	</h4>

	Blijf op de hoogte van alle acties en voordelen via de Baked Nieuwsbrief. 
	U ontvangt het laatste nieuws direct in uw mailbox en u kunt zich op ieder gewenst moment weer uitschrijven.
	<br /><br />
	<input type="checkbox" name="nieuwsbrief" value="1" /> Ja, ik profiteer graag van alle voordelen en acties en schrijf me in voor de Baked Nieuwsbrief.

	<br />
	<br />


<input type="submit" name="Registreren" value="Registreren"/>
</form>


</div>
</div>
		</div>
		

	</div>
</div>
</body>

</html>
