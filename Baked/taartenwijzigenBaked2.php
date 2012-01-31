<?php
  session_start();
  if($_SESSION['email'] != 'Admin'){
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
Administrator
</h2>

<div>

<div>
<h4>
Taart informatie
</h4>

<table>
<tr>

<form action="wijzigen.php" method="post" enctype="multipart/form-data">

<?php

	include ("verbinding1.php"); 
		
				$taartje = $_POST["taartje"];
				$sql1 = mysql_query("SELECT Taartnaam FROM Taarten WHERE Taartnaam='$taartje'");
				$sql2 = mysql_query("SELECT KorteInfoTaart FROM Taarten WHERE Taartnaam='$taartje'");
				$sql3 = mysql_query("SELECT BeschrijvingTaart FROM Taarten WHERE Taartnaam='$taartje'");
				$sql4 = mysql_query("SELECT Prijs FROM Taarten WHERE Taartnaam='$taartje'");
				$id =   mysql_query("SELECT Taarten_id FROM Taarten WHERE Taartnaam='$taartje'");


		

?>
	<tr>Taart id:
	<select name="id">
	<?php
	while($row5 = mysql_fetch_array($id))
			{
			  echo "<option value=\"".$row5['Taarten_id']."\">".$row5['Taarten_id']."</option>\n  ";
			}
		
   	?>
	</select>
	</tr>
	<tr>
	<td> Naam voor de taart: </td> <td> <textarea type="text" name="Taartnaam" rows="2" /><?php
	while($row1 = mysql_fetch_array($sql1))
				{
				print "{$row1['Taartnaam']} ";
				}
		
   ?>
</textarea>
	 </td>
	</tr>


	<tr>
	<td>Korte beschrijving:</td> <td> <textarea 	type="text" name="KorteInfoTaart" cols="56" rows="3"
						maxlength="168""><?php
	while($row2 = mysql_fetch_array($sql2))
				{
				print "{$row2['KorteInfoTaart']} ";
				}
		
   ?></textarea> </td>
	</tr>

	<tr>
	<td>Uit gebreide beschrijving:</td> <td> <textarea 	type="text" name="BeschrijvingTaart" cols="56" rows="12"
						maxlength="672"><?php
	while($row3 = mysql_fetch_array($sql3))
				{
				print "{$row3['BeschrijvingTaart']} ";
				}
		
   ?></textarea></td>
	</tr>

	<tr>
	<td> Prijs: </td> <td> <textarea type="text" name="Prijs" rows="1" /><?php
	while($row4 = mysql_fetch_array($sql4))
				{
				print "{$row4['Prijs']} ";
				}
		
  ?></textarea>
	</td>
	</tr>


	
	</table>
	<br />
	<br />
		<input type="submit" name="submit" value="Submit" />
	
</form>
	
	</div>

	<div>


</div>
		</div>
		
		

		


	</div>
</div>
</body>

</html>
