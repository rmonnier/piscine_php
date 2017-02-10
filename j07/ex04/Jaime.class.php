<?php

include_once('Lannister.class.php');

class Jaime extends Lannister {
	public function sleepWith( $other ) {
		if (get_parent_class($other) === 'Lannister')
		{
			if ($other instanceof Cersei)
				print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
			else
				print("Not even if I'm drunk !" . PHP_EOL);
		}
		else
			print("Let's do this." . PHP_EOL);
	}
}

?>
