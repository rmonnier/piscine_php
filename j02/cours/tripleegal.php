#!/usr/bin/php
<?php

if ("0" == 0)
	echo "OK\n";
else
	echo "KO\n";

$my_tab = array("zero", "un", "deux");

if (array_search("zero", $my_tab) !== FALSE)
	echo "Found\n";

?>
