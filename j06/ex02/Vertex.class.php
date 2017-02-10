<?php

require_once 'Color.class.php';

class Vertex {

	public static $verbose = false;
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;

	public function getX() { return $this->_x; }
	public function getY() { return $this->_y; }
	public function getZ() { return $this->_z; }
	public function getW() { return $this->_w; }
	public function getColor() { return $this->_color; }

	public function setX( $x ) { $this->_x = $x; return; }
	public function setY( $y ) { $this->_y = $y; return; }
	public function setZ( $z ) { $this->_z = $z; return; }
	public function setW( $w ) { $this->_w = $w; return; }
	public function setColor( $color ) { $this->_color = $color; return; }

	public function __construct( array $kwargs ) {

		if (array_key_exists( 'x', $kwargs ) &&
					array_key_exists( 'y', $kwargs ) &&
					array_key_exists( 'z', $kwargs )) {

			$this->setX($kwargs['x']);
			$this->setY($kwargs['y']);
			$this->setZ($kwargs['z']);
			if (array_key_exists( 'w', $kwargs)) {
				$this->setW($kwargs['w']);
			}
			if (array_key_exists( 'color', $kwargs)) {
				$this->setColor($kwargs['color']);
			}
			else {
				$color = new Color( array('rgb' => 0xFFFFFF) );
				$this->setColor( $color );
			}
		}
		else {
			print( 'Invalid constructor params' . PHP_EOL);
		}
		if (self::$verbose == true)
			printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) constructed\n", $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor());
		return;
	}

	public function __destruct() {
		if (self::$verbose == true)
			printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) destructed\n", $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor());
		return;
	}

	public function __toString() {
		if (self::$verbose == true)
			$s = sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )", $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor());
		else
			$s = sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->getX(), $this->getY(), $this->getZ(), $this->getW() );
		return $s;
	}

	public static function doc() {
		$doc = file_get_contents("Vertex.doc.txt");
		return $doc;
	}

}

?>
