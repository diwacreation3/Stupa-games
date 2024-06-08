<?php
// database creadentials.

define('Server', 'localhost');
define('username', 'root');
define('password', '');
$Db_name = "game_db";

// please don't change table name for god sake
$user_table = "users";
$gamedetail_table = "gamedetail";

// Attempt to connect to Mysql database
$mysqli = new mysqli(Server, username,password,$Db_name);

// // Create database if it doesn't exist
// $sql = "CREATE DATABASE IF NOT EXISTS $Db_name";
// if ($mysqli->query($sql) === TRUE) {
//     echo "database created";
// } else {
//     echo "Error creating database: " . $mysqli->error;
// }




// // Select the database
// $mysqli->select_db($Db_name);

// // create user table if it dosen't exist
// $user_sql = "CREATE TABLE IF NOT EXISTS $user_table (
//     `id` int(11) NOT NULL,
//     `email` varchar(255) NOT NULL,
//     `username` varchar(255) NOT NULL,
//     `password` varchar(255) NOT NULL,
//     `created_on` datetime NOT NULL DEFAULT current_timestamp()
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

// if ($mysqli->query($user_sql) === TRUE) {
//     echo "Table created successfully or already exists.<br>";
// } else {
//     echo "Error creating table: " . $mysqli->error;
// }

// $game_detail_sql = " CREATE TABLE IF NOT EXISTS $gamedetail_table (
//   `game_id` int(11) NOT NULL,
//   `game_name` varchar(255) NOT NULL,
//   `game_desc` longtext NOT NULL,
//   `platform` varchar(255) NOT NULL,
//   `uploaded_on` date NOT NULL DEFAULT current_timestamp(),
//   `username` varchar(255) NOT NULL,
//   `downloads` int(11) NOT NULL,
//   `binary_name` varchar(255) NOT NULL,
//   `binary_path` varchar(255) NOT NULL,
//   `banner_name` varchar(255) NOT NULL,
//   `banner_path` varchar(255) NOT NULL
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
// ";

// if ($mysqli->query($game_detail_sql) === TRUE) {
//     echo "Table created successfully or already exists.<br>";
// } else {
//     echo "Error creating table: " . $mysqli->error;
// }


// Check connection
if($mysqli == false){
    die("Error: Could not connect. " .  $mysqli->connect_error);
}
?>