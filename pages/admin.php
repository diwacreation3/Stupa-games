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

   <h2 class="my-5">Hi, <b><?php echo ($_SESSION["username"]); ?></b>.  </h2>
   
   <?php  
    // calls the directory manager code if the directory dosen't exist on session user 
    include "../includes/_dir_manager.php";
   ?>

   
<?php footer_bar("diwacreation3"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>