<?php
require "config/db_config.php";
require "pages/widgets/platform.php";
require "pages/widgets/header.php";
require "pages/widgets/footer.php";
require "includes/_paths.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stupa Games</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./assets/css/home.css">
    <link rel="stylesheet" href="./assets/css/nav-footer-admin.css">
</head>

<body>

    <?php nav_home_header(trim($logo_path, "./"), $login, $dashboard); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $sql = "SELECT * FROM gamedetail LIMIT 4";
                        $result = $mysqli->query($sql);

                        if ($result->num_rows > 0) {
                            $active = "active";
                            while ($row = $result->fetch_assoc()) {
                                $banner_url = $row["banner_path"];
                                $binary_url = $row["binary_path"];
                        ?>
                                <div class="carousel-item <?php echo $active; ?>">
                                    <img src="<?php echo trim($banner_url, "./"); ?>" alt="game_banner" class="d-block w-100">
                                    <div class="carousel-caption">
                                        <h2><?php echo $row['game_name']; ?></h2>
                                        <p><?php echo $row['game_desc']; ?></p>
                                        <a href="pages/download_manager.php?id=<?php echo $row['game_id']; ?>" class="btn btn-primary play-now-btn">Play Now <i class="bi bi-play-circle-fill"></i></a>
                                    </div>
                                </div>
                        <?php
                                $active = "";
                            }
                        } else {
                            echo "Database is empty, please add some games.";
                        }
                        ?>

                        <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#bannerCarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
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
                ?>
                        <div class="col-md-3">
                            <div class="card">
                                <img src="<?php echo trim($banner_url, "./"); ?>" class="card-img-top" alt="Game 1">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $rows['game_name']; ?></h5>
                                    <p class="card-text"><?php echo "Developer: <b>{$rows['username']}</b>"; ?></p>
                                    <p class="card-text">
                                        <?php $platform_code = $rows['platform']; ?>
                                        <?php check_platform($platform_code); ?>
                                    </p>
                                    <a href="pages/download_manager.php?id=<?php echo $rows['game_id']; ?>" class="btn btn-primary">Download &nbsp;&nbsp; <i class="bi bi-cloud-arrow-down-fill"></i></a>
                                    <p class="card-text"><i class="bi bi-download"></i>&nbsp;<?php echo $rows['downloads']; ?></p>
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

    <?php home_footer_bar("diwacreation3"); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybOYxBFGbIR6PrIW1giDuoPjlp9Io6G+arjtDgW9uBYD2An4/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-Qi6LygPvtzF/ABh5y2whIgtCtw4zOZHVWQ1uvUvYjPBMEH9Rcr//a1P1yz6K/7p3" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                interval: 3000 // Change the speed here
            });
        });
    </script>

</body>

</html>