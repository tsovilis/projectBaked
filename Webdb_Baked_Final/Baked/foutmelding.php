<?php
  session_start();
?>
<!-- The doctype determines the format of the page. -->
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

	<div id="content"> <!-- The content of the website will be placed in this div. -->
		
		<div id="totheleft"> <!-- On the left side, we have the menu. -->
<?php include ("snelmenuBaked.html"); ?>
		</div>
		
		<div id="rightside"> <!-- On the right side we have the login. -->

<?php include ("loginform.php"); ?>
		</div>
		
		<div id="inhoud"> <!-- In the middle is the content of the requested page. -->
				<h2> <!-- This page show that not all mandatory fields were filled in and gives a link to try it again. -->
					U heeft niet alle verplichte velden ingevuld!
				</h2>
				<h3>
					 Klik <a href="registratieBaked.php"> hier </a> om terug te gaan!
				</h3>
		
			</div>
	</div>
</div>
</body>

</html>
