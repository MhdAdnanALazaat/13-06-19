<?php
//seit php7
$anonym = new class {
	public $eingenschagt = "rot";
	function faerben(){


	
	echo 	$this->eingenschagt . " bemlen";
}
};
echo $anonym->eingenschagt;
$anonym->faerben();


?> 