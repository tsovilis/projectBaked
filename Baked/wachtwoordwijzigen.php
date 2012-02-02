<?php

session_start();

include ("verbinding1.php"); 

$email = $_POST['email'];

function genRandomString() {
    $length = 10;
    $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
    $string = "";    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string;
}

$newpassword = genRandomString();
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'From: Baked! <noreply@baked.nl>';

mail($email,"WachtwoordBaked",$newpassword,$headers);


$wachtwoord = MD5($newpassword);

$sql=("	UPDATE Account 
	SET Wachtwoord	= '$wachtwoord'
	WHERE Emailadres = '$email'");

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

// After updating you get redirected to accountBaked.php

header	("Location: wwgelukt.php");


include ("closedb.php");
?>
