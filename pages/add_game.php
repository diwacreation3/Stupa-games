<?php
require "../includes/_add_game.php";

?>

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
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Admin Panel</a>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <!-- <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="#">Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Games</a>
              </li>
            </ul>
            
            <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  John Doe (username)
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

  <div class="container">
    <div class="card w-75">
      <div class="card-header">
        <h3>Add New Game</h3>
      </div>
      <div class="card-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <label for="game_name" class="form-label">Game Name</label>
            <input type="text"  id="game_name" name="game_name" placeholder="Enter game name" class="form-control <?php echo (!empty($GameName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $GameName; ?>">
            <span class="invalid-feedback"><?php echo $GameName_err; ?></span>
          </div>
          <div class="form-group mb-3">
            <label for="game_description" class="form-label">Game Description</label>
            <textarea id="game_description" name="game_description" rows="3" placeholder="Enter game description" class="form-control <?php echo (!empty($GameDesc_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $GameDesc; ?>"></textarea>
            <span class="invalid-feedback"><?php echo $GameDesc_err; ?></span>
          </div>
          <div class="form-group mb-3">
            <label for="platform" class="form-label">Platform</label>
            <select class="form-select" id="platform" name="platform">
              
              <option value="windows">Windows</option>
              <option value="android">Android</option>
              <option value="web">Web</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="banner_image" class="form-label">Game Icon</label>
            <input type="file" class="form-control" id="game_icon" name="game_icon">
          </div>
          <div class="form-group mb-3">
            <label for="banner_image" class="form-label">Banner Image</label>
            <input type="file" class="form-control" id="banner_image" name="banner_image">
          </div>
          <div class="form-group mb-3">
            <label for="game_file" class="form-label">Game File</label>
            <input type="file" class="form-control" id="game_file" name="game_file">
          </div>
          <button type="submit" class="btn btn-primary">Upload Game</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
