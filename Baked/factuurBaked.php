<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
		include 'verbinding1.php';
		
		$bestellingnr 	= 	$_POST["bd"];
		$account_id 	= 	mysql_query("SELECT Account_id FROM Bestellingen WHERE Bestellingen_id='$bestellingnr' ");
		$datumfactuur 	= 	mysql_query("SELECT Besteldatum FROM Bestellingen WHERE Bestellingen_id ='$bestellingnr' ");
		
		ob_start();
		
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
					
		$taarten = mysql_query(" SELECT * FROM Bestellingen WHERE Bestellingen_id='$bestellingnr'");
		
		
		
		print "	Baked taartenbedrijf <br /> 
				Bakerstreet 12 <br /> 
				1723 GH  Zuid - Scharwoude <br /> 
				Nederland <br /> 
				020233456674 <br />
				Bakedtaart@gmail.com <br />";
				
			print " <br /> <strong> Bestelnummer : $bestellingnr </strong> <br /> <br />";

			while($array = mysql_fetch_array($account_id))
					{
					print "Klantnummer : {$array['Account_id']} <br />";
					}
				  
			while($array2 = mysql_fetch_array($datumfactuur))
					{
					print "Datum :  {$array2['Besteldatum']} <br /> <br />";
					}
			
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
					
					
					$producten = mysql_query("SELECT * FROM Bestellingen 
												INNER JOIN TaartBestelling ON TaartBestelling.Bestellingen_id=Bestellingen.Bestellingen_id 
												INNER JOIN Taarten ON Taarten.Taarten_id=TaartBestelling.Taarten_id 
												WHERE Bestellingen.Bestellingen_id='$bestellingnr' ");
				
				
				
				$subtotaal = 0.0;
				$totaal = 0.0;
				
				print "<h3>Aankopen:</h3>";
				print "<ul>";
				
				while($producten2 = mysql_fetch_array($producten))
					{					
					print " <li><strong> {$producten2['Aantal']} </strong> x ";
					print "<u> {$producten2['Taartnaam']} </u>";
					print "( {$producten2['Kaarsjes']} Kaarsjes, ";
					print " \"<i>{$producten2['Tekst']}</i>\" ) ";
					print " &aacute; &#8364; {$producten2['Prijs']}  ";
					
					$prijs 	= $producten2['Prijs'];
					$aantal	= $producten2['Aantal'];
					$subtotaal = $prijs * $aantal;
					$totaal	= $totaal + $subtotaal;
		
					print " Subtotaal: &#8364; $subtotaal </li>";
					}	
					print "</ul> <br />";
					print "<h4> <u>Totaal:</u>  &#8364; <b> $totaal </b> </h4>";
		
		$emails = mysql_query("	SELECT 
					Account.Emailadres,
					Account.Voornaam,
					Account.Tussenvoegsel,
					Account.Achternaam
					FROM Account
					INNER JOIN Bestellingen ON Bestellingen.Account_id=Account.Account_id
					WHERE Bestellingen.Bestellingen_id='$bestellingnr'");
		
		while($emails2 = mysql_fetch_array($emails))
					{
					$email = $emails2['Emailadres'];
					$naam = $emails2['Voornaam'] ." ". $emails2['Tussenvoegsel'] ." ". $emails2['Achternaam'] ;
					}
		
		
		include ("closedb.php");
		
		print " Graag ontvangen wij het verschuldigde bedrag op 746981 tnv Baked taartenbedrijf te Zuid-scharwoude.";
		print " <br /> <br />";
		
		$factuurmail = ob_get_contents();
		ob_end_flush();
		
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
