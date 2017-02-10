<?php

date_default_timezone_set(UTC);
ini_set('display_errors', 1);

include_once('Spaceship.class.php');
include_once('Map.class.php');

class ImperatorDeus extends Spaceship {
	public function __construct() {
		Spaceship::__construct("ImperatorDeus", array(4, 4), 10, 15, 15, 0, 0);
	}
}

class HonorableDuty extends Spaceship {
	public function __construct() {
		Spaceship::__construct("ImperatorDeus", array(1, 4), 5, 10, 15, 0, 0);
	}
}

Spaceship::$verbose = True;
Map::$verbose = True;
$ship = new ImperatorDeus();
$ship2 = new HonorableDuty();
$size_map = array(15,10);
$map = new Map($size_map);
$map->putSpaceship($ship, 2, 3);
//$map->putSpaceship($ship2, 2, 5);
while (42)
{
	print $map;
	print PHP_EOL;
	echo "Maintenant, de combien de cases doit-on avancer en latitude mon général ?";
	$line = trim(fgets(STDIN));
	if (is_numeric($line))
	{
		$x = $line;
	}
	else
	{
		echo "Je n'ai pas compris les ordres mon général !\n";
	}
	echo "Et en longitude ?";
	$line = trim(fgets(STDIN));
	if (is_numeric($line))
	{
		$y = $line;
		$map->moveSpaceship($x, $y, $ship);
	}
	else
	{
		echo "Je n'ai pas compris les ordres mon général !\n";
	}
	echo "Aux ordres mon général, nous effectuons les calculs, puis la manoeuvre !" . PHP_EOL;
}

/*
print($tyrion->getSize() . PHP_EOL);
print($tyrion->houseMotto() . PHP_EOL);

*/
?>
