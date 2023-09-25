<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Rubie" />
    <title>Give Up</title>
</head>
<body>
<h1>Web Programming - Lab09</h1>
<h2>Guessing Game</h2>
<?php
session_start();
if (!isset ($_SESSION["randNum"])) { // check if session variable exists
    $_SESSION["randNum"] = rand(1, 100); // create the session variable
}
$randNum = $_SESSION["randNum"]; // copy the value to a variable
echo "<p style='color: blue;'>The hidden number was: $randNum</p>"; // displays the number
?>  
    <p><a href="startover.php">Start Over</a></p>
</body>
</html>