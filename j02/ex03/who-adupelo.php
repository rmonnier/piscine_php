#!/usr/bin/php
<?php
function compare($a, $b)
{
	return (strcmp($a['tty'], $b['tty'])); # trie du tab de tab en ft de la clef 'tty'
}

$tab = [];
$bin = file_get_contents("/var/run/utmpx", "r", NULL, 1256);
$len = strlen($bin);
while ($len >= 0)
{
	$tab[] = unpack("a256usr/a4id/a32tty/ipid/iday/itime_s", substr($bin, $len));
	$len -= 628;
}
usort($tab, "compare");
date_default_timezone_set('Europe/Paris');
foreach ($tab as $elem)
{
	$format = "%b %e %H:%M";
	if ($elem['type'] === 8)
	{
		echo preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $elem['usr'])." ".preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $elem['tty'])."  ".strftime($format, $elem['time_s'])." \n";
	}
}
?>
