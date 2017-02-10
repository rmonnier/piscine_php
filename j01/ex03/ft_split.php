<?php

function ft_split($str)
{
	$output = preg_split("/[ ]+/", $str, 0, PREG_SPLIT_NO_EMPTY);
	sort($output);
	return ($output);
}

?>
