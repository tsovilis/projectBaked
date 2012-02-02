<?php

include("verbinding1.php");

# catch index error
# error_reporting(E_ALL ^ E_NOTICE);

if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
	$sql = mysql_query("SELECT Voornaam FROM Account WHERE Account.Emailadres='$email'");
	$row = mysql_fetch_array($sql);
	$naam = $row['Voornaam'];
	
	echo "<strong>Welkom $naam </strong><br /><br />";
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
		<a href='admintaarttoevoegenBaked.php'>Taarten toevoegen</a> <br/>
		<a href='nieuwsbriefBaked.php'>Nieuwsbrief versturen</a>";
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
		$_SESSION['email'] = $email;

		if($_SESSION['email'] == 'Admin')
		{
		header("location:adminBaked.php");
		}

		if($_SESSION['email'] != 'Admin')
		{
		header("location:accountBaked.php");
		}
	}

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
<strong>Login</strong>
<form method="post" action="{$_SERVER['PHP_SELF']}">
<table border="0">
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
EOT;
	}
}

?>
