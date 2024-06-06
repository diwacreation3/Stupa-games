<?php
require "../config/db_config.php";

if (isset($_GET['id'])) {
    $gameId = $_GET['id'];

    // Retrieve the game details
    $sql = "SELECT binary_path, downloads FROM gamedetail WHERE game_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $gameId);
    $stmt->execute();
    $stmt->bind_result($binaryPath, $downloadCount);
    $stmt->fetch();
    $stmt->close();

    if ($binaryPath) {
        // Increment the download count
        $newCount = $downloadCount + 1;
        $sql = "UPDATE gamedetail SET downloads = ? WHERE game_id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ss", $newCount, $gameId);
        $stmt->execute();
        $stmt->close();

        // Redirect to the binary file
        header("Location: " . $binaryPath);
        
        
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid request.";
}
?>
