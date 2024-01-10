<?php


$server = "localhost";
$user = "root";
$pass = "";
$db = "ziva";


// Create connection
$con = mysqli_connect($server, $user, $pass,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>