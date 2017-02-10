<?php

include_once('Lannister.class.php');

class Tyrion extends Lannister {
	public function sleepWith( $other ) {
		if (get_parent_class($other) === 'Lannister')
			print("Not even if I'm drunk !" . PHP_EOL);
		else
			print("Let's do this." . PHP_EOL);

	}
}

?>
