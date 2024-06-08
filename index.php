
<?php

require "config/db_config.php";
require "pages/widgets/platform.php";
require "includes/_paths.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stupa Games</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./assets/css/home.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><img src="assets/brand-logo-bg.png" height="60px" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/admin.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary" href="pages/signin.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="bannerCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    <?php
                    $sql = "SELECT * FROM gamedetail  LIMIT 4 ";
                    $result = $mysqli->query($sql);
                
                if ($result->num_rows > 0) {
                    $active = "active";
                while ($row = $result->fetch_assoc()) {
                    $banner_url = $row["banner_path"];
                    $binary_url = $row["binary_path"];
                   
        ?>
                        <div class="carousel-item <?php echo $active ?>">
                            <img src="<?php echo trim($banner_url, "./") ?>"  alt="Game Banner 1">
                            <div class="carousel-caption">
                                <h2> <?php echo $row['game_name'] ?> </h2>
                                <p ><?php echo $row['game_desc'] ?> </p>
                                
                                <a href="pages/download_manager.php?id=<?php echo $row['game_id']; ?>" class="btn btn-primary play-now-btn">Play Now  <i class="bi bi-play-circle-fill"></i></a>
                            </div>
                        </div>

                  <?php
                  $active = "";
                }
                } else {
                    echo "database is empty, please add some games ";
                }
                
                ?>      
                    </div>
                    <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="releases">
            <h2>Releases</h2>
            <div class="row">
                <?php
                $sql_rel = "SELECT * FROM gamedetail";
                $results = $mysqli->query($sql_rel);
            
            if ($results->num_rows > 0) {
            while ($rows = $results->fetch_assoc()) {
                $banner_url = $rows["banner_path"];
                $binary_url = $rows["binary_path"];
               
    
                ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="<?php echo trim($banner_url, "./") ?>" class="card-img-top" alt="Game 1">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $rows['game_name']; ?></h5>
                            <p class="card-text"><?php echo "Developer:  <b> {$rows['username']} </b>" ?> </p>
                            <p class="card-text">
                                <?php $platform_code = $rows['platform']; ?>
                            <?php check_platform($platform_code); ?>
                        </p>
                            <a href="pages/download_manager.php?id=<?php echo $rows['game_id']; ?>" class="btn btn-primary">Download &nbsp;&nbsp; <i class="bi bi-cloud-arrow-down-fill"></i></a>
                            <p class="card-text"><i class="bi bi-download"> </i>&nbsp;<?php echo $rows['downloads'] ?> </p>
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
    </div>




    <footer class="footer">
        <div class="container">
            <p>Copyright © 2024 Developed by diwacreation3 | All Rights Reserved</p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

      <script> 

$(document).ready(function(){
    $('.carousel').carousel({
        interval: 3000 // Change the speed here
    });
});

      </script>  

 </body>
 </html>
       