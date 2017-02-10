<?php


abstract class Personnage {
	abstract public function foo(); //contrat
}

interface IExemple {
	function foo(); //tout est sous entendu abstrait
}

class Exemple2 implements IExemple {
	public function foo() {
		return ;
	}
}

self::foo();   //lien statique
static::foo(); //llien dynamique

Class Exemple {

	public $att1 = 0;
	public $att2 = 0;
	public $att3 = 0;
	protected $_att4;
	private $_att = 0;
	const CST1 = 1;
	const CST2 = 2;

	public function foo() {
		return ;
	}

	public static $nbInstances = 0;

	public static function doc() {
		return 'This is a sample class with no real purpose.';
	}

	public function getAtt() { return $this->_att; }

	public function setAtt( $v ) { $this->_att = $v; return; }

	public function __get( $att ) {
		print ('Attempt to acces \'' . $att . '\' attribute, this script should die' . PHP_EOL );
		return 'argg';
	}

	public function __set( $att, $value ) {
		print ('Attempt to set \'' . $att . '\' attribute to \'' . $value . '\', this script should die' . PHP_EOL );
		return;
	}
	public function __construct( array $kwargs ) {
		self::$nbInstances++;
		print( 'Constructor called' . PHP_EOL );

		if ( array_key_exists( 'arg1', $kwargs ) )
			$this->att1 = $kwargs['arg1'];
		else
			$this->att1 = -1;

		$this->att2 = $kwargs['arg2'];

		print( '$this->att1: ' . $this->att1 . PHP_EOL );
		print( '$this->att2: ' . $this->att2 . PHP_EOL );
		return ;
	}

	public function __destruct() {
		self::$nbInstances--;
		print( 'Destructor called' . PHP_EOL);
		return ;
	}

	public function __toString() {
		return 'Exemple( $_att = ' . $this->getAtt() . ' )';
	}

	public function __invoke() {
		return ( $this->_att );
	}

	function bar() {
		print( 'Method barr called' . PHP_EOL);
		return ;
	}

	public function __clone() {
		print ( 'Clone called' . PHP_EOL );
		return ;
	}

}

$instance = new Exemple( array( 'arg1' => 53, 'arg2' => 42) );
$instance = new Exemple( array( 'arg1' => 53, 'arg2' => 42) );
print ( Exemple::doc() . PHP_EOL );
print ( Exemple::$nbInstances . PHP_EOL );

?>
