<?php

function ft_is_sort($tab)
{
	if ($tab == NULL)
		return (1);
	$first = 1;
	foreach ($tab as $elem)
	{
		if ($first == 0)
		{
			if (strcmp($last, $elem) >= 0)
				return (0);
		}
		if ($first == 1)
			$first = 0;
		$last = $elem;
	}
	return (1);
}

?>
