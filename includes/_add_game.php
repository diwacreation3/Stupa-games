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
    $user = $_POST["current_user"];

    // set user variable from user session name 


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
                echo "Data added sucessfully";
                header("Location: admin.php");
            } else {
                echo "Opps! something went wrong";
            }
            $stmt->close();
        }
    }

    // handle game icon 
    // File upload directory 
    $statusMsg = "";
//     $_path = "users";
// $_user_path = "diwacreation3";
// $username = "./{$_path}/{$_user_path}";
// mkdir($username, 0777,true);
    
    $targetDir = "uploads/";

    if (isset($_POST["submit"])) {
        if (!empty($_FILES["file"]["name"])) {
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            // Allow certain file formats 
            $allowTypes = array('jpg', 'png', 'jpeg');
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server 
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                    // Insert image file name into database 
                    $insert = $db->query("INSERT INTO images (file_name, uploaded_on, img_path) VALUES ('" . $fileName . "' , NOW(),'$targetFilePath' )  ");
                    if ($insert) {
                        $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                    } else {
                        $statusMsg = "File upload failed, please try again.";
                    }
                } else {
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
            }
        } else {
            $statusMsg = 'Please select a file to upload.';
        }
    }

    // Display status message 
    echo $statusMsg;

    //close connection 
    $mysqli->close();
}
