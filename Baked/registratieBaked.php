<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Baked!</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="baked.css" rel="stylesheet" type="text/css" />

<?php
  session_start();
?>

<script type="text/javascript">
//<![CDATA[
function telefooncijfers()
{
	var telefoon=document.forms["register"]["telefoonnummer"].value;
	if((parseFloat(telefoon) == parseInt(telefoon)) && !isNaN(telefoon)){
		} else { 
			alert("Het telefoonnummer mag alleen cijfers bevatten.");
			return false;
		}
}

function huisnummercheck()
{
	var huisnummer1=document.forms["register"]["huisnummer"].value;
	if((parseFloat(huisnummer1) == parseInt(huisnummer1)) && !isNaN(huisnummer1)){
		} else { 
			alert("Het huisnummer mag alleen cijfers bevatten.");
			return false;
		}
}

function postcodecheck()
{
	var postcode1 = document.forms["register"]["postcode"]; 
	postcode1.value = postcode1.value.replace(/ /g,'').toUpperCase();
	if (!postcode1.value.match(/^[1-9]\d{3}[A-Z]{2}$/)) 
	{
		alert("De postcode moet in dit formaat ingevoerd worden: 1234AB") 
		return false;
	}
}
	
function pwstrength()
{
	pass = document.getElementById("wachtwoord");
	count = document.getElementById("count");
	strength = "slecht";
	if (pass.value.length > 3) {
		strength= "middelmatig";
	}
	if (pass.value.length > 6) {
		strength= "goed";
	}
	count.innerHTML = "Kwaliteit van uw wachtwoord: " + strength;
}

function emailcheck()
{	
	var email = document.forms["register"]["emailadres"].value;
	var bevestigEmail = document.forms["register"]["bevestigEmailadres"].value;
	if ( email != bevestigEmail)
	{
		alert("Deze emailadressen zijn niet hetzelfde");
		return false;
	}
	
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
	{
		alert("Dit e-mailadres is niet juist.");
		return false;
	}
}

function passhetzelfde()
{	
	var pass=document.forms["register"]["wachtwoord"].value;
	var bevestigPass=document.forms["register"]["bevestig_wachtwoord"].value;
	if (pass != bevestigPass)
	{
	alert("Deze wachtwoorden zijn niet hetzelfde.");
	return false;
	}
}
	
function verplichtevelden(veldenArray) {
	//constructor van de klasse
	this.veldenArray = veldenArray; //alleen de verplichte velden
	this.check = verplichtevelden_check; 
}
	
function verplichtevelden_check() {
	//controleer de verplichte velden
	var foutlijst="";
	for (var i=0; i<this.veldenArray.length; i++) {
		if (document.getElementById(this.veldenArray[i]).value=="") {
			foutlijst += this.veldenArray[i]+", ";
		}
	}
	if (foutlijst=="") {
		return true;
	}
	else {
		window.alert('Verplichte veld(en) niet ingevuld: '+foutlijst+' probeer het nog een keer.');
		return false;
	}
}
	
//het formulier initialiseren
function bijLaden() {
	var verplicht=new Array('voornaam','achternaam','postcode','straatnaam', 'huisnummer','plaatsnaam','telefoonnummer','emailadres','bevestigEmailadres','wachtwoord','bevestigWachtwoord');				 
	mijnVV = new verplichtevelden(verplicht); //mijnVV moet globaal zijn, dus geen var ervoor.
}
	
function validate()
{
	var retvalue;
	retvalue = mijnVV.check();
	if (retvalue == false)
	{
		return retvalue;
	}
	retvalue = telefooncijfers(); 
	if (retvalue == false)
	{
		return retvalue;
	}
	retvalue = passhetzelfde();
	if (retvalue == false)
	{
		return retvalue;
	}
	retvalue = emailcheck();
	if (retvalue == false)
	{
		return retvalue;
	}
	retvalue = huisnummercheck();
	if (retvalue == false)
	{
		return retvalue;
	}
	retvalue = postcodecheck();
	if (retvalue == false)
	{
		return retvalue;
	}
}

//]]>
</script>
</head>
<body onload="bijLaden();">

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

			<h4>
			Persoonlijke gegevens
			</h4>

			<form id="register" method="post"  onsubmit="validate()">
			<table>
				<tr>
				<td>Voornaam:*</td> <td><input type="text" id="voornaam" name="voornaam" /></td>
				</tr>
				
				<tr>
				<td>Tussenvoegsel:</td> <td><input type="text" id="tussenvoegsel" name="tussenvoegselnaam" />(bv. van der)</td>
				</tr>
				
				<tr>
				<td>Achternaam:*</td> <td><input type="text" id="achternaam" name="achternaam" /></td>
				</tr>
				
				<tr>
				<td>Postcode:*</td> <td><input type="text" id="postcode" name="postcode" />(1234AB)</td>
				</tr>
				
				<tr>
				<td>Straatnaam:*</td> <td><input type="text" id="straatnaam" name="straatnaam" /></td>
				</tr>
				
				<tr>
				<td>Huisnummer:*</td> <td><input type="text" id="huisnummer" name="postbusnummer" /></td>
				</tr>
				
				<tr>
				<td>Toevoeging:</td> <td><input type="text" id="toevoeging" name="postbustoevoeging" />(bv. a)</td>
				</tr>
				
				<tr>
				<td>Plaatsnaam:*</td> <td><input type="text" id="plaatsnaam" name="plaatsnaam" /></td>
				</tr>
				
				<tr>
				<td>Telefoonnummer:*</td> <td><input type="text" id="telefoonnummer" name="telefoonnummer" /></td>
				</tr>
			</table>	

				<br />
				
				<h4>Inloggegevens</h4>
				
				Uw e-mailadres en wachtwoord heeft u nodig om toegang te krijgen tot uw gegevens.<br />
				Tevens zullen we u via dit e-mailadres op de hoogte houden van de status van uw bestellingen.
				<br /><br />
				
				<table>
				<tr>
				<td>E-mailadres:*</td> <td><input type="text" id="emailadres" name="emailadres" /></td>
				</tr>
				
				<tr>
				<td>Bevestig e-mailadres:*</td> <td><input type="text" id="bevestigEmailadres" name="bevestig_emailadres" /></td>
				</tr>
				
				<tr>
				<td>Wachtwoord:*</td> <td><input type="password" id="wachtwoord" name="wachtwoord" onkeyup="pwstrength();"/> <td><p id="count">Uw wachtwoord</p></td>
				</tr>
				
				<tr>
				<td>Bevestig wachtwoord:*</td> <td><input type="password" id="bevestigWachtwoord" name="bevestig_wachtwoord" /></td>
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
				<br />
				<input type="submit" value="Opsturen" />
				<br />
				<br />
			</form>
		</div>
	</div>
</div>
</body>
</html>
