<?php
  session_start();
?>

<!-- The doctype determines the format of the page. -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- This piece of code determines the format of the content, the title of the page and selects the stylesheet for the layout. -->
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
		On this page, our contact information is shown, as well as links
		to our Twitter and Facebook pages.-->
		<div id="inhoud">
			<h4>
			Baked
			</h4>
			Bakerstreet 12<br />
			1723 GH<br />
			Zuid - Scharwoude<br />
			<br />
			Vragen? 
			bakedtaart@gmail.com
			of stel ze op Facebook of Twitter!
			<br />
			<br />
			<a href="http://www.facebook.com/profile.php?id=100003387643430">
				<img src="images/facebook.png" alt="Naar Facebook!" style="height:50px"/>
			</a>
			<a href="https://twitter.com/#!/MrBakedCake">
				<img src="images/Twitter.png" alt="Naar Twitter!" style="height:52px"/>
			</a>
		</div>
	</div>
</div>
</body>
</html>
