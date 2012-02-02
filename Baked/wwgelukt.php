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
					Uw nieuwe wachtwoord is naar uw emailaders toegestuurd. Met dit wachtwoord kunt u inloggen om deze vervolgens te kunnen wijzigen op de accountpagina!
				</h2>
				<h3>
					 Klik <a href="infoBaked.php"> hier </a> om terug te gaan!
				</h3>
		
			</div>
	</div>
</div>
</body>

</html>
