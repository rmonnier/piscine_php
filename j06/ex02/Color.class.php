<?php

class Color {

	public $red;
	public $green;
	public $blue;
	public static $verbose = false;

	public function setRed( $red ) { $this->red = $red; return; }
	public function setGreen( $green ) { $this->green = $green; return; }
	public function setBlue( $blue ) { $this->blue = $blue; return; }

	public function getRed() { return $this->red; }
	public function getGreen() { return $this->green; }
	public function getBlue() { return $this->blue; }

	public function __construct( array $kwargs ) {

		if (array_key_exists( 'rgb', $kwargs ) ) {
			$rgb = intval($kwargs['rgb']);
			$this->setRed(($rgb & 0xff0000) >> 16);
			$this->setGreen(($rgb & 0xff00) >> 8);
			$this->setBlue(($rgb & 0xff));
		}
		else if (array_key_exists( 'red', $kwargs ) &&
					array_key_exists( 'green', $kwargs ) &&
					array_key_exists( 'blue', $kwargs )) {
			$this->setRed(intval($kwargs['red']));
			$this->setGreen(intval($kwargs['green']));
			$this->setBlue(intval($kwargs['blue']));
		}
		else {
			print( 'Invalid constructor params' . PHP_EOL);
		}
		if (self::$verbose == true)
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->getRed(), $this->getGreen(), $this->getBlue());
		return;
	}

	public function __destruct() {
		if (self::$verbose == true)
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->getRed(), $this->getGreen(), $this->getBlue());
		return;
	}

	public function __toString() {
		$s = sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->getRed(), $this->getGreen(), $this->getBlue());
		return $s;
	}

	public static function doc() {
		$doc = file_get_contents("Color.doc.txt");
		return $doc;
	}

	public function add( Color $toAdd ) {
		$params = array( 'red' => $this->getRed() + $toAdd->getRed(),
							'green' => $this->getGreen() + $toAdd->getGreen(),
							 'blue' => $this->getBlue() + $toAdd->getBlue() );
		$output = new Color ( $params );
		return $output;
	}

	public function sub( Color $toSub ) {
		$params = array( 'red' => $this->getRed() - $toSub->getRed(),
							'green' => $this->getGreen() - $toSub->getGreen(),
							'blue' => $this->getBlue() - $toSub->getBlue() );
		$output = new Color ( $params );
		return $output;
	}

	public function mult( $toMult ) {
		$params = array( 'red' => $this->getRed() * $toMult,
							'green' => $this->getGreen() * $toMult,
							'blue' => $this->getBlue() * $toMult);
		$output = new Color ( $params );
		return $output;
	}

}

?>
