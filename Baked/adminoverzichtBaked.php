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

		<div style="height:10px"></div>
        <div class="lijntje"></div>
        <div style="height:10px"></div>

		<strong>Administrator opties</strong>
<br /><br />
<a href="adminBaked.php">De bestellingen lijst</a> <br />
<a href="admintaarttoevoegenBaked.php">Taarten toevoegen</a>


		</div>
		
		<div id="inhoud">
<h2>
Administrator
</h2>

<div>

<div>
<div><h3>Bestelling Archief</h3></div>


	<?php
		include ("verbinding1.php"); 

		$result = mysql_query("SELECT Bestellingen.Bestellingen_id, Account.Account_id, Taarten.Taartnaam, TaartBestelling.Aantal, TaartBestelling.Tekst, TaartBestelling.Kaarsjes, Bestellingen.Leverdatum, Bestelstatus.Status
					FROM Bestellingen
					INNER JOIN Account ON Account.Account_id=Bestellingen.Account_id
					INNER JOIN TaartBestelling ON TaartBestelling.Bestellingen_id=Bestellingen.Bestellingen_id
					INNER JOIN Taarten ON Taarten.Taarten_id=TaartBestelling.Taarten_id
					INNER JOIN Bestelstatus ON Bestelstatus.Statusnummer=Bestellingen.BestelStatus
					WHERE Bestellingen.BestelStatus=3");

		echo "<table border='0' class='leettable'>
		<tr>
		<th class='leetcell'>Bestelling ID</th>
		<th class='leetcell'>Account ID</th>
		<th class='leetcell'>Taartnaam</th>
		<th class='leetcell'>Aantal</th>
		<th class='leetcell'>Tekst</th>
		<th class='leetcell'>Kaarsjes</th>
		<th class='leetcell'>Leverdatum</th>
		<th class='leetcell'>Status</th>
		</tr>";

		while($row = mysql_fetch_array($result))
		  {
		  echo "<tr>";
		  echo "<td class='leetcell'>" . $row['Bestellingen_id'] . "</td>";
		  echo "<td class='leetcell'>" . $row['Account_id'] . "</td>";
		  echo "<td class='leetcell'>" . $row['Taartnaam'] . "</td>";
		  echo "<td class='leetcell'>" . $row['Aantal'] . "</td>";
		  echo "<td class='leetcell'>" . $row['Tekst'] . "</td>";
		  echo "<td class='leetcell'>" . $row['Kaarsjes'] . "</td>";
		  echo "<td class='leetcell'>" . $row['Leverdatum'] . "</td>";
		  echo "<td class='leetcell'>" . $row['Status'] . "</td>";
		  echo "</tr>";
		  }
	

		echo "</table>";
		
include ("closedb.php");
	?>


</div>


</div>
		</div>
		
		

		


	</div>
</div>
</body>

</html>
