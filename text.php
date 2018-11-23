<?php
include("fx.php");
$a = [1, 1.45, "Pippo", false, true, NULL, [125, 1.6, "Pippo", new Foo()]];
d_var_dump($a);

class Foo{
	public $a;
	private $b;
	protected $c;
	public function __construct(){
		$this->a = "pi";
		$this->b = false;
		$this->c = 1;
	}
}

?>