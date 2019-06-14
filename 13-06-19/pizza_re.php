 <?php
require_once("db.php");
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <title><?php echo "php-kurs"; ?></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      
  <!--Schriften von Google-->
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!--eigener Stylesheet-->
  <link href="css/mystyle.css" rel="stylesheet" type="text/css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="awesome-bootstrap-checkbox.css"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo "Aufgabe Pizza"   ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style>
   
  </style>
</head>
<body>
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
     </div>
          <div class="card-body">
  <h5 class="card-title text-center">Register</h5>
       <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-label-group">
                <input type="text" name="name"  id="inputUserame" class="form-control">
                 <label for="inputUserame"> Ihr Name :</label>
                </div>
                <div class="form-label-group">
                <input type="text" name="email" id="inputEmail" class="form-control" >
                <label for="inputEmail">email : </label>
                </div>
                 <div class="form-label-group">
                <input type="password" name="password"  id="inputPassword" class="form-control">
                <label for="inputPassword"> Password :</label>
              </div>
                <div class="form-label-group">
                 <input type="password" name="wiederholen" id="inputConfirmPassword" class="form-control">
                 <label for="inputConfirmPassword">Password wiederholen :</label>
                </div>
                <div class="checkbox checkbox-inline checkbox-primary checkbox-sm">
                  <input type="checkbox" name="agb" class="styled" id="inlineCheckbox2sm" value="agb" class="btn btn-info">
                  <label for="inlineCheckbox2sm">  ich stimme AGB zu </label>
                    </div>
                
                     <input  type="submit" name="absenden" value="absenden"  class="btn btn-lg btn-primary btn-block text-uppercase">
                   
                <br>
                 <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="Pizza_login.php" class="btn btn-default btn-lg"><i class="fa fa-sign-in"></i> <span class="network-name">Log-in</span></a>
                            </li>
                            <li>
                               
                        </ul>
                <hr>
                
           

            
    <?php
            if( isset($_POST["absenden"]) ){
            $name=$_POST["name"];
            $email=$_POST["email"];
            $pass=$_POST["password"];
            $wiederholen=$_POST["wiederholen"];
            $fehler=false;


                //Prüfen AGB
                if(!isset($_POST["agb"]))
                {   $fehler=true;
                    $agbfehler= "Sie müssen den AGB zustimmen <br>\n"; 
                }else $agbfehler=null;
                    
                #--------------------------------------------------------------------

                //Prüfen Name
                if (empty($_POST["name"])) {
                    $fehler=true;
                    $namefehler= "Bitte Ihre Name einfügen !<br>\n";
                }else{ $namefehler=null; } 

                #---------------------------------------------------------------------
                //Prüfen Email
                if (empty($_POST["email"])) {
                    $fehler=true;
                    $emailfehler="Bitte Ihre Email einfügen !<br>\n";
                }
                elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $fehler=true;
                    $emailfehler= "Keine gültige email !<br>\n"; 
                }else $emailfehler=null;

                #---------------------------------------------------------------------
                //Prüfen on Email schon existiert

                $sql="SELECT * FROM user WHERE userEmail=:email";
                $stmt=$db->prepare($sql);
                $stmt->bindparam(":email",$email);
                $stmt->execute();
                $row=$stmt->fetch();

                //wenn etwas gefunden wurde
                if($row !== false){
                        $fehler=true;
                        $emailfehler .= " <br>\n ";
                }

                #----------------------------------------------------------------------
                //Prüfen Password

                if (empty($_POST["password"])) {
                    $fehler=true;
                    $passfehler= "Bitte Ihr Password einfügen !<br>\n";
                }
                 elseif (strlen($pass) <= 8) {
                    $fehler=true;
                    $passfehler="Ihr Passwort muss mindestens 8 Zeichen enthalten! !<br>\n";
                }
                elseif(!preg_match("#[0-9]+#",$pass)) {
                    $fehler=true;
                    $passfehler= "Ihr Passwort muss mindestens 1 Nummer enthaltet" .$pass. "!<br>\n";
                }
                 elseif(!preg_match("#[A-Z]+#",$pass)) {
                    $fehler=true;
                    $passfehler="Ihr Passwort muss mindestens 1 Großbuchstaben enthaltet! !<br>\n";
                }
                elseif(!preg_match("#[a-z]+#",$pass)) {
                    $fehler=true;
                    $passfehler= "Ihr Passwort muss mindestens 1 Kleinbuchstaben enthaltet! !<br>\n";
                } 
                
                #------------------------------------------------------------------------     

                //Prüfen Passwordwiederholen
                elseif (empty($_POST["wiederholen"])) {
                    $fehler=true;
                    $passfehler= "Bitte fügen Ihr Password noch mal ein !<br>\n";
                }
                elseif ($pass!=$wiederholen){
                    $fehler=true;
                    $passfehler= "nicht gleich ! <br>\n ";
                }else $passfehler=null;
                
                #-----------------------------------------------------------------------

                //Fehler erzeugen
                if($fehler==true){
                    echo $namefehler. $emailfehler. $passfehler .$agbfehler;
                    unset($name);
                    unset($email);
                    unset($pass);
                    unset($wiederholen);

                }else{

                    //wenn keine Probleme gibt

                    $fehler=false;
                    $sql="INSERT INTO user
                    (userName,userEmail,userPassword)
                    VALUES
                    (:name,:email,:pass)
                    ";
                    $stmt=$db->prepare($sql);
                    $stmt->bindparam(":name",$name);
                    $stmt->bindparam(":email",$email);

                    $option=['cost=>10',];
                    $pass=password_hash($pass,PASSWORD_BCRYPT,$option );
                    $stmt->bindparam(":pass",$pass);
                    $stmt->execute();

                    echo "<h1>Gratuliere ".$name." </h1>";
                    } 

                #-----------------------------------------------------------------------

          



  }
        


    ?>
       
 </form>
    </div>
    
    </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>