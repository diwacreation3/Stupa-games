<?php 
// Template header; 
function nav_header($logo_path,  $add_game, )
{
    echo <<<EOT
        <header>
         <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="$logo_path" height="50px" alt="Stupa Games">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="$add_game">Add Games</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-danger" href="logout.php">Logout <i class="bi bi-door-closed-fill"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        </header>
EOT;
}

function nav_home_header($logo_path,  $login, $dashboard )
{
    echo <<<EOT
        <header>
         <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="$logo_path" height="50px" alt="Stupa Games">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="$dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="$login">Login <i class="bi bi-door-open-fill"></i></a>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>
        </header>
EOT;
}
?>

