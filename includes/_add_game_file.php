<?php
require "../config/db_config.php";
require "../includes/_paths.php";
require "init_session.php";
$username = $_SESSION["username"];
?>

<?php
// file management stuff
// file path info 
        $_user_path = $username;
        $_data_path = "../$data_path/$_user_path/";

    $statusMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_FILES["banner_img"]["name"] && $_FILES["game_file"]["name"])) {
        $fileName = basename($_FILES["game_file"]["name"]);
        $imgName = basename($_FILES["banner_img"]["name"]);

        
        // $_data_user_path = "../{$data_path}/$_user_path/";

        // paths for binary and banner image 
        $_user_img_path = "$_data_path/$_img_path/";
        $_user_binary_path = "$_data_path/$_binary_path/";


        $targetFilePath = $_user_binary_path . $fileName;
        $targetImgPath = $_user_img_path . $imgName;

        $imgType = pathinfo($targetImgPath, PATHINFO_EXTENSION);
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain image formats 
        $Img_allowTypes = array('jpg', 'png', 'jpeg');
        $binary_allowtypes = array('zip', 'tar.gz', 'rar');

        $img_check = in_array($imgType, $Img_allowTypes);
        $binary_check = in_array($fileType, $binary_allowtypes);

        if ($img_check && $binary_check) {
            // Upload file to server 
            $img_move = move_uploaded_file($_FILES["banner_img"]["tmp_name"], $targetImgPath);
            $binary_move = move_uploaded_file($_FILES["game_file"]["tmp_name"], $targetFilePath);
            if ($img_move && $binary_move) {
                // Insert image file name into database 
                // prepare statement for image detail 
                $insert = $mysqli->query("INSERT INTO gamedetail (binary_name, binary_path,banner_name,  banner_path) VALUES ('". $fileName . "' ,'$targetFilePath','". $imgName . "', $targetImgPath  )  ");
                if ($insert) {
                    $statusMsg = "The file " . $imgName . " has been uploaded successfully.";
                    
                } else {
                    $statusMsg = "upload failed, please try again.";
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, files are allowed to upload.';
        }

        // allow image 
    } else {
        $statusMsg = 'Please select a file to upload.';
    }
    echo $statusMsg;

    $mysqli->close();
}
?>