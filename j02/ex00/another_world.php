#!/usr/bin/php
<?php

if ($argc <= 1)
	exit();

$subject = $argv[1];
$pattern = array('/[ \t]+/', '/^[ \t]+|[ \t]+$/');
$replace = array(" ", "");

$output = preg_replace($pattern, $replace, $subject);

echo $output."\n";

?>
