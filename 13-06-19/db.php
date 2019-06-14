<?php
$dbHost = "localhost";
$dbName = "vemap01";
$dbCharset = "utf8";
$dbUser = "vemap";
$dbPw = "Vemap1234=";

try{

	$db=new PDO(

		"mysql:host=$dbHost;dbname=$dbName;charest=$dbCharset",
		"$dbUser",
		"$dbPw"

	);

}catch (PDOException $e){
	die ("keine verbindung");
}

?>