<?php
class Artikel {
   const UST = 20;
   // $preis = 100;

   public function zeige_ust() {
       echo self::UST; // $this->...
   }
   public function zeige_klasse() {
       echo "ist erzeugt aus Klasse ".get_class($this);
   }
}

echo Artikel::UST;
echo " (Konstante) <br>\n";
$hemd = new Artikel();
$hemd->zeige_ust();
echo " ";
$hemd->zeige_klasse();
?>