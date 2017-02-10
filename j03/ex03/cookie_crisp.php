<?php

if ($_GET['action'] == 'set' && $_GET['name'] != "")
{
	setcookie($_GET['name'], $_GET['value'], time() + 365*24*3600);
}

else if ($_GET['action'] == 'get' && $_GET['name'] != "")
{
	if (isset($_COOKIE[$_GET['name']]))
		echo $_COOKIE[$_GET['name']] . "\n";
}

else if ($_GET['action'] == 'del' && $_GET['name'] != "")
{
	setcookie($_GET['name'], '', time() - 3600);
}

?>
