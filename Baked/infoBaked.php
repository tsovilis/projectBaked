<?php
  session_start();
  if($_SESSION['email'] != Admin){
  header	("Location: welcomeBaked.html");
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
		
			<strong> Baked </strong>, opgericht in 1869, is een authentieke taartenbakkerij met een lange en interessante historie. 
			De kwaliteit van onze taarten is in heel Nederland bekend en geroemd. Elke dag weer zorgen de <i> Baked </i> medewerkers voor een overheerlijke taart in uw handen.<br />
			<div class="lijntje"></div>
			<h2> Vroeger </h2>
			<table><tr>
			<td width= "110" height="70"> <img width='110' height='70' src="http://ivdgeschiedenis.punt.nl/upload/Bakkerij_in_de_Kelder_IvD_ab.jpg"/></td>
			<td> Opgericht door Jos Günther in 1869. </td>
			</tr>
			
		</div>
		
		

		


	</div>
</div>
</body>

</html>
