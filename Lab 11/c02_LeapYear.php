<!DOCTYPE html>
<html>
<head>
<title>Leap Year</title>
<meta http-equiv="Content-Type"	content="text/html; charset=utf-8" />
</head>
<body>
<?php
function is_leapyear($Year){ // declare the leapyear function
    if ($Year % 4 == 0){ // check if $year is a divisiable by 4
        if ($Year % 100 == 0 && $Year % 400 != 0){// check if $year is divisable by 100 and 400
             return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}
if (isset ($_GET["year"])){ // check if form data exists
    $Year = $_GET["year"]; // obtain the form data
    if(is_leapyear($Year) == true)
        echo "<p>The year you entered is a leap year.</p>"; 
    else if(is_leapyear($Year) == false)      
        echo "<p>The year you entered is a standard year.</p>"; 
}

// $Year == $_GET["year"];
// if ($Year %4 != 0)
// 	echo "The year you entered is a standard year.";
// else (if  $Year % 400 == 0)
// 	echo "The year you entered is a leap year.";
// else (if $Year % 100 == 0)
// 	echo "The year you entered is a standard year.";
// else
// 	echo "The year you entered is a leap year.";
?>
</body>
</html>
