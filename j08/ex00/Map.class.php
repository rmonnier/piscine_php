<?php

class Map {
	private $_size;
	private $_map;
	private $_emptySpace = ".";
	public static $verbose = false;

	public function getSize() {
		return $this->_size;
	}

	private function insideMap($i, $j) {
		$xm = $this->getSize()[0];
		$ym = $this->getSize()[1];
		if ($i < 0 || $i >= $xm || $j < 0 || $j >= $ym)
			return (false);
		return (true);
	}

	private function emptySpace($i, $j) {
		$index = $this->getIndex($i, $j);
		if ($this->_map[$index] === $this->_emptySpace)
			return (true);
		else
			return (false);
	}

	private function getIndex( $i, $j )
	{
		if (!($this->insideMap($i, $j)))
		return (-1);
		$xm = $this->getSize()[0];
		return ($j * $xm + $i);
	}

	public function putSpaceship( $ship, $i, $j )
	{
		$height = $ship->getSize()[0];
		$width = $ship->getSize()[1];
		$m = 0;
		while ($m < $height)
		{
			$n = 0;
			while ($n < $width)
			{
				if (!($this->insideMap($i + $m, $j + $n)))
				{
					if (self::$verbose == true)
						print("Spaceship is outside the map." . PHP_EOL);
					return (false);
				}
				if (!($this->emptySpace($i + $m, $j + $n)))
				{
					if (self::$verbose == true)
						print("There is something like a collision out there." . PHP_EOL);
					return (false);
				}
				$positions[] = $this->getIndex($i + $m, $j + $n);
				$n++;
			}
			$m++;
		}
		foreach($positions as $position) {
			$this->_map[$position] = $ship;
		}
	}

	public function moveSpaceship($x, $y, $ship)
	{
		$xm = $this->getSize()[0];
		$new_positions = array();
		foreach($this->_map as $key => $element)
		{
			if ($element === $ship)
			{
				$new_positions[] = $key + $x + $y * $xm;
				$this->_map[$key] = $this->_emptySpace;
			}
		}
		foreach($new_positions as $new_position)
		{
			$this->_map[$new_position] = $ship;
		}

	}

	public function __toString() {
		$j = 0;
		$xm = $this->getSize()[0];
		$ym = $this->getSize()[1];
		$output = "";
		while ($j < $ym)
		{
			$i = 0;
			while ($i < $xm)
			{
				$index = $this->getIndex($i, $j);
				$output = $output . $this->_map[$index] . " ";
				$i++;
			}
			$output = $output . PHP_EOL;
			$j++;
		}
		return $output;
	}

	public function __construct($size) {
		$this->_size = $size;
		$new_map = array();
		$new_map = array_pad($new_map, $this->getSize()[0] * $this->getSize()[1], $this->_emptySpace);
		$this->_map = $new_map;
		if (self::$verbose == true)
			printf("Map( size: %dx%d ) constructed.\n", $this->getSize()[0], $this->getSize()[1]);
	}
}

?>
