<?php

include ("verbinding1.php");

$mailadres = mysql_query("SELECT Emailadres FROM Account WHERE Account.Nieuwsbrief = 1");

$bericht = $_POST["Nieuwsbrieftekst"];

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'From: Baked! <noreply@baked.nl>';

while($row = mysql_fetch_array($mailadres))
{
$maillijst = $row['Emailadres'];
mail($maillijst,$_POST["Titel"],$bericht,$headers);
}


include ("closedb.php");

header	("Location: adminBaked.php");

?>