<?php
class Auto { // final bei Methoden verbietet Uberschreibung
	public function anstarten(){
		echo "Wrummm";
	}
}
class Sportwagen extends Auto {
	public function anstarten() {
		echo "Wrummm";
	}
}

$porsche = new Sportwagen;
$porsche->anstarten();
?>