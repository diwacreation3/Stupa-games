<?php

require "../includes/_add_game.php";
require "../includes/_paths.php";
require "../pages/widgets/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Game</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/add-game.css">
    <link rel="stylesheet" href="../assets/css/nav-footer-admin.css">
    <script type="text/javascript" src="../scripts/add_game_handles.js" defer></script>
</head>

<body>
<?php $username = $_SESSION["username"]; ?>
<?php nav_header($logo_path_nbg,$add_game) ?>
    <!-- Content -->
    <div class="container mt-5">
        <div class="form-container">
            <div class="form-header">
                <h4>Add New Game</h4>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="gameForm" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="gameName" class="form-label">Game Name</label>
                    <input type="text"  id="gameName" name="game_name"  class="form-control <?php echo (!empty($GameName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $GameName; ?>" required>
                    <span class="invalid-feedback"><?php echo $GameName_err; ?></span>
                </div>
                <div class="mb-3">
                    <label for="gameDescription" class="form-label">Game Description</label>
                    <textarea  id="gameDescription" rows="3" name="game_description"class="form-control <?php echo (!empty($GameDesc_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $GameDesc; ?>" required></textarea>
                    <span class="invalid-feedback"><?php echo $GameDesc_err; ?></span>
                    <span id="wordCount"></span>
                </div>
                <div class="mb-3">
                    <label for="platform" class="form-label" >Platform</label>
                    <select class="form-select" id="platform" name= "platform" required >
                        <option value="windows">Windows</option>
                        <option value="android">Android</option>
                        <option value="web">Web</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="bannerImage" class="form-label">Banner Image</label>
                    <div id="bannerImageDropArea" class="drag-drop-area">
                        <p>Drag & drop your banner image here, or click to select.</p>
                        <input type="file" id="bannerImage"  name="banner_img" hidden class="form-control <?php echo (!empty($img_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $img_name; ?>" required >
                        <img id="bannerImagePreview" src="#" alt="Banner Image Preview" style="display: none;">
                        <span class="invalid-feedback"><?php echo $img_name_err; ?></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="binaryFile" class="form-label">Binary File</label>
                    <div id="binaryFileDropArea" class="drag-drop-area">
                        <p>Drag & drop your binary file here, or click to select.</p>
                        <input type="file" id="binaryFile" name="game_file" hidden class="form-control <?php echo (!empty($binary_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $binary_name; ?>" required>
                        <div id="filePreview" class="file-preview" style="display: none;">
                            <i id="fileIcon" class="bi "></i>
                            <span id="fileName"></span>
                        </div>  
                         <span class="invalid-feedback"><?php echo $binary_name_err; ?></span>
                    </div>

                </div>
                <input type="hidden" name="current_user" value="<?php echo $username ?>">
                <button type="submit" class="btn btn-primary">Upload Game <i class="bi bi-cloud-upload-fill"></i></button>
             
            </form>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
