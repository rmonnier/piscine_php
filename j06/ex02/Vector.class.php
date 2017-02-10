<?php

require_once 'Vertex.class.php';

class Vector {

	public static $verbose = false;
	private $_x;
	private $_y;
	private $_z;
	private $_w = 0.0;

	public function getX() { return $this->_x; }
	public function getY() { return $this->_y; }
	public function getZ() { return $this->_z; }
	public function getW() { return $this->_w; }

	private function setX( $x ) { $this->_x = $x; return; }
	private function setY( $y ) { $this->_y = $y; return; }
	private function setZ( $z ) { $this->_z = $z; return; }

	public function __construct( array $kwargs ) {

		if ( !array_key_exists( 'dest', $kwargs ) ) {
			print( "Invalid constructor params: no 'dest'" . PHP_EOL);
		}
		else {
			$dest = $kwargs['dest'];
			if (!array_key_exists( 'orig', $kwargs)) {
				$orig = new Vertex( array( 'x' => 0, 'y' => 0, 'z' => 0 ) );
			}
			else {
				$orig = $kwargs['orig'];
			}
			$this->setX($dest->getX() - $orig->getX());
			$this->setY($dest->getY() - $orig->getY());
			$this->setZ($dest->getZ() - $orig->getZ());
		}
		if (self::$verbose == true)
			printf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) constructed\n", $this->getX(), $this->getY(), $this->getZ(), $this->getW());
		return;
	}

	public function __destruct() {
		if (self::$verbose == true)
			printf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) destructed\n", $this->getX(), $this->getY(), $this->getZ(), $this->getW());
		return;
	}

	public function __toString() {
		if (self::$verbose == true)
			$s = sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->getX(), $this->getY(), $this->getZ(), $this->getW());
		return $s;
	}

	public static function doc() {
		$doc = file_get_contents("Vector.doc.txt");
		return $doc;
	}

	public function magnitude() {
		return (sqrt( $this->getX() * $this->getX() + $this->getY() * $this->getY() + $this->getZ() * $this->getZ() ) );
	}

	public function normalize()
{
	$norme = $this->magnitude();
	return (new Vector(['dest' => new Vertex(['x' => $this->getX() / $norme, 'y' => $this->getY() / $norme, 'z' => $this->getZ() / $norme])]));
}

	public function add( Vector $rhs ) {
		$x = $this->getX() + $rhs->getX();
		$y = $this->getY() + $rhs->getY();
		$z = $this->getZ() + $rhs->getZ();
		$vertex = new Vertex( array( 'x' => $x, 'y' => $y, 'z' => $z, 'w' => 0 ) );
		return (new Vector(array('dest' => $vertex)));
	}

	public function sub ( Vector $rhs)
	{
		$x = $this->getX() - $rhs->getX();
		$y = $this->getY() - $rhs->getY();
		$z = $this->getZ() - $rhs->getZ();
		$vertex = new Vertex( array( 'x' => $x, 'y' => $y, 'z' => $z, 'w' => 0 ) );
		return (new Vector(array('dest' => $vertex)));
	}

}

?>
