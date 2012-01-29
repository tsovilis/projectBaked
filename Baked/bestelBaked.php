<?php

include ("verbinding1.php"); 
 session_start();

$email = $_SESSION['email'];

$query1 = mysql_query("SELECT Account_id
		       FROM Account
		       WHERE Emailadres='$email'");

		while($row1 = mysql_fetch_array($query1))
			{
			  $account = $row1['Account_id'];
			}

$sql1 ="INSERT INTO Bestellingen (Account_id) VALUES ('$account')";

if (!mysql_query($sql1,$connection))
  {
  die('Error: ' . mysql_error());
  }

$query3 = mysql_query("SELECT Bestellingen_id
			FROM Bestellingen
			WHERE Account_id='$account'
			ORDER BY Bestellingen_id");

		while($row2 = mysql_fetch_array($query3))
			{
			  $bestel = $row2['Bestellingen_id'];
			}


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

		
		$sql4=("DELETE FROM Winkelwagen WHERE Account_id='$account'");

	    
		if (!mysql_query($sql4,$connection))
  			{
  			die('Error: ' . mysql_error());
  			}




include ("closedb.php");

header	("Location: accountBaked.php");

?>
