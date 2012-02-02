<?php
  session_start();
  if($_SESSION['email'] != 'Admin'){
  header	("Location: welcomeBaked.html");
  }
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

<script type="text/javascript">

/***********************************************
* Textarea Maxlength script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/
<!-- This function makes sure that certain objects, like textfields, can only have a specific maximum length -->
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

	<div id="content"> <!-- The content of the website will be placed in this div. -->
		
		<div id="totheleft">
		<?php include ("snelmenuBaked.html"); ?> <!-- On the left side, we have the menu. -->
		</div>
		
		<div id="rightside">	
		<?php include ("loginform.php"); ?> <!-- On the right side we have the login. -->
		</div>
		
		<div id="inhoud"> <!-- In the middle is the content of the requested page. -->
			<h2>
			Administrator
			</h2>

<div>
<h4>
Taart informatie
</h4>

<table>
<tr>

<form action="wijzigen.php" method="post" enctype="multipart/form-data">

<?php
	// Set up connection to database.
	include ("verbinding1.php"); 
				// Select name, info, price and id to be changed.
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
	// New id for the pie.
	while($row5 = mysql_fetch_array($id))
			{
			  echo "<option value=\"".$row5['Taarten_id']."\">".$row5['Taarten_id']."</option>\n  ";
			}
		
   	?>
	</select>
	</tr>
	<tr>
	<td> Naam voor de taart: </td> <td> <textarea type="text" name="Taartnaam" rows="2" /><?php
	// New name for the pie.
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
						maxlength="168"">
	<?php
	// New info for the pie.
	while($row2 = mysql_fetch_array($sql2))
				{
				print "{$row2['KorteInfoTaart']} ";
				}
		
   ?></textarea> </td>
	</tr>

	<tr>
	<td>Uitgebreide beschrijving:</td> <td> <textarea 	type="text" name="BeschrijvingTaart" cols="56" rows="12"
						maxlength="672">
	<?php
	// New full (expanded) info for the pie.
	while($row3 = mysql_fetch_array($sql3))
				{
				print "{$row3['BeschrijvingTaart']} ";
				}
		
   ?></textarea></td>
	</tr>

	<tr>
	<td> Prijs: </td> <td> <textarea type="text" name="Prijs" rows="1" /><?php
	// New price for the pie.
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

				
		

		


	</div>
</div>
</body>

</html>
