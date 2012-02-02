<?php
  session_start();
?>

<!-- The doctype determines the format of the page. -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<!-- This piece of code determines the format of the content, the title of the page and selects the stylesheet for the layout. -->
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
		
		<div id="totheleft"> 
		<?php include ("snelmenuBaked.html"); ?> <!-- On the left side, we have the menu. -->
		</div>
		
		<div id="rightside"> 
		<?php include ("loginform.php"); ?> <!-- On the right side we have the login. -->
		</div>
		
		<div id="inhoud"> <!-- In the middle is the content of the requested page. -->
		
		<?php
		
		// Set up connection to the database.
		include ("verbinding1.php"); 
		$nummer = $_GET['taart'];
		$result = mysql_query("SELECT *	FROM Taarten WHERE Taarten_id='$nummer'");
		
		$row = mysql_fetch_array($result);
		
		// Create table which determines the layout of the pie-info page.
		echo "<table border='0' height='100%' width='100%'>";
		echo "<tr height='180'>";
		echo "<td class = 'center' width='100%-180px'><h1>" . $row['Taartnaam'] . "</h1></td>";
		echo "<td width='180'><img src='images/".$row['Plaatje']."'alt='Taart'	width='180'	height='180'/> </td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td id='langetaartinfo'>" .$row['BeschrijvingTaart']. "</td>";
		?>
		
		<td id="bestellentaartinfo">
		<form action="tijdelijk.php" method="post">
		
		<?php
		// Order pie using the name and pries of the pie.
		echo "<div class = 'center'><h3>" . $row['Taartnaam'] . "</h3>";
		echo "<h4>&euro;" . $row['Prijs'] . "</h4></div>";
		include ("closedb.php");
		?>
			<table width="100%"><tr>
						

						<?php 
							echo "<input type='hidden' name='taartid' value='".$nummer."'>";
			
						?>
						

			<!-- These are the options for the amount of candles on the pie and the amount of pies. -->
			<td width="50">Kaarsjes:</td>
					<td><select name="kaarsjes">
						<option value="0">0</option>
						<option value="5">5</option>
						<option value="10">10</option>
						<option value="15">15</option>
						<option value="20">20</option>
						<option value="25">25</option>
						<option value="30">30</option>
						<option value="35">35</option>
						<option value="40">40</option>
						<option value="45">45</option>
						<option value="50">50</option>
						</select></td></tr>
						<tr><td colspan="2">
						<i> <font size="1">(worden apart bijgeleverd)</font></i>
						</td></tr></table>
			
			Tekst:<br />
				<textarea 	type="text" name="Tekst" cols="13" rows="3"
							maxlength="32" onkeyup="return ismaxlength(this)"
							onfocus="if(this.value == 'Wat voor tekst wilt u erop? (max 32)') {this.value = '';}">Wat voor tekst wilt u erop? (max 32)</textarea><br />
							
							<table width="100%"><tr>
							<td>Aantal:</td>
							<td>
							<select name="aantal">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							</td>
							</select></tr>
							
			
			
			<div class='center'><input type="submit" name="<?php $row['Taarten_id'] ?>"></div>

</form>
			
		</td>			
	</tr>
</table> 
</div>
</div>
</div>
</body>

</html>
