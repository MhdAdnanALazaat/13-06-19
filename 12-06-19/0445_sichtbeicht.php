<?php
// public : zugriff von ausen mogilch
// public : zugriff fur kindsklassen moglich
// protcected : zugriff von ausen nicht moglich
// protcected : zugriff fur kindsklassen moglich
// private :zugriff von ausen nicht moglich
// private : zugriff for ausen moglich
class Auto {
	protected $kraftstoff = "Bezin";

	public function tanken($art){
		$this->kraftstoff=$art;
	}
	public function zeige_kraftstoff(){
		echo $this->kraftstoff;
	}
}

$bmw = new Auto;
$bmw->tanken("Diesel");
$bmw->zeige_kraftstoff();
// Fehler bei private und protected
$bmw->kraftstoff = "Gas";
$bmw->zeige_kraftstoff();

?>