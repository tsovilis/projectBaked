<?php
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
		$nummer = $_GET['taart'];
		$result = mysql_query("SELECT *	FROM Taarten WHERE Taarten_id='$nummer'");
		
		$row = mysql_fetch_array($result);
		
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
		echo "<div class = 'center'><h3>" . $row['Taartnaam'] . "</h3>";
		echo "<h4>&euro;" . $row['Prijs'] . "</h4></div>";
		include ("closedb.php");
		?>
			<table width="100%"><tr>
						<select name="taartid">
							<?php
	
										  echo "<option value=\"".$_GET['taart']."\">".$_GET['taart']."</option>\n  ";
													
							?>
						</select>
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
				<textarea 	type="text" name="Tekst" cols="13" rows="2"
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
							
			<tr><td colspan="2"> Leverdatum:</td></tr>
					<tr>
					<td width="50"><i>Jaar:</i> </td>
					<td><select name="besteljaar">
					<option value="2012">2012</option>
					<option value="2013">2013</option>
					<option value="2014">2014</option>
					</select></td></tr>
										
					<tr><td><i>Maand:</i></td>
					<td><select name="bestelmaand">
					<option value="01">Januari</option>
					<option value="02">Februari</option>
					<option value="03">Maart</option>
					<option value="04">April</option>
					<option value="05">Mei</option>
					<option value="06">Juni</option>
					<option value="07">Juli</option>
					<option value="08">Augustus</option>
					<option value="09">September</option>
					<option value="10">Oktober</option>
					<option value="11">November</option>
					<option value="12">December</option>
					</select></td></tr>
					
					<tr><td><i>Dag:</i></td>
					<td><select name="besteldag">
					<option value="01">1</option>
					<option value="02">2</option>
					<option value="03">3</option>
					<option value="04">4</option>
					<option value="05">5</option>
					<option value="06">6</option>
					<option value="07">7</option>
					<option value="08">8</option>
					<option value="09">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
					</select></td></tr>
					</table>
			
			
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
