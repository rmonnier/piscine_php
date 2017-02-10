#!/usr/bin/php
<?php

function getimg($url) {
    $headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';
    $headers[] = 'Connection: Keep-Alive';
    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';
    $user_agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)';
    $process = curl_init($url);
    curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($process, CURLOPT_HEADER, 0);
    curl_setopt($process, CURLOPT_USERAGENT, $user_agent);
    curl_setopt($process, CURLOPT_TIMEOUT, 30);
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
    $return = curl_exec($process);
    curl_close($process);
    return $return;
}


$curl = curl_init($argv[1]);
$web_page = file_get_contents($argv[1]);
preg_match_all('/<img.*src=[:graph:]+/', $web_page, $match);
$n = count($match[0]) ;
$i = 0;
while ($i < $n)
{
	$val = substr(strstr($match[0][$i], "src="), 5);
	$vl = str_replace('"', '', $val);
	$vl = str_replace('>', '', $vl);
	if ($vl[0][0] == "/")
		$match[0][$i] = $argv[1] . $vl;
	else
		$match[0][$i] = $vl;
	$i++;
}
$val = $argv[1];
if (substr($argv[1], 0, 7) == "http://")
	$val = substr($argv[1], 7);
if (file_exists($val) == FALSE)
	mkdir($val, 0777, true);
foreach ($match[0] as $key)
{
	$imgurl = $key;
	$imagename= basename($imgurl);
	if (file_exists('./$val/'.$imagename))
	{
		continue;
	}
	$image = getimg($imgurl);
	file_put_contents($val.'/'.$imagename,$image);
}

?>
