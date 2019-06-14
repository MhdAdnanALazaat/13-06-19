<?php
session_start();
session_regenerate_id(true);
//Wenn die Session leer ist, dann niemand angemeldet
//Weiterleitung zu Logout und weiter zum Login
if(empty($_SESSION["userID"]) ){
   header("location:db0212_logout.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	 <title><?php echo "php-kurs"; ?></title>
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
       
    <!--Schriften von Google-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--eigener Stylesheet-->
    <link rel="stylesheet" type="text/css" href="s.css">
</head>
<body>
	<?php
  echo "<h1>". "Hallo " . $_SESSION["userName"] . "<h1>". "<br>";
   ?>
   <a class="btn btn-primary" href="index.php">logout</a>
   <a class="btn btn-primary" href="pizzabestellung.php">pizzabestellung</a>
   <a class="btn btn-primary" href="meine_pizzabestellungen.php">meine_pizzabestellungen</a>
   <br>
   <?php
   //Bei entsprachender Berechtigung wird dieser
   // Link angezeigt
   if ($_SESSION["userRole"]>1) {
   	echo "<a class='btn btn-primary' href='admin.php'>Adminbereich</a>";
   }

   ?>
</body>
</html>