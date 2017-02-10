#!/usr/bin/php
<?php

if ($argc == 2)
{
	$array = preg_split("/[ ]+/", $argv[1], 0, PREG_SPLIT_NO_EMPTY);
	$output = implode(" ", $array);
	echo $output."\n";
}

?>
