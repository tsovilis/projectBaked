<?php
  session_start();
?>
<!-- The doctype determines the format of the page. -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/php; charset=utf-8" />
	<title>Baked!</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="baked.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="main">
		<a href="infoBaked.php"><img src="images/Bakedsign.png" alt=""/></a>
			<div id="content"> <!-- The content of the website will be placed in this div. -->
				<div id="totheleft"> <!-- On the left side, we have the menu. -->
					<?php include ("snelmenuBaked.html"); ?>
				</div>
			
				<div id="rightside"> <!-- On the right side we have the login. -->
					<?php include ("loginform.php"); ?>
				</div>
			
				<div id="inhoud"> <!-- In the middle is the content of the requested page. -->
					<h2>
						Fruittaarten
					</h2>
					
	<?php
		// Set up connection to database.
		include ("verbinding1.php"); 
		
		// Select all pies from the pie database where the pies are of a specific type.
		$result = mysql_query("SELECT *	FROM Taarten WHERE Taartsoort='2'");
		
		while($row = mysql_fetch_array($result))
		{
		// Print te list of pies with this specific type.
		echo "<table border='0' width='580'>";
		echo "<tr>";
		echo "<td style='width:100px'> &euro;" . $row['Prijs'] . "</td>";
		echo "<td colspan='2' id='titeltaartinfo'><strong><a href='taartinfoBaked.php?taart=".$row['Taarten_id']."'>" . $row['Taartnaam'] . "</a></strong></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td style='height:100px'><a href='taartinfoBaked.php?taart=".$row['Taarten_id']."'> <img src='images/".$row['Plaatje']."' alt='Fruittaart'	width='100'	height='100'/></a> </td>";
		echo "<td id='kortetaartinfo'>" . $row['KorteInfoTaart'] . "</td>";
		echo "<td style='width:95px'><a href='taartinfoBaked.php?taart=".$row['Taarten_id']. 
			 "'> <img src= 'images/Meerinfo1.png' alt='Meer info' width='95' height='36'
				onmouseover='(src=\"images/Meerinfo2.png\")' onmouseout='(src=\"images/Meerinfo1.png\")'/> </a> </td>";
		echo "</tr>";
		echo "</table>";
		echo "<br /><div class='lijntje'></div>	<br />";
		 }
		// Close connection to database.
		include ("closedb.php");
	?>
			</div>
		</div>
	</div>
</body>
</html>
