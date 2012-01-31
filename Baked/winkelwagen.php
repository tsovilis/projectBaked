<?php
  session_start();
  if(!($_SESSION['email'])){
  header	("Location: registratieBaked.php");
  }
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
		
		$q = ("SELECT Taarten.Taarten_id, Taarten.Taartnaam, Winkelwagen.Kaarsjes, Winkelwagen.Tekst, Winkelwagen.Aantal, Winkelwagen.Prijs
					FROM Winkelwagen
					INNER JOIN Taarten ON Taarten.Taarten_id=Winkelwagen.Taarten_id
					WHERE Account_id='$account'");
		
		$query = mysql_query($q);
					
		
				print "<table width='590' border='0'>";
				print "	<th width= '80px'> Product  </th> 
						<th width= '35px'> Kaarsjes </th>
						<th width= '80px'> Tekst </th>
						<th width= '35px'> Aantal  </th> 
						<th width= '35px'> Prijs </th> 
						<th width= '40px'> Subtotaal </th>";
				
				$subtotaal = 0.0;
				$totaal = 0.0;
				
				while($producten2 = mysql_fetch_array($query))
					{					
					print " <tr><td> ";
					print "{$producten2['Taartnaam']} ";
					print " </td> <td>";
					print "{$producten2['Kaarsjes']} ";
					print " </td> <td>";
					print "{$producten2['Tekst']} ";
					print " </td> <td>";
					print " <center>";
					print "{$producten2['Aantal']} x ";
					print " </td> <td>";
					print " &euro; {$producten2['Prijs']}  ";
					print " </td> <td>";
					
					$prijs 	= $producten2['Prijs'];
					$aantal	= $producten2['Aantal'];
					$subtotaal = $prijs * $aantal;
					$totaal	= $totaal + $subtotaal;
					
					print " &euro; $subtotaal ";
					print " </td>";
					print " <td width='15' height='15'><a href='verwijderenproduct.php?verwijderen=".$producten2['Taarten_id'].
						  "'><img src='images/verwijderen.png' width='15' height='15' alt='Dit product verwijderen' titel= 'Dit product verwijderen'/></a>
							</td></tr> ";
					}
				print " </table> ";
				print "<div class='lijntje'> </div> ";
				print "<div id='totaal'> <u> Totaal:</u> &euro; $totaal
					  <br /><br /><a href='bestelBaked.php'><img src='images/bestellen1.png' alt='Bestel' 
					  onmouseover='images/bestellen2.png' onmouseout='images/bestellen1.png' /></a></div> ";
				include ("closedb.php");
		
		

		?>

		

		
		</div>
</div>
</div>
</body>

</html>
