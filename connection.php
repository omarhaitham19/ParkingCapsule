<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parking";

$con= mysqli_connect($servername,$username,$password,$dbname);

if(!$con){
    die ("failed due to : " . $con->connect_error );
}

?>