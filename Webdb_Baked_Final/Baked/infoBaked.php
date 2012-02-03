<?php
  session_start();
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
<!-- Main (index) page after the welcome page. -->
<body>
<div id="main">
	<a href="infoBaked.php"><img src="images/Bakedsign.png" alt=""/></a>

	<div id="content"> <!-- The content of the website will be placed in this div. -->
		<div id="totheleft">
			<?php include ("snelmenuBaked.html"); ?> <!-- On the left side, we have the menu. -->
		</div>
		
		<div id="rightside">	
			<?php include ("loginform.php"); ?> <!-- On the right side we have the login. -->
		</div>
		
		<div id="inhoud"> <!-- In the middle is the content of the requested page. -->
			<strong> Baked </strong>, opgericht in 1869, is een authentieke taartenbakkerij met een lange en interessante historie. 
			De kwaliteit van onze taarten is in heel Nederland bekend en geroemd. 
			Elke dag weer zorgen de <i> Baked </i> medewerkers voor een overheerlijke taart in uw handen.<br />
			
			<div class="lijntje"></div>
			
			<h2> Vroeger </h2>
			<table>
				<tr>
					<td style="width:110px, height:70px"> <img width='110' height='70' 
					src="http://ivdgeschiedenis.punt.nl/upload/Bakkerij_in_de_Kelder_IvD_ab.jpg" alt="Oude bakkerij"/></td>
					<td> Opgericht door Jos Günther in 1869. </td>
				</tr>
			</table>
		</div>
	</div>
</div>
</body>
</html>
