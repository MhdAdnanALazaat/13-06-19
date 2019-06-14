<?php

class Meidung {
	public function ausgebe(){
		echo "Schlagzeile Meidung 123";
	}
}

class Nachichten {
	public $ansage;
	public  function __construct() {
		$this->ansage=new Meidung();
	}
}

$nachricht1 =new Nachichten();
$nachricht1->ansage->ausgebe();