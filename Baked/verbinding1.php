<?php
  // Get database connection info from external file.
  $dbconf = simplexml_load_file("mysql_config.xml");
  // If the configuration has value FALSE, an error is given.
  if ($dbconf === FALSE) {
    die("Error parsing XML file");
  }
  // Otherwise connect to database.
  else {
    $connection = mysql_connect($dbconf->mysql_host,
                                $dbconf->mysql_username,
                                $dbconf->mysql_password)
                  or die('Error connecting to mysql server');
    mysql_select_db($dbconf->mysql_database);
  }
?>