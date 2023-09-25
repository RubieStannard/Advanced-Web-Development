<?php
session_start(); // start the session
session_unset();// unset all session variables - unset frees all session variables currently registered.
session_destroy(); // destroy all data associated with the session 
header("location:number.php"); // redirect to number.php
?>