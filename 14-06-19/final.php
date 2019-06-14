<?php
// final unterbindet weitere kindsklassen
final class Auto {
	private $kraftstoff = "Benzin";

}

//gibt Fatal error 
class Sportwagen extends Auto {

}
$porsche = new Sportwagenl;

?>