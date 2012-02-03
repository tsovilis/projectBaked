<?php
// Set up connection to database.
include ("verbinding1.php");

// Select e-mailaddresses from database of those who chose to receive the newsletter.
$mailadres = mysql_query("SELECT Emailadres FROM Account WHERE Account.Nieuwsbrief = 1");

$bericht = $_POST["Nieuwsbrieftekst"];

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'From: Baked! <noreply@baked.nl>';

while($row = mysql_fetch_array($mailadres))
{
// Mail the newsletter to every person in the list that was provided by the database.
$maillijst = $row['Emailadres'];
mail($maillijst,$_POST["Titel"],$bericht,$headers);
}

// Close connection to database.
include ("closedb.php");

header	("Location: adminBaked.php");

?>