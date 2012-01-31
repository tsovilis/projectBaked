<?php

include("verbinding1.php");


# catch index error
# error_reporting(E_ALL ^ E_NOTICE);

if(isset($_SESSION['email'])){
	echo('<a href="accountBaked.php">Account</a><br />');
	echo('<a href="winkelwagen.php">Winkelwagen</a><br />');
	echo('<a href="logout.php">Uitloggen</a><br />');
	if($_SESSION['email']=='Admin')
	{
		echo "<div style='height:10px'></div>
        <div class='lijntje'></div>
        <div style='height:10px'></div>

		<strong>Administrator opties</strong>
		<br /><br />
		<a href='adminBaked.php'>De bestellingen lijst</a> <br />
		<a href='admintaarttoevoegenBaked.php'>Taarten toevoegen</a>";
	} 
}

else{
	if(!isset($_POST['email']))
	{
	//If not isset -> set with dumy value
	$_POST['email'] = "undefine"; 
	}
	if(!isset($_POST['wachtwoord']))
	{
	$_POST['wachtwoord'] = "undefine";
	}
	
	$email = $_POST["email"];
	$wachtwoord = MD5($_POST["wachtwoord"]);
	$result = mysql_query( "SELECT *
						FROM Account
						WHERE Emailadres = '$email'
						AND Wachtwoord = '$wachtwoord'");

	$pw = mysql_fetch_array($result);
	
	
    if (!$pw) {
		print('U bent nog niet ingelogd.<br />');

	}

	else {
		print('Login gelukt!<br />Klik <a href="accountBaked.php">hier</a> om verder te gaan.<br />');
		session_start();
		$_SESSION['email'] = $email;
<<<<<<< HEAD
	

		if($_SESSION['email'] == 'Admin')
			{
			header("location:adminBaked.php");
			}

		else 
			{
			header("location:accountBaked.php");
			}
	      }
=======
		
		if($email=='Admin')
		header("location:adminBaked.php");
		else	
		header("location:winkelwagen.php");
	}
>>>>>>> f69c9c8065fcb18bb11c58a73287e8869314a96c
	
	include("closedb.php");

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
<table border='0'>
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


?>
