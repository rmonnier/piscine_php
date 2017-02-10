#!/usr/bin/php
<?php

if ($argc <= 1)
	exit();

$subject = $argv[1];

$weekday = '([Ll]undi|[Mm](ardi|ercredi)|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche)';
$day = '([0-2]?\d|3[01])';
$month = '([Jj](anvier|uin|uillet)|[Ff]evrier|[Mm](ars|ai)|[Aa](vril|out)|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre)';
$year = '\d{4}';
$time = '([01]\d|2[0-3])(:[0-5]\d){2}';


$test_format = preg_match("/^$weekday $day $month $year $time$/", $subject);

if ($test_format == 0)
{
	echo "Wrong Format\n";
	exit();
}

$date = preg_replace("/^$weekday /", '', $subject);

$months = array('janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre');

$i = 1;
$months_number = array();
while ($i < 13)
{
	$months_number[] = $i;
	$months[$i - 1] = "/".$months[$i - 1]."/i";
	$i++;
}


$date = preg_replace($months, $months_number, $date);

$format = 'd m Y G:i:s';

$date_obj = date_create_from_format($format, $date);

date_default_timezone_set('Europe/Paris');

$timestamp = strtotime($date_obj->format('Y-m-d H:i:s'));

echo $timestamp."\n";

?>
