<?php
require_once('inc/functions.inc.php');
  session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">

/***********************************************
* Textarea Maxlength script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}
</script>

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
		include ("verbinding1.php");

		$Account_id = $_SESSION['Account_id'];
		
		echo   $Account_id;

		$query = mysql_query("SELECT * 
					FROM Winkelwagen 
					WHERE Account_id = ".$Account_id."");
					
		
		echo 	"<table border='1' width='580'><tr>
				<th> Taartnaam </th>
				<th> Tekst</th>
				<th> Aantal</th>
				<th> Kaarsjes</th>
				<th> Prijs</th>
				<th> Leverdatum</th>
				</tr>";
		
		while($result = mysql_fetch_array($query))
		{
		echo "<tr>";
		echo "<td>" . $result['Taartnaam'] . "</td>";
		echo "<td>" . $result['Tekst'] . "</td>";		
		echo "<td>" . $result['Aantal'] . "</td>";
		echo "<td>" . $result['Kaarsjes'] . "</td>";
		echo "<td>" . $result['Prijs'] . "</td>";
		echo "<td>" . $result['Leverdatum'] . "</td>";
		echo "</tr>";
		}
		
		echo "</table>";
		include ("closedb.php");
		
		
		//Winkelwagen.Account_id, Taarten.Taartnaam, Winkelwagen.Tekst, Winkelwagen.Aantal, Winkelwagen.Kaarsjes, Taarten.Prijs, Winkelwagen.Leverdatum	
		
		
		/*		
		echo writeShoppingCart();
		echo "<br />";
		
		echo "Controleer hoeveelheden:";
		echo showCart();
		*/
		
		/*
$cart = $_SESSION['cart'];
$action = $_GET['action'];
switch ($action) {
	case 'add':
		if ($cart) {
			$cart .= ','.$_GET['id'];
		} else {
			$cart = $_GET['id'];
		}
		break;
	case 'delete':
		if ($cart) {
			$items = explode(',',$cart);
			$newcart = '';
			foreach ($items as $item) {
				if ($_GET['Taarten_id'] != $item) {
					if ($newcart != '') {
						$newcart .= ','.$item;
					} else {
						$newcart = $item;
					}
				}
			}
			$cart = $newcart;
		}
		break;
	case 'update':
	if ($cart) {
		$newcart = '';
		foreach ($_POST as $key=>$value) {
			if (stristr($key,'qty')) {
				$id = str_replace('qty','',$key);
				$items = ($newcart != '') ? explode(',',$newcart) : explode(',',$cart);
				$newcart = '';
				foreach ($items as $item) {
					if ($id != $item) {
						if ($newcart != '') {
							$newcart .= ','.$item;
						} else {
							$newcart = $item;
						}
					}
				}
				for ($i=1;$i<=$value;$i++) {
					if ($newcart != '') {
						$newcart .= ','.$id;
					} else {
						$newcart = $id;
					}
				}
			}
		}
	}
	$cart = $newcart;
	break;
}
$_SESSION['cart'] = $cart;
*/
		?>
		
		</div>
</div>
</div>
</body>

</html>