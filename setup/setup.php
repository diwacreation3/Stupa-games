<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $dbHost = $_POST['dbHost'];
    $dbUser = $_POST['dbUser'];
    $dbPassword = $_POST['dbPassword'];
    $dbName = "game_db";

    // Create connection
    $conn = new mysqli($dbHost, $dbUser, $dbPassword);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create database if it doesn't exist
    $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully or already exists.<br>";
    } else {
        die("Error creating database: " . $conn->error);
    }

    // Select the database
    $conn->select_db($dbName);

    // SQL to create table
    $userSql = "CREATE TABLE IF NOT EXISTS users (
        `id` int(11) NOT NULL,
        `email` varchar(255) NOT NULL,
        `username` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        `created_on` datetime NOT NULL DEFAULT current_timestamp()
    )";

    if ($conn->query($userSql) === TRUE) {
        echo "Table 'users' created successfully or already exists.<br>";
    } else {
        die("Error creating table: " . $conn->error);
    }

    $gameDetail = "CREATE TABLE IF NOT EXISTS gamedetail
    (
        `game_id` int(11) NOT NULL,
        `game_name` varchar(255) NOT NULL,
        `game_desc` longtext NOT NULL,
        `platform` varchar(255) NOT NULL,
        `uploaded_on` date NOT NULL DEFAULT current_timestamp(),
        `username` varchar(255) NOT NULL,
        `downloads` int(11) NOT NULL,
        `binary_name` varchar(255) NOT NULL,
        `binary_path` varchar(255) NOT NULL,
        `banner_name` varchar(255) NOT NULL,
        `banner_path` varchar(255) NOT NULL
    )";

    if($conn->query($gameDetail) == TRUE)
    {
        echo "Table 'gamedetail created sucessfully or already exists <br>";
    } else{
        die("Error creating table:" .$conn->error);
    }
    // Close connection
    $conn->close();

    // Create config.php file
    createConfigFile($dbHost, $dbUser, $dbPassword, $dbName);

    // Redirect to success page
    header("Location: sucess.php");
    exit();
}

// Function to create the config.php file
function createConfigFile($dbHost, $dbUser, $dbPassword, $dbName) {
    // Config file content
    $configContent = "<?php\n";
    $configContent .= "// Database config file \n";
    $configContent .= "\$dbServer = '$dbHost';\n";
    $configContent .= "\$dbUser = '$dbUser';\n";
    $configContent .= "\$dbPassword = '$dbPassword';\n";
    $configContent .= "\$dbName = '$dbName';\n";
    $configContent .="\n // Attempt to connect to MySQL server \n";
    $configContent .= "\$mysqli = new mysqli(\$dbServer, \$dbUser,\$dbPassword,\$dbName); \n";
    $configContent .= "\n // Check mysql connection \n";
    $configContent .= "if(\$mysqli == false){ \n";
    $configContent .= "die(\"Could not connect\" . \$mysqli->connect_error);  \n \n }";
    $configContent .= "?>";

    // Write content to config.php file
    file_put_contents("../config/db_config.php", $configContent);
}
?>
