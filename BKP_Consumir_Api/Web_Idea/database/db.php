<?php
session_start();

/* CONEXION PARA MySQL */
$serverName="localhost";
$username="webidea";
$password="ApiWebIdea2021";
#$username="root";
#$password="";
$dbname="web_idea";
$usertable="actividadInscripciones";
//$yourfield = "your_field";

$conn = mysqli_connect($serverName, $username, $password, $dbname);
//mysqli_select_db($dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
//mysqli_close($conn);

?>
