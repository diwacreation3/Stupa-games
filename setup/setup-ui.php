<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stupa Games | Setup Screen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }
        p{
            text-align: center;
            font-weight: 300;
            padding: 12px;
            margin-top: -50px;
        }
        .setup-container {
            width: 30vw;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s;
            text-align: center;
            position: relative;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .setup-logo {
            max-width: 100px;
            margin-bottom: 20px;
        }
       
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .loading-overlay {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            align-items: center;
            justify-content: center;
            z-index: 10;
        }
        .loading-overlay.active {
            display: flex;
        }
        .loading-text {
            font-size: 1.5rem;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="setup-container">
        <img src="../assets/brand-logo-bg.png" alt="Logo" class="setup-logo">
        <p>Stupa Games Setup page </p>
        <form id="setupForm" action="setup.php" method="post">
            <div class="form-group mb-3">
                <label for="dbHost">Database Host</label>
                <input type="text" id="dbHost" name="dbHost" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="dbUser">Database User</label>
                <input type="text" id="dbUser" name="dbUser" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="dbPassword">Database Password</label>
                <input type="password" id="dbPassword" name="dbPassword" class="form-control">
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Setup Database</button>
            </div>
        </form>
        <div class="loading-overlay" id="loadingOverlay">
            <div class="gear"></div>
            <div class="loading-text">Setting up the database...</div>
        </div>
    </div>
    <script>
        document.getElementById('setupForm').addEventListener('submit', function() {
            document.getElementById('loadingOverlay').classList.add('active');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
