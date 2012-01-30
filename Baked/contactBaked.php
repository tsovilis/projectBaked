<?php
  session_start();
  if($_SESSION['email'] != Admin){
  header	("Location: welcomeBaked.html");
  }
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
			<br />
			Baked<br />
			<br />
			Bakerstreet 12<br />
			1723 GH<br />
			Zuid - Scharwoude<br />
			<br />
			Vragen? 
			bakedtaart@gmail.com
			of stel ze op Facebook of Tiwtter!
			<br />
			<br />
			<a href="http://www.facebook.com/profile.php?id=100003387643430&sk=wall"><img src="images/facebook.png" alt="Naar Facebook!"style="height:50px"/></a>
			<a href="https://twitter.com/#!/MrBakedCake"><img src="images/Twitter.png" alt="Naar Twitter!"style="height:52px"/></a>

		</div>
	</div>
</div>
</body>

</html>
