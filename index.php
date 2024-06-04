<?php

 require "config/db_config.php";
 require "pages/widgets/platform.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Game Store | Home page</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="assets/logo.png" alt="logo" width="50" height="50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-10">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="pages/admin.php">Dashboard</a>
                        </li>
                    </ul>
                    <button class="btn btn-primary" type="submit"><a href="pages/signin.php">Login</a></button>
                </div>
        </nav>
    </header>

    
    <div class="hero">
        <div class="container-md">
            <div class="row">
            <?php
                $sql = "SELECT * FROM gamedetail";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?> 
                <div class="col-6">
                    <div class="card">
                        <img class="card-img-top" src="../assets/img.png" alt="Title" />
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $row['game_name']; ?></h4>
                            <p class="card-text"><?php echo $row['game_desc']; ?></p>
                            <a href="#" class="btn btn-primary">Download</a> <br> <br>
                            <div class="platform-icons">
                               <?php $platform_code = $row['platform']; ?>
                               <?php check_platform($platform_code); ?>
                                <!-- <i class="bi bi-windows"></i>
                                <i class="bi bi-phone"></i>
                                <i class="bi bi-globe"></i> -->
                            </div>

                        </div>
                    </div>
                </div>
                
                <?php 
                }
             }
             
             ?> 
                

            </div>
        </div>
    </div>

    
    <footer class="footer fixed-bottom ">
       <p class="footer-detail">Copyright 2024 | Developed by diwacreation3</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>

