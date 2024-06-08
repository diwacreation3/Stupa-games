<?php
// Function to check if the database exists
function checkDatabaseExists($dbHost, $dbUser, $dbPassword, $dbName) {
    // Create connection
    $conn = new mysqli($dbHost, $dbUser, $dbPassword);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the database exists
    $result = $conn->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbName'");

    // Close connection
    $conn->close();

    // Return true if the database exists, false otherwise
    return $result->num_rows > 0;
}

// Define database connection parameters
$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "game_db";

// Check if the database exists
if (!checkDatabaseExists($dbHost, $dbUser, $dbPassword, $dbName)) {
    // Database does not exist, redirect to setup screen
    header("Location:  setup/setup-ui.php");
    exit();
}
?>