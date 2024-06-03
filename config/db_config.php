<?php
// database creadentials.

define('Server', 'localhost');
define('username', 'root');
define('password', '');
define('Db_name', 'game_db');

// Attempt to connect to Mysql database
$mysqli = new mysqli(Server, username,password,Db_name);

// Check connection
if($mysqli == false){
    die("Error: Could not connect. " .  $mysqli->connect_error);
}
?>