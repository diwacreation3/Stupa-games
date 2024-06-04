<?php

require "../includes/_view_games.php";
require "widgets/platform.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Game List</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/game-view.css">
</head>
<body>
  <div class="container mt-3">
    <h1>Game List</h1>
    <?php
                $sql = "SELECT * FROM gamedetail";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?> 
    <div class="game-card">
      <img src="../assets/img.png" alt="Game Image">
      <div class="game-info">
        <h4><?php echo $row['game_name']; ?></h4>
        <p>Uploaded by: John Doe</p>
        <p>Uploaded Date: <?php echo $row['uploaded_on']; ?></p>
        <p>Downloads: <?php echo $row['downloads']; ?></p>
        <div class="platform-icons">
        <?php $platform_code = $row['platform']; ?>
        <?php check_platform($platform_code); ?>
        </div> 
        <button type="button" class="btn btn-danger mt-2">Delete Game</button>
      </div>
    </div>
  <?php
  
                }
            }?>  
    

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>