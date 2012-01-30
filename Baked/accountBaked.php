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

	<div id="content">
		
		<div id="totheleft">
<?php include ("snelmenuBaked.html"); ?>
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

		$result = mysql_query("SELECT Bestellingen.Bestellingen_id, Account.Account_id, Taarten.Taartnaam, TaartBestelling.Aantal, TaartBestelling.Tekst, TaartBestelling.Kaarsjes, Bestellingen.Leverdatum, Bestelstatus.Status
					FROM Bestellingen
					INNER JOIN Account ON Account.Account_id=Bestellingen.Account_id
					INNER JOIN TaartBestelling ON TaartBestelling.Bestellingen_id=Bestellingen.Bestellingen_id
					INNER JOIN Taarten ON Taarten.Taarten_id=TaartBestelling.Taarten_id
					INNER JOIN Bestelstatus ON Bestelstatus.Statusnummer=Bestellingen.BestelStatus
					WHERE Account.Emailadres = '" . $_SESSION['email'] . "'");

		echo "<table border='1'>
		<tr>
		<th>Bestelling ID</th>
		<th>Account ID</th>
		<th>Taartnaam</th>
		<th>Aantal</th>
		<th>Tekst</th>
		<th>Kaarsjes</th>
		<th>Leverdatum</th>
		<th>Status</th>
		</tr>";

		while($row = mysql_fetch_array($result))
		  {
		  echo "<tr>";
		  echo "<td>" . $row['Bestellingen_id'] . "</td>";
		  echo "<td>" . $row['Account_id'] . "</td>";
		  echo "<td>" . $row['Taartnaam'] . "</td>";
		  echo "<td>" . $row['Aantal'] . "</td>";
		  echo "<td>" . $row['Tekst'] . "</td>";
		  echo "<td>" . $row['Kaarsjes'] . "</td>";
		  echo "<td>" . $row['Leverdatum'] . "</td>";
		  echo "<td>" . $row['Status'] . "</td>";
		  echo "</tr>";
		  }
	

		echo "</table>";

	?>
	</div>

</div>
	
<div>
<div><h3>Persoonlijke gegevens</h3></div>
	<div>
		<?php
		$gegevens = mysql_query("SELECT Emailadres, Voornaam, Tussenvoegsel, Achternaam, Postcode, 
		Straatnaam, Huisnummer, Toevoeging, Plaatsnaam, Telefoon FROM Account WHERE Account_id=19");
		
		while($dgeg = mysql_fetch_array($gegevens))
		{
		
		echo $dgeg['Emailadres']. "<br />";
		echo $dgeg['Voornaam'].  " ";
		echo $dgeg['Tussenvoegsel']. " " ;
		echo $dgeg['Achternaam']. "<br />";
		echo $dgeg['Straatnaam']. " ";
		echo $dgeg['Huisnummer']. " ";
		echo $dgeg['Toevoeging']. "<br />";
		echo $dgeg['Postcode']. " ";
		echo $dgeg['Plaatsnaam']."<br />";
		echo $dgeg['Telefoon'];
		}
	
		
		include ("closedb.php");
		?>
	</div>
</div>

</div>
		</div>
		
		

		


	</div>
</div>
</body>

</html>
