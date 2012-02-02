<?php
  session_start();
  if(!($_SESSION['email'])){
  header	("Location: registratieBaked.php");
  }
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
		
		<div id="inhoud"> <!-- In the middle is the content of the requested page -->
		
		<?php
		
		// Set up connection to database.
		include ("verbinding1.php");

		// Variable $email is given to the session email.
		$email = $_SESSION['email'];
		
		// The account id is selected which is connected to the email of the user which is logged in.
		$query1 = mysql_query("SELECT Account_id
		       			FROM Account
		       			WHERE Emailadres='$email'");
		
		// The variable $account is given to the value of the Account_id from the database.
		while($row1 = mysql_fetch_array($query1))
			{
			  $account = $row1['Account_id'];
			}
		
		// A query is set up to select specific tables from the database so a shopping cart can be made.
		$q = ("SELECT Winkelwagen.Product_id, Taarten.Taartnaam, Winkelwagen.Kaarsjes, Winkelwagen.Tekst, Winkelwagen.Aantal, Winkelwagen.Prijs
					FROM Winkelwagen
					INNER JOIN Taarten ON Taarten.Taarten_id=Winkelwagen.Taarten_id
					WHERE Account_id='$account'");
		
		// The query is executed in SQL.
		$query = mysql_query($q);
					
				// A table is created with specific titles for the cells/lists.
				print "<table width='590' border='0'>";
				print "	<th width= '80px'> Product  </th> 
						<th width= '35px'> Kaarsjes </th>
						<th width= '80px'> Tekst </th>
						<th width= '35px'> Aantal  </th> 
						<th width= '35px'> Prijs </th> 
						<th width= '40px'> Subtotaal </th>";
				
				// Variable are created which are numbers.
				$subtotaal = 0.0;
				$totaal = 0.0;
				
				// The products are shown in their correct lists.
				while($producten2 = mysql_fetch_array($query))
					{					
					print " <tr><td> ";
					print "{$producten2['Taartnaam']} ";
					print " </td> <td>";
					print "{$producten2['Kaarsjes']} ";
					print " </td> <td>";
					print "{$producten2['Tekst']} ";
					print " </td> <td>";
					print " <center>";
					print "{$producten2['Aantal']} x ";
					print " </td> <td>";
					print " &euro; {$producten2['Prijs']}  ";
					print " </td> <td>";
					
					// The subtotal and total prices are calculated.
					$prijs 	= $producten2['Prijs'];
					$aantal	= $producten2['Aantal'];
					$subtotaal = $prijs * $aantal;
					$totaal	= $totaal + $subtotaal;
					
					// The subtotal and total prices are show
					print " &euro; $subtotaal ";
					print " </td>";
					print " <td width='15' height='15'><a href='verwijderenproduct.php?verwijderen=".$producten2['Product_id'].
						  "'><img src='images/verwijderen.png' width='15' height='15' alt='Dit product verwijderen' titel= 'Dit product verwijderen'/></a>
							</td></tr> ";
					}
				print " </table> ";
				print "<div class='lijntje'> </div> ";
				print "<td><div id='totaal'> <u> Totaal:</u> &euro; $totaal";
				print "<table width='580'><td class='texttop'>";
				print "<a href='winkelwagenlegen.php'> Leeg winkelwagen</a>";
				include ("closedb.php");
				?>

				
				<!-- These are the options for the delivery date of the order. -->
				<div class='lijntje'></div>
<form action="bestelBaked.php" method="post">
<table>
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

					<input
					type="image"
					name="submit"
					src="images/bestellen1.png"
					onmouseover="this.src='images/bestellen2.png'"
					onmouseout="this.src='images/bestellen1.png'"
					/>
</form>

		</div>

</div>
</div>
</body>

</html>
