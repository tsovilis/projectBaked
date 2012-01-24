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
		include ("verbinding1.php"); 
		
		//$bestellingnr 	= 	$_POST["bd"];
		$bestellingnr	=	1;
		$account_id 	= 	mysql_query("SELECT Account_id FROM Bestellingen WHERE Bestellingen_id='$bestellingnr'");
		$datumfactuur 	= 	mysql_query("SELECT Besteldatum FROM Bestellingen WHERE Bestellingen_id = '$bestellingnr'");
		
		
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
		
		
		
		echo "Baked taartenbedrijf <br /> Bakerstreet 12 <br /> 1723 GH  Zuid - Scharwoude <br /> Nederland <br /><br /><br /> ";
		

		
			echo "<table border ='0'>";
			echo "<tr>";
				while($array = mysql_fetch_array($account_id))
				  {
				  echo "<td> Account ID:" . $array['Account_id'] . "</td>";
				  }
			echo "</tr>";
			echo "<tr>";
				while($array2 = mysql_fetch_array($datumfactuur))
					  {
					  echo "<td> Datum:" . $array2['Besteldatum'] . "</td>";
					  }
			echo "</tr>";
			echo "<tr> Bestelnummer: 1 </tr>";
			echo "<tr>";
				while($info2 = mysql_fetch_array($info))
					{
					echo "<tr>";
					echo "<td>" . $info2['Voornaam'] . "</td>";
					echo "<td>" . $info2['Tussenvoegsel'] . "</td>";
					echo "<td>" . $info2['Achternaam'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>" . $info2['Straatnaam'] . "</td>";
					echo "<td>" . $info2['Huisnummer'] . "</td>";
					echo "<td>" . $info2['Toevoeging'] . "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>" . $info2['Postcode'] . "</td>";
					echo "<td>" . $info2['Plaatsnaam'] . "</td>";
					echo "</tr>" ;
					}
			echo "</tr>";
		include ("closedb.php");
		echo " </table> ";
	?>
</div>
</div>
</div>
</body>
</html>
