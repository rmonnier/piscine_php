#!/usr/bin/php
<?php

while (42)
{
	echo "Entrez un nombre: ";
	$line = trim(fgets(STDIN));

	if (feof(STDIN))
		exit();
	if (is_numeric($line))
	{
		if ($line % 2 == 0)
			printf ("Le chiffre %d est Pair\n", $line);
		else if ($line % 2 == 1 || $line % 2 == -1)
			printf ("Le chiffre %d est Impair\n", $line);
	}
	else
	{
		echo "'".$line."' n'est pas un chiffre\n";
	}
}
?>
