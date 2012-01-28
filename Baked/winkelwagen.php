<?php
require_once('inc/functions.inc.php');
  session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">

/***********************************************
* Textarea Maxlength script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}
</script>

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
		
		<?php

		include ("verbinding1.php");

		$email = $_SESSION['email'];
		
		$query1 = mysql_query("SELECT Account_id
		       			FROM Account
		       			WHERE Emailadres='$email'");

		while($row1 = mysql_fetch_array($query1))
			{
			  $account = $row1['Account_id'];
			}
		
		$q = ("SELECT Taarten.Taartnaam, Winkelwagen.Tekst, Winkelwagen.Aantal, Winkelwagen.Kaarsjes, Winkelwagen.Prijs, Winkelwagen.Leverdatum
					FROM Winkelwagen
					INNER JOIN Taarten ON Taarten.Taarten_id=Winkelwagen.Taarten_id
					WHERE Account_id='$account'");
		
		$query = mysql_query($q);
					
		
		echo 	"<table border='1' width='580'><tr>
				<th> Taartnaam </th>
				<th> Tekst</th>
				<th> Aantal</th>
				<th> Kaarsjes</th>
				<th> Prijs</th>
				<th> Leverdatum</th>
				</tr>";
		
		while($result = mysql_fetch_array($query))
		{
		echo "<tr>";
		echo "<td>" . $result['Taartnaam'] . "</td>";
		echo "<td>" . $result['Tekst'] . "</td>";		
		echo "<td>" . $result['Aantal'] . "</td>";
		echo "<td>" . $result['Kaarsjes'] . "</td>";
		echo "<td>" . $result['Prijs'] . "</td>";
		echo "<td>" . $result['Leverdatum'] . "</td>";
		echo "</tr>";
		}
		
		echo "</table>";
		include ("closedb.php");
		
		

		?>
		
		</div>
</div>
</div>
</body>

</html>
