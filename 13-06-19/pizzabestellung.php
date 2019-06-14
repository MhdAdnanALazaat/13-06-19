<?php
session_start();
session_regenerate_id(true);
//Wenn die Session leer ist, dann niemand angemeldet
//Weiterleitung zu Logout und weiter zum Login
if(empty($_SESSION["userID"]) ){
   header("index.php");
}

require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title><?php echo "php-kurs"; ?></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        
    <!--Schriften von Google-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--eigener Stylesheet-->
   <link rel="stylesheet" href="__MACOSX/css/aos.css">

    <link rel="stylesheet" href="__MACOSX/css/style.css">
</head>
<body>
        <div class="container-fluid">
        <h1>Pizza Bestelung</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
           <div class="form-group"> 
                 <label for="name">Name</label>
                 <input id="name" name="name" class="form-control" value="<?php echo $_SESSION["userName"]  ?>"> 
            </div>
            <div class="form-group"> 
                <label for="adresse">Adresse</label>
                 <input id="adresse" name="adresse" class="form-control" required> 
            </div>

         <?php
            echo "<br>" ;
            echo "<select name='uhrzeit'>";
            $mins=array(0,15,30,45);
            for($i=8;$i<=19;$i++){
            $stunde=str_pad($i, 2, "0", STR_PAD_LEFT).":";
            foreach($mins as $minute){
                echo "<option>".$stunde.str_pad($minute, 2, "0", STR_PAD_RIGHT)."</option>\n";
            }
        }
            echo "</select>\n";
            echo " Uhrzeit";
            echo "<br>" ;
            echo "<br>" ;

        ?>
        
        <?php
            

            $sql="SELECT * FROM pizza";
            $stmt=$db->query($sql);
            echo "<select class='form-control' name='pizzaart'>\n";
            while(  $row=$stmt->fetch()   ){
                echo "<option value='$row[pizzaID]'>" . $row["pizzaName"] ." ". $row["pizzaPreis"] . " €" ."</option>\n";
            }

            echo "</select>\n";

            
        ?>
            <br>
            <input type="checkbox" name="extra1" value=0.60> Extra Knoblauch (Aufpreis 0.60 € )<br>
            <input type="checkbox" name="extra2" value=1.10> Extra Käse (Aufpreis 1.10 € )<br> <br>
            <button type="submit" class="btn btn-default" name="absenden" >Bestellen</button>
            <button  type="reset" class="btn btn-default"  >Reset</button>
           
        </form>
            <br>
            
     <?php
        

            if(isset($_POST["absenden"])){
                    $userid=$_SESSION["userID"];
                    $pizzaid=$_POST["pizzaart"];
                    $name=$_POST["name"];
                    $adresse=$_POST["adresse"];
                    $uhrzeit=$_POST["uhrzeit"];
                    //das bringt pizzaid die ausgewällt hat von Value des Option
                    
                    
                function extra(&$extra){ 
                    if( isset($_POST["extra1"]) & isset($_POST["extra2"])    ) {
                        $extra=$_POST["extra1"] + $_POST["extra2"];
                        $ex="Mit Extra Käse und Knoblauch"; 
                     }
                    else if(isset($_POST["extra1"])){
                        $extra=$_POST["extra1"];
                        $ex="Mit Extra Knoblauch";
                        }
                        
                    else if(isset($_POST["extra2"])){
                        $extra=$_POST["extra2"];
                        $ex="Mit Extra Käse";
                    }else {
                        $extra=0;
                        $ex="";
                    }

                    return $ex;
                }//Ende Function

                $extraPreis=0;
                $extraText = extra($extraPreis);

                $sql="SELECT * FROM pizza 
                WHERE pizzaID = :pizzaID";
                $stmt= $db->prepare($sql);
                $stmt->bindparam(":pizzaID",$pizzaid);
                $stmt->execute();
                $row=$stmt->fetch();
                $preis =$row["pizzaPreis"] + $extraPreis;
             

                $sql="INSERT INTO pizzabestellung 
                (pbUserFID,pbPizzaFID,pbAdresse,pbUhrzeit,pbExtra,pbPreis)
                VALUES
                (:userid,:pizzaid,:adresse,:uhrzeit,:extraText,:preis)";

                $stmt=$db->prepare($sql);
                $stmt->bindparam(":userid",$userid);
                $stmt->bindparam(":pizzaid",$pizzaid);
                $stmt->bindparam(":adresse",$adresse);
                $stmt->bindparam(":uhrzeit",$uhrzeit);
                $stmt->bindparam(":extraText",$extraText);
                $stmt->bindparam(":preis",$preis);
                $stmt->execute();

  
            
        }
    ?>
       

    </div>
    
    
        
        



   

</body>
</html>