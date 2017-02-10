#!/usr/bin/php
<?php

if ($argc <= 1)
	exit();

$fd = fopen($argv[1], "r");

if ($fd === FALSE)
	exit();

$tab = array();

function callback_fun($matches)
{
	$output = preg_replace_callback('/title="(.*)"/', function ($var){ return 'title="'. strtoupper($var[1]) . '"';}, $matches[0]);
	$output = preg_replace_callback('/>(.*?)</', function ($var){ return '>'. strtoupper($var[1]) . '<';}, $output);
	return ($output);
}

while ($line = fgets($fd))
{
	$tab[] = preg_replace_callback("/<a.*a>/", "callback_fun", $line);
}

foreach ($tab as $elem)
	echo $elem;

?>
