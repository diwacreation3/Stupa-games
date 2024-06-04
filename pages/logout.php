<?php

// Initilize the session
session_start();

// unset all of the session variable 
$_SESSION = array();

// Destroy the session 
session_destroy();

// redirect to login page 
header("location: ../index.php");
exit;
?>