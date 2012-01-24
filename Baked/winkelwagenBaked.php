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
			Winkelwagen
			</h2>
			
			<table width="590" border="0" >
			<tr>
				<th align="left">Aantal</th> <th align="left">Product</th> <th align="left">Prijs product</th> <th align="right">Te betalen:</th> 
			</tr>
			<tr>
				<td height="30">2</td> <td>Oma's appeltaart</td> <td>€10,00</td> <td align="right">€20,00</td>
			</tr>
			<tr>
				<td height="30">1</td> <td>Slagroomtaart</td> <td>€7,50</td> <td align="right">€7,50</td>
			</tr>
			<tr>
				<td height="30"></td> <td></td> <td></td> <td align="right"></td>
			</tr>
			<tr>
				<td height="30"></td> <td></td> <td></td> <td align="right"></td>
			</tr>
			<tr>
				<td height="30"></td> <td></td> <td></td> <td align="right"></td>
			</tr>
			<tr>
				<td height="30"></td> <td></td> <td></td> <td align="right">_______</td>
			</tr>
			<tr>
				<th align="left" height="30">Totaal:</th> <td></td> <td></td> <td align="right">€27,50</td>
			</tr>
			<tr>
				<td height="30"></td> <td></td> <td></td> <td align="right"> 
				<a href="betalingBaked.html"><img src="images/factuur1.png" alt="Factuur verzenden"
			onmouseover="src='images/factuur2.png';"
			onmouseout="src='images/factuur1.png';"/></a></td>
			</tr>
			</table>
			
		</div>
	</div>
</div>
</body>

</html>