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

		<div style="height:10px"></div>
        <div class="lijntje"></div>
        <div style="height:10px"></div>

		<strong>Administrator opties</strong>
<br /><br />
<a href="adminBaked.php">De bestellingen lijst</a> <br />
<a href="admintaarttoevoegenBaked.php">Taarten toevoegen</a>


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

<form action="uploaden.php" method="post" enctype="multipart/form-data">

	<tr>
	<td> Naam voor de taart: </td> <td> <input type="text" name="Taartnaam" /> </td>
	</tr>

	<tr>
	<td>Soort taart:</td> <td> <select name="Taartsoort">
							<option value="2">fruittaart</option>
							<option value="3">slagroomtaart</option>
							<option value="1">chocoladetaart</option>
							<option value="4">combitaart</option>
							</select></td>
	</tr>

	<tr>
	<td>Korte beschrijving:</td> <td> <textarea 	type="text" name="KorteInfoTaart" cols="56" rows="3"
						maxlength="168" onkeyup="return ismaxlength(this)"
						onfocus="if(this.value == 'Hier een korte beschrijving van de taart.(max 168)') {this.value = '';}">Hier een korte beschrijving van de taart.(max 168)</textarea> </td>
	</tr>

	<tr>
	<td>Uit gebreide beschrijving:</td> <td> <textarea 	type="text" name="BeschrijvingTaart" cols="56" rows="12"
						maxlength="672" onkeyup="return ismaxlength(this)"
						onfocus="if(this.value == 'Hier een uitgebreide beschrijving van de taart. (max 672)') {this.value = '';}">Hier een uitgebreide beschrijving van de taart. (max 672)</textarea></td>
	</tr>

	<tr>
	<td> Prijs: </td> <td> <input type="text" name="Prijs" /></td>
	</tr>

	<tr>
		<td>	
			<label for="file">Filename:</label>
			<td><input type="file" name="file" id="file" /></td> 
			<br />
			
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
