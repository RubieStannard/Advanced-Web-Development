<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Rubie" />
    <title>Count Visits</title>
</head>
<body>
<h1>Web Programming - Lab10</h1>
<?php
require_once("hitcounter.php"); // class code
umask(0007);
$dir = "../../data/lab10";
if (!is_dir($dir)) {
    mkdir($dir, 02770);       
}
$filename = "../../data/lab10/mykeys.txt"; // assumes php file is inside lab10
$handle = fopen($filename, "r"); // code to read your mykeys.txt file
if (!$handle) { 
    echo "<p>Cannot open file</p>";
} else {
    // return the line from the file
    $host = fgets($handle);
    $username = fgets($handle);
    $password = fgets($handle);
    $databasename = fgets($handle);
    fclose($handle); // close the text file - fclose closes an open file
    $Counter = new HitCounter($host, $username, $password, $databasename); // instantiates an object of the HitCounter class
    $hits = $Counter->getHits(); // 
    echo "<p>This page has received $hits hits.</p>";
    $Counter->setHits($hits); // increment the value
    $Counter->closeConnection(); // terminate the server connection
}
?>
</body>
</html>