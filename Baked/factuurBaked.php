<?php
  session_start();
  if($_SESSION['email'] != 'Admin'){
  header	("Location: welcomeBaked.html");
  }
?>

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
	<a href="infoBaked.php"><img src="images/Bakedsign.png" alt=""/></a>

	<div id="content">
		
		<div id="totheleft">
		<?php include ("snelmenuBaked.html"); ?>
		</div>
		
		<div id="rightside">	
		<?php include ("loginform.php"); ?>
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
		
		$info = mysql_query("	SELECT 
					Account.Voornaam,
					Account.Tussenvoegsel,
					Account.Achternaam,
					Account.Straatnaam,
					Account.Huisnummer,
					Account.Toevoeging,
					Account.Postcode,
					Account.Plaatsnaam
					FROM Account
					INNER JOIN Bestellingen ON Bestellingen.Account_id=Account.Account_id
					WHERE Bestellingen.Bestellingen_id='$bestellingnr'");
					
		$taarten = mysql_query(" SELECT * Bestellingen  WHERE Bestellingen_id='$bestellingnr' ");
		
		
		
		print "	Baked taartenbedrijf <br /> 
				Bakerstreet 12 <br /> 
				1723 GH  Zuid - Scharwoude <br /> 
				Nederland <br /> 
				020233456674 <br />
				Baked@gmail.com <br />
				<br /> <br />";

 
		
				

			print " <strong> Bestelnummer: " . $bestellingnr . " </strong> <br /> <br />";

			while($array = mysql_fetch_array($account_id))
					{
					print " Account ID: " . $array['Account_id'] . "<br />";
					}
				  
				while($array2 = mysql_fetch_array($datumfactuur))
					{
					print "Datum: " . $array2['Besteldatum'] . "<br /> <br />";
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
					}
					
					print " <br /> <br />";
					print "<div class='lijntje'> </div> ";
				
					$producten = mysql_query("SELECT * FROM Bestellingen 
												INNER JOIN TaartBestelling ON TaartBestelling.Bestellingen_id=Bestellingen.Bestellingen_id 
												INNER JOIN Taarten ON Taarten.Taarten_id=TaartBestelling.Taarten_id 
												WHERE Bestellingen.Bestellingen_id='$bestellingnr' ");
				
				
				print "<table WIDTH='590'>";
				print "	<th width= '80px'> Product  </th> 
						<th width= '35px'> Kaarsjes </th>
						<th width= '80px'> Tekst </th>
						<th width= '35px'> Aantal  </th> 
						<th width= '35px'> Prijs </th> 
						<th width= '40px'> Subtotaal </th>";
				
				$subtotaal = 0.0;
				$totaal = 0.0;
				
				while($producten2 = mysql_fetch_array($producten))
					{					
					print " <tr><td> ";
					print " <center> ";
					print "{$producten2['Taartnaam']} ";
					print " </center> ";
					print " </td> <td>";
					print " <center> ";
					print "{$producten2['Kaarsjes']} ";
					print " </center> ";
					print " </td> <td>";
					print " <center> ";
					print "{$producten2['Tekst']} ";
					print " </center> ";
					print " </td> <td>";
					print " <center>";
					print "{$producten2['Aantal']} x ";
					print " </center> ";
					print " </td> <td>";
					print " <center> ";
					print " &euro; {$producten2['Prijs']}  ";
					print " </center> ";
					print " </td> <td>";
					print " <center> ";
					
					$prijs 	= $producten2['Prijs'];
					$aantal	= $producten2['Aantal'];
					$subtotaal = $prijs * $aantal;
					$totaal	= $totaal + $subtotaal;
					
					print " &euro; $subtotaal ";
					print " </center> ";
					print " </td> </tr> ";
					}
				print " </table> ";
				print "<div class='lijntje'> </div> ";
				print " <p id='totaal'> <u> Totaal:</u> &euro; $totaal</p> ";

		include ("closedb.php");
		
		Print " Betaling is mogelijk op 98989898 tnv Baked taartenbedrijf te Zuid-scharwoude of contant bij levering."
	?>
</div>
</div>
</div>
</body>
</html>
