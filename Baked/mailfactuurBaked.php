<?php

$to  = $_POST['emailontvanger'];

// subject
$subject = 'Baked Factuur';
$messagebody = $_POST['factuurmailen'];

$message = '<html> <head> <title>Baked Factuur</title> </head> <body>';
$message .= "$messagebody";
$message .= '<a href="websec.science.uva.nl/~rfdv/welcomeBaked.html">Naar de website</a> </body> </html> ';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset="UTF-8"' . "\r\n";

// Additional header
$headers .=	'To: ';
$headers .= $_POST['naam'];
$headers .= 'To: <>' . "\r\n";
$headers .= 'From: Baked Taartenbedrijf <Bakedtaart@gmail.com>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);

print " <a href='adminBaked.php'> Klik hier om terug te gaan naar de site </a> <br/>";
print "De factuur is verzonden: <br /> <br />";
print "$message";

?>