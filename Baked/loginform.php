<?php
include("verbinding1.php");
	
	if(isset($_SESSION['Login'])){
	echo('Klik <a href="accountBaked.php\">hier</a> om naar uw account te gaan.<br />');
	echo writeShoppingCart();
	}
	
	else{
	
  if (!empty($_POST['email'])) {    

    $success = false;

    # HTML form and PHP code merged,
    # username and password stored in database,
    # password checked by database:
    # note change in form action: action="{$_SERVER['PHP_SELF']}",
    # form input is escaped,
    # switch to HTTPS connection if necessary,
    # password hashed into db with MD5().

    # Uncomment to quickly insert username/password in db:
    #$q = "INSERT INTO users1 ( username, password ) VALUES " .
    #     "( '{$_POST["username"]}', '" .
    #     MD5($_POST["password"]) . "')";

    $q = 'SELECT 1 FROM Account WHERE ' .
         'Emailadres = "' .  $_POST["email"] . '" AND ' .
         'Wachtwoord = "' .  MD5($_POST["wachtwoord"]) . '"';

    $result = mysql_query($q);
    if (!$result) {
      die("Invalid query: " . mysql_error());
    }
    $pw = mysql_fetch_row($result);

    if ($pw[0] === "1") {
      $success = true;

		if ($success) {
			print('Login gelukt!<br />Klik <a href="accountBaked.php\">hier</a> om verder te gaan.<br />');
			include("closedb.php");
			session_start();
			$_SESSION['Login'] = 'ingelogd';
			header("location:winkelwagen.php");
		}
		
	}
	else
      print('Login incorrect.<br />Klik <a href="' .
            $_SERVER['PHP_SELF'] . '">hier</a> om het opnieuw te proberen.<br />');

    include("closedb.php");
	  }
	  
  else {
    # Switch to SSL connection if necessary.
    # note the two '=' and '@' in the following:
    if (@$_SERVER['HTTPS'] !== 'on')
    {
      # Note: this only works if https is on default port
      $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      header("Location: $redirect", true, 301); // 301: "Moved permanently"
      exit();
    }

	else{

	echo <<<EOT
<html>
<head>
<strong>Login</strong>
</head>
<body>
<table border="0">
	<form method="post" action="{$_SERVER['PHP_SELF']}">
		<tr>
			<td>E-mail</td>
			<td><input type="text" name="email" size="18" value="E-mail"
					onfocus="if(this.value == 'E-mail') {this.value = '';}" /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="wachtwoord" size="18" value="password"
					onfocus="if(this.value == 'password') {this.value = '';}"/></td>
		</tr>
		<tr>
			<td colspan="2">
		<sub>Nog geen account? <a href="registratieBaked.php"> Registreer </a></sub>
		&nbsp;<input type="submit" value="Login" />
		</td>
		</tr>
</table>		
</form>
</body>
</html>
EOT;
	}
}
}

?>