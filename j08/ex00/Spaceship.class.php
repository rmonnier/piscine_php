<?php

abstract class Spaceship {
	private $_name;
	private $_size;
	private $_PV;
	private $_PP;
	private $_speed;
	private $_shield;
	private $_weapons;
	public static $verbose = false;

	public function getName() {
		return $this->_name;
	}

	public function getSize() {
		return $this->_size;
	}

	public function getPV() {
		return $this->_PV;
	}

	public function getPP() {
		return $this->_PV;
	}

	public function getSpeed() {
		return $this->_speed;
	}

	public function getShield() {
		return $this->_shield;
	}

	public function getWeapons() {
		return $this->_weapons;
	}

	public function __construct($name, $size, $PV, $PP, $speed, $shield, $weapons) {
		$this->_name = $name;
		$this->_size = $size;
		$this->_PV = $PV;
		$this->_PP = $PP;
		$this->_speed = $speed;
		$this->_shield = $shield;
		$this->_weapons = $weapons;
		if (self::$verbose == true)
			printf("Spaceship( name: %s, size: %dx%d, PV: %d, PP: %d, speed: %d, shield: %d, weapons: %d ) constructed.\n",
			$this->getName(), $this->getSize()[0], $this->getSize()[1], $this->getPV(), $this->getPP(), $this->getSpeed(), $this->getShield(), $this->getWeapons());
	}

	public function __toString(){
		return ("X");
	}
}

?>
