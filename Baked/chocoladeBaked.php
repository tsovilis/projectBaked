<?php
require_once('inc/functions.inc.php');
  session_start();{
    if($_SESSION['Login'] === 'ingelogd');
	if($_SESSION['cart'] === 'cart');
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
Chocoladetaarten
</h2>

<?php
		include ("verbinding1.php"); 
		
		$result = mysql_query("SELECT *	FROM Taarten WHERE Taartsoort='1'");
		
		while($row = mysql_fetch_array($result))
		{
		echo "<table border='0' width='580'>";
		echo "<tr>";
		echo "<td width='100'> &euro;" . $row['Prijs'] . "</td>";
		echo "<td colspan='2' id='titeltaartinfo'><strong><a href='taartinfoBaked.php?taart=".$row['Taarten_id']."'>" . $row['Taartnaam'] . "</a></strong></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td height='100'><a href='taartinfoBaked.php?taart=".$row['Taarten_id']."'> <img src='images/".$row['Plaatje']."'alt='Chocoladetaart'	width='100'	height='100'/></a> </td>";
		echo "<td id='kortetaartinfo'>" . $row['KorteInfoTaart'] . "</td>";
		echo "<td width='95'><a href='taartinfoBaked.php?taart=".$row['Taarten_id']. 
			 "'> <img src= 'images/Meerinfo1.png' alt='Meer info' width='95'	height='36'
				onmouseover= src='images/Meerinfo2.png'; onmouseout= src='images/Meerinfo1.png'; /></a> </td>";
		echo "</tr>";
		echo "</table>";
		echo "<br /><div class='lijntje'></div>	<br />";
		}
		include ("closedb.php");
	?>
</div>
</div>
</div>
</body>
</html>
