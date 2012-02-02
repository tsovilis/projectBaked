<!-- session starts at login. if there's no login you can't reach this page, you get redirected to registratieBaked.php -->

<?php
  session_start();					
  if(!($_SESSION['email'])){
  header	("Location: registratieBaked.php");
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

<!--Next is the dividing of the page with different div's. The first two are div with includes-->

	<div id="content">
		
		<div id="totheleft"> 
<?php include ("snelmenuBaked.html");  ?>	
		</div>
		
		<div id="rightside">	
<?php include ("loginform.php"); ?>
		</div>
		
		<div id="inhoud">
<h2>
Uw account
</h2>

<div>

<div>
<div><h3>Uw bestellingen</h3></div>
	<div>
<?php include ("verbinding1.php"); 

// De next query is to get all the orders that the users has made. It shows only the orders of the logged in user because of: WHERE Account.Emailadres = " . $_SESSION...

		$result = mysql_query("SELECT Bestellingen.Bestellingen_id, Account.Account_id, Taarten.Taartnaam, TaartBestelling.Aantal, TaartBestelling.Tekst, TaartBestelling.Kaarsjes, Bestellingen.Leverdatum, Bestelstatus.Status
					FROM Bestellingen
					INNER JOIN Account ON Account.Account_id=Bestellingen.Account_id
					INNER JOIN TaartBestelling ON TaartBestelling.Bestellingen_id=Bestellingen.Bestellingen_id
					INNER JOIN Taarten ON Taarten.Taarten_id=TaartBestelling.Taarten_id
					INNER JOIN Bestelstatus ON Bestelstatus.Statusnummer=Bestellingen.BestelStatus
					WHERE Account.Emailadres = '" . $_SESSION['email'] . "'
					ORDER BY Bestellingen.Leverdatum");

// Table with table headers

		echo "<table border='1' class='leettable'>
		<tr>
		<th class='leetcell'>Bestelling</th>
		<th class='leetcell'>Taartnaam</th>
		<th class='leetcell'>Aantal</th>
		<th width='150' class='leetcell'>Tekst</th>
		<th class='leetcell'>Kaarsjes</th>
		<th class='leetcell'>Leverdatum</th>
		<th class='leetcell'>Status</th>
		</tr>";

//As long as the array row is filled, it goes through this while loop. 

		while($row = mysql_fetch_array($result))
		  {
		  echo "<tr>";
		  echo "<td class='leetcell'>" . $row['Bestellingen_id'] . "</td>";
		  echo "<td class='leetcell'>" . $row['Taartnaam'] . "</td>";
		  echo "<td class='leetcell'>" . $row['Aantal'] . "</td>";
		  echo "<td class='leetcell'>" . $row['Tekst'] . "</td>";
		  echo "<td class='leetcell'>" . $row['Kaarsjes'] . "</td>";
		  echo "<td class='leetcell'>" . $row['Leverdatum'] . "</td>";
		  echo "<td class='leetcell'>" . $row['Status'] . "</td>";
		  echo "</tr>";
		  }
		echo "</table>";

	?>
	</div>

</div>
	
<div>
<div><h3>Persoonlijke gegevens</h3></div>
	<div>

<!-- In this form, the user sees al his accountinformation. He can edit this because of the update query in accountwijzigen.php. When the user submits this form, accountwijzigen.php will be activated -->

	<?php
		$gegevens = mysql_query("
		SELECT 	Emailadres, Voornaam, Tussenvoegsel, Achternaam, Postcode, 
				Straatnaam, Huisnummer, Toevoeging, Plaatsnaam, Telefoon 
		FROM Account 
		WHERE Account.Emailadres = '" . $_SESSION['email'] . "'");
		
		while($dgeg = mysql_fetch_array($gegevens))
		{
		echo "<form action='accountwijzigen.php' method='post'>
		<table border='0'>
		<tr>
		<td width='150'><strong>E-mailadres</strong></td><td width='150'>" .$dgeg['Emailadres'].
		"</td></tr>
		<tr>
		<td><strong>Voornaam</strong></td><td><input type='text' name='Voornaam' value='".$dgeg['Voornaam']."'/>
		</td></tr>
		<tr>
		<td><strong>Tussenvoegsel</strong></td><td><input type='text' name='Tussenvoegsel' value='".$dgeg['Tussenvoegsel']."'/>
		</td></tr>
		<tr>
		<td><strong>Achternaam</strong></td><td><input type='text' name='Achternaam' value='".$dgeg['Achternaam']."'/>
		</td></tr>
		<tr>
		<td><strong>Straatnaam</strong></td><td><input type='text' name='Straatnaam' value='".$dgeg['Straatnaam']."'/>
		</td></tr>
		<tr>
		<td><strong>Huisnummer</strong></td><td><input type='text' name='Huisnummer' value='".$dgeg['Huisnummer']."'/>
		</td></tr>
		<tr>
		<td><strong>Toevoeging</strong></td><td><input type='text' name='Toevoeging' value='".$dgeg['Toevoeging']."'/>
		</td></tr>
		<tr>
		<td><strong>Postcode</strong></td><td><input type='text' name='Postcode' value='".$dgeg['Postcode']."'/>
		</td></tr>
		<tr>
		<td><strong>Plaatsnaam</strong></td><td><input type='text' name='Plaatsnaam' value='".$dgeg['Plaatsnaam']."'/>
		</td></tr>
		<tr>
		<td><strong>Telefoon</strong></td><td><input type='text' name='Telefoon' value='".$dgeg['Telefoon']."'/>
		</td></tr>
		<tr>
		<td></td><td> <input type='submit' name='Wijzigen' value='Wijzigen'/> </td>
		</tr>
		</table>";
		}
			

		?>
</div>
</div>

</div>
</div>
</div>
</div>
</body>

</html>
