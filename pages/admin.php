<?php
// include navbar and footer widget
require "widgets/header.php";
require "widgets/footer.php";
require "../includes/_paths.php";
include "init_session.php";
require "../includes/_admin_user.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php

$username = $_SESSION["username"];
?>
    <?php nav_header($logo_path, $manage_games, $add_game, $username); ?>

   <!-- <h2 class="my-5">Hi, <b><?php echo ($_SESSION["username"]); ?></b>.  </h2> -->
   
   <?php
   // create directory if it dosent exist
   
    if(!is_dir($data_path))
    {   
        // directory logic 
        $_user_path = $username;

        $_data_user_path = "../{$data_path}/$_user_path";
        if(!file_exists( $_data_user_path))
        {
           mkdir($_data_user_path,0777, true); 
        }
        $_user_img_path = "{$_data_user_path}/{$_img_path}";

        if(!file_exists($_user_img_path))
        {
            mkdir($_user_img_path, 0777, true);
        }

        $_user_binary_path = "{$_data_user_path}/{$_binary_path}";
        if(!file_exists($_user_binary_path))
        {
            mkdir($_user_binary_path, 0777, true);
        }

        // $_create_img_path = "../{$data_path}/ {$_user_path}/ {$_img}  ";
        // $_create_binary_path = "../{$data_path}/{$_user_path}/{$_binary} /{$_img}";
        
        // if($_create_binary_path)
        // {
        //     mkdir($_create_binary_path  , 0777, true);  
        //     // mkdir($_create_img_path, 0777, true);
        // }
       
        
        

    }
   
   ?>

   
<?php footer_bar("diwacreation3"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>