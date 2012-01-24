

<?php
include ("verbinding1.php"); 

$sql="INSERT INTO Plaatjestaarten

Taartnaam,Taartsoort,KorteInfoTaart,BeschrijvingTaart,Prijs,Plaatje) 
VALUES		
('$_POST[Taartnaam]','$_POST[Taartsoort]','$_POST[KorteInfoTaart]','$_POST[BeschrijvingTaart]','$_POST[Prijs]','$_POST[Plaatje]')"; 

if ((($_FILES["Plaatje"]["type"] == "image/gif")
|| ($_FILES["Plaatje"]["type"] == "image/jpeg")
|| ($_FILES["Plaatje"]["type"] == "image/pjpeg"))
&& ($_FILES["Plaatje"]["size"] < 40000))
  {
  if ($_FILES["Plaatje"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["Plaatje"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["Plaatje"]["name"] . "<br />";
    echo "Type: " . $_FILES["Plaatje"]["type"] . "<br />";
    echo "Size: " . ($_FILES["Plaatje"]["size"] / 1024) . " Kb<br />";
    echo "Temp Plaatje: " . $_FILES["Plaatje"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["Plaatje"]["name"]))
      {
      echo $_FILES["Plaatje"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["Plaatje"]["tmp_name"],
      "upload/" . $_FILES["Plaatje"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["Plaatje"]["name"];
      }
    }
  }
else
  {
  echo "Invalid Plaatje";
  }
  include ("closedb.php");
?> 