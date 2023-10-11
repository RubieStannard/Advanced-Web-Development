<?php
session_start(); // Start the session
session_unset();// Unset all session variables
session_destroy(); // Clear all the session variables
header("Location: index.php"); // Redirect to index.php
?>