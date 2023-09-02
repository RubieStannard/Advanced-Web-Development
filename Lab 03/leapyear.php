<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Web Programming :: Lab 3" />
    <meta name="keywords" content="Web,programming" />
    <title>Using if statements</title>
</head>
<body>
<?php
function is_leapyear($num){ // declare the leapyear function
    if ($num % 4 == 0){ // check if $num is a divisiable by 4
        if ($num % 100 == 0 && $num % 400 != 0){// check if $num is divisable by 100 and 400
             return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}
if (isset ($_GET["number"])){ // check if form data exists
    $num = $_GET["number"]; // obtain the form data
    if(is_leapyear($num) == true)
        echo "<p style='color: green;'>The year you entered is a leap year.</p>"; 
    else if(is_leapyear($num) == false)      
        echo "<p style='color: red;'>The year you entered is not a leap year.</p>"; 
}
?>
</body>
</html>