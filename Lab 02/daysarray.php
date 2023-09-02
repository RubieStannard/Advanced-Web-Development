<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Web Programming :: Lab 2" />
    <meta name="keywords" content="Web,programming" />
    <title>Experimenting on Arrays</title>
</head>
<body>
    <h1>Web Programming - Lab 2</h1>
<?php
// Step 1 - declare and initialise array
    $days = array ("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"); // declare and initialise array
    echo "<p>The days of the week in English are: <br>"; // echo is output statement
    foreach($days as $value){echo $value . ", ";} // array to string conversion

// Step 3 - reassign the values
    $days = array ("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"); // declare and initialise array
    echo "<p>The days of the week in French are: <br>"; // echo is output statement
    foreach($days as $value){echo $value . ", ";} // array to string conversion
?>
</body>
</html>