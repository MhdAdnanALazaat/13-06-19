<?php
session_start();
session_regenerate_id(true);
// Verbindung zur DB herstellen
require_once("db.php");
if(isset($_POST["senden"])){

   //Wenn Filter sagt ,dass sie nicht false ist,dann ist es OK
   if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)!==false)
   {
       $sql="SELECT * FROM user WHERE userEmail=:email";
       $stmt=$db->prepare($sql);
       $stmt->bindparam(":email",$_POST["email"]);
       $stmt->execute();
       $row=$stmt->fetch();
       
       //Wenn user mit dieser Email existiert
       if($row !== false){
         //Das gepostete Password wird mit dem PW des users abgegleichen
         if(password_verify($_POST["password"], $row["userPassword"]))
         {
           //User erkannt
           //mit session ausgestartet
           $_SESSION["userID"]=$row["userID"];
           $_SESSION["userName"]=$row["userName"];
           $_SESSION["userRole"]=$row["userRole"];
        
           //Mit Header weiterleitun an neue Seite
           header("location:index2.php");


         }else{
          echo "eror";
         }
       }// $row Ende

   }//Filter ENDE

}//Senden Ende

?>
<!DOCTYPE html>
<html>
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
 <link href="css/mystyle.css" rel="stylesheet" type="text/css">
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
    
:root {
  --input-padding-x: 1.5rem;
  --input-padding-y: .75rem;
}

body {
  background: #007bff;
  background: linear-gradient(to right, #0062E6, #33AEFF);
}

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-body {
  padding: 2rem;
}

.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input {
  height: auto;
  border-radius: 2rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 9px;
  color: #777;
}

.btn-google {
  color: white;
  background-color: #ea4335;
}

.btn-facebook {
  color: white;
  background-color: #3b5998;
}
  </style>
</head>
<body>
	<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">log In</h5>
            
            <div class="form-label-group">
	<form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

 	<div class="form-label-group">
         <input type="text" name="email"  id="inputEmail" class="form-control">
          <label for="inputEmail">Email address</label>
           </div>

           <div class="form-label-group">
           <input type="text" name="password"id="inputPassword" class="form-control" >
			<label for="inputPassword">Password</label>
</div>


           <input  type="submit" name="senden" value="senden"  class="btn btn-lg btn-primary btn-block text-uppercase">
                

       
<?php



?>
</form>
</div>

</body>
</html>