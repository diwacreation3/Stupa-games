<?php
require "../includes/_signup.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Signup Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="../assets/css/login-signup.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <img src="<?php echo $logo_path_nbg ?>" alt="Logo">
                <h5>Create Developer Account</h5>
            </div>
            <div class="card-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text"  id="username" name="username" placeholder="Enter username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
          <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email"  id="email" name="email" placeholder="Enter email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
          <span class="invalid-feedback"><?php echo $email_err; ?></span>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password"  id="password" name="password" placeholder="Enter password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
          <span class="invalid-feedback"><?php echo $password_err; ?></span>
          
        </div>
        <div class="form-group">
          <label for="password">Confirm Password</label>
          <input type="password"  id="confirm-password" name="confirm_password" placeholder="Re-enter your password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
          <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
        </div>
        
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button> <br>
        Already have an account <a href="signin.php">Login</a>
      </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text"  id="username" name="username" placeholder="Enter username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
          <span class="invalid-feedback"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email"  id="email" name="email" placeholder="Enter email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
          <span class="invalid-feedback"><?php echo $confirm_email_err; ?></span>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password"  id="password" name="password" placeholder="Enter password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
          <span class="invalid-feedback"><?php echo $password_err; ?></span>
          
        </div>
        <div class="form-group">
          <label for="password">Confirm Password</label>
          <input type="password"  id="confirm-password" name="confirm_password" placeholder="Re-enter your password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
          <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
        </div>
        
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button> <br>
        Already have an account <a href="signin.php">Login</a>
      </form>  -->