#!/usr/bin/php
<?php

if ($argc <= 1)
	exit();

$i = 1;
while ($i < $argc)
{
	$array = preg_split("/[ ]+/", $argv[$i], 0, PREG_SPLIT_NO_EMPTY);
	foreach ($array as $elem)
	{
		$output[] = $elem;
	}
	$i++;
}

sort($output);

foreach ($output as $elem)
{
	echo $elem."\n";
}

?>
