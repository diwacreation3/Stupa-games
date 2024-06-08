<?php
// include navbar and footer widget
require "../config/db_config.php";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/nav-footer-admin.css">
</head>
<body>

<?php
$username = $_SESSION["username"];
?>
    <?php nav_header($logo_path,  $add_game); ?>

   <?php
   $sql= "SELECT * FROM users";
   $result = $mysqli->query($sql);
   if($result->num_rows > 0)
   {

        while($row = $result->fetch_assoc())
        {   
            $user = $row['username'];
            if($user == $username)
            {
   ?>
   <!-- user profile info Content -->
   <div class="container mt-5 d-flex flex-column align-items-center">
        <!-- Profile Card -->
        <div class="col-md-6 profile-card">
            <img src="imgs/img (5).jpg" alt="Profile Image">
            <h5><?php echo $row['username'] ?></h5>
            <p><?php echo "Email: ", $row['email'] ?></p>
            <p> <?php echo "Account created on: ", $row['created_on'] ?> </p>
            <button class="btn reset-button">Reset Password</button>
        </div>
     <?php
            }
        }}
     ?>   
        <h2 class="my-5">Hi, <b><?php echo ($_SESSION["username"]); ?></b>.  </h2>
   
   <?php  
    // calls the directory manager code if the directory dosen't exist on session user 
    include "../includes/_dir_manager.php";
   ?>

   
<?php footer_bar("diwacreation3"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>