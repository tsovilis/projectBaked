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
		SELECT 	Winkelwagen.Account_id 
		FROM Winkelwagen 
		INNER JOIN Account ON Account.Account_id=Winkelwagen.Account_id
		WHERE Account.Emailadres = '" . $_SESSION['email'] . "'");

	if(!(mysql_fetch_array($query)))
		{
		header("location:logout.php");
		}
	else
		{
		echo "<table style='text-align: center'><tr>";
		echo "<td colspan='2' class='center'><h2>Wilt u uw winkelwagen behouden? </h2></td></tr><tr>";
		echo "<td><a href='logout.php'> <img src='images/behouden.png' alt='behouden' onmouseover='(src=\"images/behouden1.png\")' onmouseout='(src=\"images/behouden.png\")'/> </a></td>";
		echo "<td><a href='wwweglogout.php'> <img src='images/nietbehouden.png' alt='niet behouden' onmouseover='(src=\"images/nietbehouden1.png\")' onmouseout='(src=\"images/nietbehouden.png\")'/> </a></td>";
		echo "</tr></table>";
		}

?>

</div>
</div>
</div>
</body>

</html>
