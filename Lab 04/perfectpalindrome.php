<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Rubie" />
    <title>Practicing string functions</title>
</head>
<body>
<h1>Web Programming - Lab 4</h1>
<?php
function palindrome($str){ 
    $pattern = "/^[A-Za-z ]+$/"; // set regular expression pattern 
    if (strcmp(strrev($str), strtolower($str)) == $str) { // original word is equal to the reveresed word and is lowercase
        return true; // if it matches, return true
    } else {
        return false; // if it doesn't match, return false
    }
}
if (isset ($_POST["string"])){ // check if form data exists
    $str = $_POST["string"]; // obtain the form data
    $str = preg_replace("([^A-Za-z0-9])", "", strtolower($str)); // converting the string to here, remove spaces and lower case
    if (palindrome($str) == true){
        echo "<p style='color: green;'>The text you entered <b>'$str'</b> is a perfect palindrome.</p>"; // if true, echo this
    } else {
        echo "<p style='color: red;'>The text you entered <b>'$str'</b> is not a perfect palindrome.</p>"; // if false, echo this
    }
}
?>
</body>
</html>
