<?php

session_start();

include("./auth.php");

if (auth($_POST['login'], $_POST['passwd']))
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
	echo "<html><body>\n";
	echo "<iframe name='chat' src='chat.php' width='100%' height='550px'></iframe>\n";
	echo "<iframe name='speak' src='speak.php' width='100%' height='50px'></iframe>\n";
	echo "</body></html>\n";
}
else
{
	$_SESSION['loggued_on_user'] = "";
	echo "ERROR\n";
}

?>
