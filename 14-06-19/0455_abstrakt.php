<?php
abstract class User {
	public $name;
	public function __construct($name){
		$this->name = $name;
	}
	public function testausgabe(){
		return "ein Test :" . $this->name;
	}
	//durch abstract muss die Methode bei kindelemente implementiert werden
	abstract public function gruss() : string;
}
//$test = new User("Test"); //Fehler wegen abstact 
class Admin extends User {
	public function gruss() : string {
		return "Hallo Admin : " . $this->name;
	}
}
class Kubden extends User {
public function gruss() : string {
		return "Hallo Kubden : " . $this->name;
	}
}

class team extends User {
public function gruss() : string {
		return "Hallo My team : " . $this->name;
	}
}

$adminustrator = new Admin("Markus");
echo $adminustrator->gruss() . "<br>\n";

$kunde = new Kubden("Adnan");
echo $kunde->gruss();
echo "<br>\n";
$teams = new team("Zero");
echo $teams->gruss();
?>