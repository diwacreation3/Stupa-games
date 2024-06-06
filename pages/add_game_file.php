<?php
require "../includes/_add_game_file.php";
require "widgets/header.php";
require "widgets/footer.php";

;?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Game Upload Form</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
</head>
<body>
  <?php $username = $_SESSION["username"]; ?>
  <?php nav_header($logo_path, $manage_games, $add_game, $username) ?>

  <div class="container">
    <div class="card w-75">
      <div class="card-header">
        <h3>Add Game file</h3>
      </div>
      <div class="card-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
          <!-- <div class="form-group mb-3">
            <label for="game_name" class="form-label">Game Name</label>
            <input type="text"  id="game_name" name="game_name" placeholder="Enter game name"  class="form-control" readonly value="rdr2">
          </div> -->
           <!--
          <div class="form-group mb-3">
            <label for="game_description" class="form-label">Game Description</label>
            <textarea id="game_description" name="game_description" rows="3" placeholder="Enter game description" class="form-control " readonly value = "ome game detail text" ></textarea>
            <span class="invalid-feedback"><?//php echo $GameDesc_err; ?></span>
          </div>
          <div class="form-group mb-3">
            <label for="platform" class="form-label">Platform</label>
            <input type="text" name="platform" id="platfrom" class="form-control" readonly value = " windows">
          </div> -->
           <div class="form-group mb-3">
            <label for="banner_image" class="form-label">Banner Image</label>
            <input type="file" class="form-control" id="banner_img" name="banner_img">
          </div> 
           <div class="form-group mb-3">
            <label for="game_file" class="form-label">Game File</label>
            <input type="file" class="form-control" id="game_file" name="game_file">
          </div> 
    
          <button type="submit" class="btn btn-primary">Submit Game File</button>
        </form>
      </div>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
