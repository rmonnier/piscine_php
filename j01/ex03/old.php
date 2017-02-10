<?php

function ft_split($str)
{
	$len = strlen($str);
	$i = 0;
	$j = 0;
	$k = 0;
	while ($i < $len)
	{
		while ($str[$i] == ' ')
			$i++;
		$k = 0;
		while ($str[$i] != ' ' && $i < $len)
		{
			$myarray[$j][$k] = $str[$i];
			$i++;
			$k++;
		}
		$j++;
	}
	return ($myarray);
}

?>
