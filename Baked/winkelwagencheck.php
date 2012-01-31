<?php
session_start();
if(!($_SESSION['email'])){
  header	("Location: registratieBaked.php");
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
<?php

$query = mysql_query("
		SELECT 	Account.Account_id, Winkelwagen.Account_id 
		FROM Winkelwagen 
		INNER JOIN Account ON Account.Account_id=Winkelwagen.Account_id
		WHERE Account.Emailadres = '" . $_SESSION['email'] . "'");

while($id = mysql_fetch_array($query)){
	if(
?>

</div>
</div>
</div>
</body>

</html>
