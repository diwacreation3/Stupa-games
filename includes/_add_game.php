<?php

require "../config/db_config.php";
require "../includes/_paths.php";
require "init_session.php";
$username = $_SESSION["username"];

// define variable and inatilize with empty values 
$GameName  = $platform = $GameDesc = $user  = $binary_name = $binary_path = $img_name = $img_path ="";
$GameName_err = $GameDesc_err = $platform_err  = $img_name_err = $binary_name_err ="";




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
    //file stuff
    $_data_path = "../$data_path/$user";
    
   
    $_db_img_Ustatus = false;
    $_db_binary_Ustatus = false;


    // Someone fix this upload issue
    // it upload into folder if other file got error during upload
    // check image
    if(empty($_FILES["banner_img"]["name"]))
    {
        $img_name_err = " Please select image";
    } else{
        $imgName = basename($_FILES["banner_img"]["name"]);
       
        $_user_img_path = "$_data_path/$_img_path/";
        $targetImgPath = $_user_img_path . $imgName;

        $imgType = pathinfo($targetImgPath, PATHINFO_EXTENSION);

        $Img_allowTypes = array('jpg', 'png', 'jpeg');
        $img_check = in_array($imgType, $Img_allowTypes);
        if($img_check)
        {
            $img_move = move_uploaded_file($_FILES["banner_img"]["tmp_name"], $targetImgPath);
            $img_path = $targetImgPath; 
            $img_name = "{$imgName}";
            if($img_move)
            {
                $_db_img_Ustatus = true;
            } else{
                $img_name_err = "Image upload failed";
            }

        } else {
            $img_name_err = "Sorry, only JPG, PNG, JPEG, files are allowed ";
        }

    }

    // Check binary file 
    if(empty($_FILES["game_file"]["name"]))
    {
        $binary_name_err = "Please select executable eg. .exe .apk or compress it on .zip, .rar or .tar";
    } else{
        $binaryName = basename($_FILES["game_file"]["name"]);

        $_user_binary_path = "$_data_path/$_binary_path/";
        $targetBinaryPath = $_user_binary_path . $binaryName;
        $binaryType = pathinfo($targetBinaryPath, PATHINFO_EXTENSION);

        $Binary_allowTypes = array('zip', 'msi' , 'rar','tar', 'exe', 'apk', 'aab' );
        $binary_check = in_array($binaryType, $Binary_allowTypes);
        if($binary_check)
        {
            $binary_move = move_uploaded_file($_FILES["game_file"]["tmp_name"], $targetBinaryPath);
            $binary_path = $targetBinaryPath;
            $binary_name = "{$binaryName}";
            if($binary_move)
            {
                $_db_binary_Ustatus = true;
            } else{
                $binary_name_err = "GAme file upload fail";
            }

        } else{
            $binary_name_err =  "Sorry, only zip, exe, rar,  apk, aab  files are allowed";
        }

    }


    // check input error before inserting in database 
    if (empty($GameName_err) && empty($GameDesc_err) && empty($platform_err) && empty($img_name_err) && empty($binary_name_err) ) {
        // prepare an insert statement 
        $sql = "INSERT INTO gamedetail (game_name, game_desc, platform, username, binary_name, binary_path, banner_name, banner_path) VALUES(?,?,?,?,?,?,?,?) ";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variable to the prepared statement parameters 
            $stmt->bind_param("ssssssss", $param_game_name, $param_game_desc, $param_platform, $param_user, $param_binary_name, $param_binary_path, $param_image_name, $param_image_path);

            // set game name paramter
            $param_game_name = $GameName;

            // set game desc to parameter
            $param_game_desc = $GameDesc;

            //set platform to parameter
            $param_platform = $platform;

            //set user from session
            $param_user = $user;
            // Attempt to execute the prepared statement 

            // set banner image name and path
            $param_image_name = $img_name;

            $param_image_path = $img_path;

            // set binary name and path
            $param_binary_name = $binary_name;
            $param_binary_path = $binary_path;

            if ($stmt->execute()) {
                // echo msg 
                // echo "Data added sucessfully";
                header("Location: admin.php");
            } else {
                echo "Opps! something went wrong";
            }
            $stmt->close();
        }
    }




    //close connection 
    $mysqli->close();
}
