<?php
// Initialize the session
session_start();

// Unset all of the session var
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to home page pag nag logout
header("location: ./index.php");
 

?>