​<?php
include "../config/db_config.php";
if (isset($_GET['id'])) {
    $game_id = $_GET['id'];
    $game_file_path = $_GET['binary_path'];
    $banner_path = $_GET['img_path'];

    // delete game from folder
    unlink($game_file_path);
    unlink($banner_path);

    // delete from database 
    $sql = "DELETE FROM gamedetail WHERE game_id ='$game_id'";
     $result = $mysqli->query($sql);
     if ($result == TRUE) {
        echo "Record deleted successfully.";
        header('Location: manage_games.php');
    }else{
        echo "Error:" . $sql . "<br>" . $mysqli->error;
    }
}
?>