<?php
// Set up connection to database.
include ("verbinding1.php"); 

// Decide whether file is an image of a specific size or smaller.
if ((($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 20000000))
  {
  // Decide whether a file is too big or wrong format.
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  //Otherwise allow upload.
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
	
	//If file already exists, inform the administrator.
    if (file_exists("images/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "/images/" . $_FILES["file"]["name"];
      }
    }
  }
// If file is too big or wrong format, inform administrator that it is an invalid file.
else
  {
  echo "Invalid file";
  }

$bestand = $_FILES["file"]["name"];

// Post other values of the pie (which are not pictures) in the database.
$sql="INSERT INTO Taarten (Taartnaam, Taartsoort, KorteInfoTaart, BeschrijvingTaart, Prijs, Plaatje) 
		VALUES		
		('$_POST[Taartnaam]','$_POST[Taartsoort]','$_POST[KorteInfoTaart]','$_POST[BeschrijvingTaart]','$_POST[Prijs]', '$bestand')";

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }

// Close connection to database.
include ("closedb.php");
// Redirect to Administrator page.
header	("Location: adminBaked.php");

?>
