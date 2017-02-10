<?php

session_start();

if (!(strlen($_SESSION['loggued_on_user']) <= 0))
	echo $_SESSION['loggued_on_user'] . "\n";
else
	echo "ERROR\n";

?>
