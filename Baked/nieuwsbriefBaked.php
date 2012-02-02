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

<div>
<h4>
Nieuwsbrief
</h4>

<table>
<tr>

<form action="nieuwsbrief.php" method="post" enctype="multipart/form-data">

	
	<tr>
	<!-- Put in the title of the newsletter. -->
	<td>Titel:&nbsp; <input type="text" name="Titel" /> </td>
	</tr>
	
	<tr>
	<!-- Type your newletter here. -->
	<td><textarea 	type="text" name="Nieuwsbrieftekst" cols="56" rows="12"
						maxlength="672" onkeyup="return ismaxlength(this)"
						onfocus="if(this.value == 'Type hier uw nieuwsbrief... (max 672)') {this.value = '';}">Type hier uw nieuwsbrief... (max 672)</textarea>
	</td>
	</tr>

	
	</table>
	<br />
	<br />
		<input type="submit" name="submit" value="Verstuur" />
	
</form>
	
	</div>

	<div>


</div>
		</div>
		
		

		


	</div>
</div>
</body>

</html>
