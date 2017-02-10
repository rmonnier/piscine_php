#!/usr/bin/php
<?php

$tab = file("data.csv");

var_dump($tab);

//file_get_contents();

$fd = fopen("data.csv", "r");

while ($line = fgets($fd))
{
	echo "$line";
}

fclose($fd);

//$tab = fgetcsv($fd, 0, ";");

?>
