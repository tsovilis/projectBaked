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
	<a href="infoBaked.php"> 
		<img src="images/Bakedsign.png" alt="Baked logo" />
	</a>
	
	<!-- The content of the website will be placed in this div. -->
	<div id="content">
		
		<!-- On the left side, we have the menu. -->
		<div id="totheleft">
			<?php include ("snelmenuBaked.html"); ?>
		</div>
		
		<!-- On the right side we have the login. -->
		<div id="rightside">	
			<?php include ("loginform.php"); ?>
		</div>
		
		<!-- In the middle is the content of the requested page. 
		This page is used for retrieving your password when you've lost it.-->
		<div id="inhoud">
			<h2> 
				Wachtwoord vergeten?
			</h2>
			
			<h3>
				Voer uw emailadres in en wij sturen u een nieuw wachtwoord toe!
			</h3>
			
			<form action="wachtwoordwijzigen.php" method="post">
				<table>
					<tr>
						<td>
							<input type="text" name="email" />
						</td>
						<td>
							<input type="submit" value="Verstuur" />
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
</body>
</html>
