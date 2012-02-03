<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- This page will automatically create a invoice of the desired order-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Baked!</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="baked.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="main">
	<a href="infoBaked.html"><img src="images/Bakedsign.png" alt=""/></a>

	<div id="content">
		
		<div id="totheleft">
		<?php include ("snelmenuBaked.html"); ?>
		</div>
		
		<div id="rightside">
		<?php include ("loginform.php") ; ?>
		</div>
		
		<div id="inhoud">
<h2>
Factuur
</h2>

<?php
		include 'verbinding1.php'; //  include database connection
		
		$bestellingnr 	= 	$_POST["bd"]; // retrieve the order number from the adminBaked.php page
		// fetch the matching Account_id and the matching order date
		$account_id 	= 	mysql_query("SELECT Account_id FROM Bestellingen WHERE Bestellingen_id='$bestellingnr' ");
		$datumfactuur 	= 	mysql_query("SELECT Besteldatum FROM Bestellingen WHERE Bestellingen_id ='$bestellingnr' ");
		
		ob_start(); // turn output buffering on
		
		// SQL query to retreive the information about the customer
		$info = mysql_query("	SELECT 
					Account.Voornaam,
					Account.Tussenvoegsel,
					Account.Achternaam,
					Account.Straatnaam,
					Account.Huisnummer,
					Account.Toevoeging,
					Account.Postcode,
					Account.Plaatsnaam,
					Account.Emailadres,
					Account.Telefoon
					FROM Account
					INNER JOIN Bestellingen ON Bestellingen.Account_id=Account.Account_id
					WHERE Bestellingen.Bestellingen_id='$bestellingnr'");
		
		// SQL query to retrieve all the information about the order
		$taarten = mysql_query(" SELECT * FROM Bestellingen WHERE Bestellingen_id='$bestellingnr'");
		
		
		// print company information at the top of the invoice
		print "	Baked taartenbedrijf <br /> 
				Bakerstreet 12 <br /> 
				1723 GH  Zuid - Scharwoude <br /> 
				Nederland <br /> 
				020233456674 <br />
				Bakedtaart@gmail.com <br />";
		
		// print 
		print " <br /> <strong> Bestelnummer : $bestellingnr </strong> <br /> <br />";

			while($array = mysql_fetch_array($account_id))
					{
					print "Klantnummer : {$array['Account_id']} <br />";
					}
				  
			while($array2 = mysql_fetch_array($datumfactuur))
					{
					print "Datum :  {$array2['Besteldatum']} <br /> <br />";
					}
				// print the information about the customer
				while($info2 = mysql_fetch_array($info))
					{
					print " {$info2['Voornaam']} ";
					print " {$info2['Tussenvoegsel']} ";
					print " {$info2['Achternaam']} ";
					print " <br /> ";
					print " {$info2['Straatnaam']} ";
					print " {$info2['Huisnummer']} ";
					print " {$info2['Toevoeging']} ";
					print " <br /> ";
					print " {$info2['Postcode']} ";
					print " {$info2['Plaatsnaam']} ";
					print " <br />";
					print " Nederland <br />";
					print " {$info2['Telefoon']} ";
					print " <br />";
					print " {$info2['Emailadres']} ";
					}
					
					print "	<br /> 
							<br /> ";
					
					// retrieve the order
					$producten = mysql_query("SELECT * FROM Bestellingen 
												INNER JOIN TaartBestelling ON TaartBestelling.Bestellingen_id=Bestellingen.Bestellingen_id 
												INNER JOIN Taarten ON Taarten.Taarten_id=TaartBestelling.Taarten_id 
												WHERE Bestellingen.Bestellingen_id='$bestellingnr' ");
				
				
				
				$subtotaal = 0.0; // initialize the subtotal
				$totaal = 0.0; // initialize the grand total
				
				print "<h3>Aankopen:</h3>";
				print "<ul>";
				
				// print the order
				while($producten2 = mysql_fetch_array($producten))
					{					
					print " <li><strong> {$producten2['Aantal']} </strong> x ";
					print "<u> {$producten2['Taartnaam']} </u>";
					print "( {$producten2['Kaarsjes']} Kaarsjes, ";
					print " \"<i>{$producten2['Tekst']}</i>\" ) ";
					print " &aacute; &#8364; {$producten2['Prijs']}  ";
					
					// calculate the subtotal and the grand total
					$prijs 	= $producten2['Prijs'];
					$aantal	= $producten2['Aantal'];
					$subtotaal = $prijs * $aantal;
					$totaal	= $totaal + $subtotaal;
		
					print " Subtotaal: &#8364; $subtotaal </li>";
					}	
					print "</ul> <br />";
					print "<h4> <u>Totaal:</u>  &#8364; <b> $totaal </b> </h4>";
					
		// fetch costumer information
		$emails = mysql_query("	SELECT 
					Account.Emailadres,
					Account.Voornaam,
					Account.Tussenvoegsel,
					Account.Achternaam
					FROM Account
					INNER JOIN Bestellingen ON Bestellingen.Account_id=Account.Account_id
					WHERE Bestellingen.Bestellingen_id='$bestellingnr'");
					
		// assign name to $naam and the emailadres to $email
		while($emails2 = mysql_fetch_array($emails))
					{
					$email = $emails2['Emailadres'];
					$naam = $emails2['Voornaam'] ." ". $emails2['Tussenvoegsel'] ." ". $emails2['Achternaam'] ;
					}
		
		
		include ("closedb.php"); // close database connection
		
		print " Graag ontvangen wij het verschuldigde bedrag op 746981 tnv Baked taartenbedrijf te Zuid-scharwoude.";
		print " <br /> <br />";
		
		$factuurmail = ob_get_contents(); // get output buffer contents
		ob_end_flush(); //  output the buffers contents
		
		// a button with hidden fields to email the invoice to the matching emailadres
		print "<form method='post' action='mailfactuurBaked.php' > ";
		print "<input type='hidden' name='factuurmailen' value='$factuurmail' > ";
		print "<input type='hidden' name='emailontvanger' value='$email' > ";
		print "<input type='hidden' name='naam' value='$naam' > ";
		print "<input type='submit' value='Email Factuur' > ";
		print "</form> ";
?>
	
	
		
</div>
</div>
</div>
</body>
</html>
