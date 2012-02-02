<!-- This php is activated when a user submits his choppingcart -->

<?php

include ("verbinding1.php"); 
 session_start();

// first the email is retrieved out of the session

$email = $_SESSION['email'];

// then a query selects his accountid

$query1 = mysql_query("SELECT Account_id
		       FROM Account
		       WHERE Emailadres='$email'");

// the account id is stored in $account

		while($row1 = mysql_fetch_array($query1))
			{
			  $account = $row1['Account_id'];
			}

// the date is retrieved

$lever = $_POST['besteljaar']. '-' . $_POST['bestelmaand'] . '-' . $_POST['besteldag'];

// query wich inserts account id and date into the database. A unique number is added to this by auto_increment

$sql1 ="INSERT INTO Bestellingen (Account_id, Leverdatum) VALUES ('$account', '$lever')";

if (!mysql_query($sql1,$connection))
  {
  die('Error: ' . mysql_error());
  }

// De right id is stored in $bestel. De right id = the unique number

$query3 = mysql_query("SELECT Bestellingen_id
			FROM Bestellingen
			WHERE Account_id='$account'
			ORDER BY Bestellingen_id");

		while($row2 = mysql_fetch_array($query3))
			{
			  $bestel = $row2['Bestellingen_id'];
			}

// then all the information is stored into the database

$query2 = mysql_query(" SELECT Taarten_id, Aantal, Kaarsjes, Tekst
			FROM Winkelwagen
			WHERE Account_id='$account'");

		while($row3 = mysql_fetch_array($query2))
			{
			$sql2="INSERT INTO TaartBestelling (Taarten_id, Bestellingen_id, Aantal, Kaarsjes, Tekst) 
			VALUES		
			('$row3[Taarten_id]','$bestel','$row3[Aantal]','$row3[Kaarsjes]','$row3[Tekst]')";
			
			if (!mysql_query($sql2,$connection))
  				{
  				die('Error: ' . mysql_error());
  				}


			}

// after ordering your cakes, your chart is empty
		
		$sql4=("DELETE FROM Winkelwagen WHERE Account_id='$account'");

	    
		if (!mysql_query($sql4,$connection))
  			{
  			die('Error: ' . mysql_error());
  			}




include ("closedb.php");

header	("Location: accountBaked.php");

?>
