<?php
// database creadentials.

$dbHost = "localhost";
$dbUser = "root";
$dbPassword ="";
$dbName ="game_db";

// Attempt to connect to Mysql database
$mysqli = new mysqli($dbHost, $dbUser,$dbPassword,$dbName);

// Check connection
if($mysqli == false){
    die("Error: Could not connect. " .  $mysqli->connect_error);
}
?>