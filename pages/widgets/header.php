<?php 
// Template header; 
function nav_header($logo_path, $manage_game,  $add_game, $username)
{
    echo <<<EOT
        <header>
        <nav class="navbar navbar-expand-sm ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
          <img src = "$logo_path" height= "40px" width="45px">
          </a>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="../index.php">Homepage</a>
              </li>
            <li class="nav-item">
                <a class="nav-link active" href="admin.php">Dashboard</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link active" href="$manage_game">Manage Games</a>
              </li>
              <li class="nav-item">
              <a class="nav-link active" href="$add_game">Add Games</a>
            </li>
            </ul>
            
            <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  $username
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
        </header>
EOT;
}
?>