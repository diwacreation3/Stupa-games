<?php

require "../config/db_config.php";


// define variable and inatilize with empty values 
$GameName  = $platform = $GameDesc = $user = "";
$GameName_err = $GameDesc_err = $platform_err  = "";


//game name description and platform detail into database 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // check if game name is empty 
    if (empty(trim($_POST["game_name"]))) {
        $GameName_err = "Please enter game name.";
    } else {
        $GameName = trim($_POST["game_name"]);
    }

    // check if game desc is empty 
    if (empty($_POST["game_description"])) {
        $GameDesc_err = "Please enter game description";
    } else {
        $GameDesc = trim($_POST["game_description"]);
    }

    // check if platform somehow empty 
    if (empty($_POST["platform"])) {
        $platform_err = "Please select game platform";
    } else {
        $platform = $_POST["platform"];
    }
     // set user variable from user session name
    $user = $_POST["current_user"];

    // shitty file logic it took fucking one day 




    // check input error before inserting in database 
    if (empty($GameName_err) && empty($GameDesc_err) && empty($platform_err)) {
        // prepare an insert statement 
        $sql = "INSERT INTO gamedetail (game_name, game_desc, platform, username) VALUES(?,?,?,?) ";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variable to the prepared statement parameters 
            $stmt->bind_param("ssss", $param_game_name, $param_game_desc, $param_platform, $param_user);

            // set game name paramter
            $param_game_name = $GameName;

            // set game desc to parameter
            $param_game_desc = $GameDesc;

            //set platform to parameter
            $param_platform = $platform;

            //set user from session
            $param_user = $user;
            // Attempt to execute the prepared statement 

            if ($stmt->execute()) {
                // echo msg 
                // echo "Data added sucessfully";
                header("Location: index.php");
            } else {
                echo "Opps! something went wrong";
            }
            $stmt->close();
        }
    }

   


    //close connection 
    $mysqli->close();
}
