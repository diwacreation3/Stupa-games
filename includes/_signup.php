<?php
// Include config file 
require_once "../config/db_config.php";
require "_paths.php";

// Define variable and initilize with empty values 
$email = $username = $password = $confirm_password = "";
$email_err = $username_err = $password_err = $confirm_password_err = "";

// processing form data when fomr is submitted 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate username 
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers and underscores ";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // bind variables to rhe prepared statement as parameters 
            $stmt->bind_param("s", $param_username);

            // Set parameters 
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $username_err = "This username already taken";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Opps! Something went wrong. Please try again later.";
            }
            //close statement
            $stmt->close();
        }
    }

    // validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email";
    } else {
        // prepare the select information 
        $sql = "SELECT id FROM users WHERE email = ? ";

        if ($stmt = $mysqli->prepare($sql)) {
            // bind variable as paramter 
            $stmt->bind_param("s", $param_email);

            // set parameter
            $param_email = trim($_POST["email"]);


            // attempt to execute to prepare statements 
            if ($stmt->execute()) {
                // store result 
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $email_err = "Email already in use";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Opps! something went wrong. please try again later";
            }
            $stmt->close();
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters  ";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confim password 
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password. ";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match";
        }
    }

    // Check input errors before inserting in database 
    if (empty($username_err) && empty($email_err) && empty($confirm_password_err) && empty($confirm_password_err)) {
        // prepare an insert statement 
        $sql = "INSERT INTO users ( email ,username, password) VALUES (?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variable to the prepared statement parameters 
            $stmt->bind_param("sss", $param_email, $param_username, $param_password);

            // set email parameter
            $param_email = $email;
            // set parameters 
            $param_username = $username;
            //create password hash
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            // Attempt to execute the prepared statement 

            if ($stmt->execute()) {
                // Rediect to login page 
                header("Location: signin.php");
            } else {
                echo "Opps! something went wrong. please try again later ";
            }
            $stmt->close();
        }
    }
    // close connection
    $mysqli->close();
}
?>