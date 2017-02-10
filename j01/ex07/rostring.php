#!/usr/bin/php
<?php

if ($argc <= 1)
	exit();

$array = preg_split("/[ ]+/", $argv[1], 0, PREG_SPLIT_NO_EMPTY);

$len = count($array);

if ($len == 0)
{
	echo "\n";
	exit();
}

$array[$len] = $array[0];
unset($array[0]);
array_values($array);

$output = implode(" ", $array);

echo $output."\n";

?>
