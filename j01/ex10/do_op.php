#!/usr/bin/php
<?php

function do_op($m, $n, $op)
{
	if ($op == "+")
		return ($m + $n);
	if ($op == "-")
		return ($m - $n);
	if ($op == "*")
		return ($m * $n);
	if ($op == "/" && $n != 0)
		return ($m / $n);
	if ($op == "%" && $n != 0)
		return ($m % $n);
	return (0);	
}

if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	exit();
}

$m = preg_split("/[ ]+/", $argv[1], 0, PREG_SPLIT_NO_EMPTY);
$op = preg_split("/[ ]+/", $argv[2], 0, PREG_SPLIT_NO_EMPTY);
$n = preg_split("/[ ]+/", $argv[3], 0, PREG_SPLIT_NO_EMPTY);

$result = do_op($m[0], $n[0], $op[0]);

echo $result."\n";

?>
