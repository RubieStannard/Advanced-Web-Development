<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Web Programming :: Lab 3" />
    <meta name="keywords" content="Web,programming" />
    <title>Implementing loop statements</title>
</head>
<body>
<?php
function is_prime($num){
    if ($num == 1){
        return false;
    }else{
        for ($i = 2; $i <= $num/2; $i++){ // $i stores the value 2, checks if 2 is less than or equal to the given number, $i++ increments the assigned value
            if ($num % $i == 0) // given number divided by 2 = 0
                return false;
        }
        
        return true;
    }
}
if (isset ($_GET["number"])){  // checking the data from primenumberform
    $num = $_GET["number"]; // $_GET collects data from primenumberform
    if (is_prime($num) == true) 
        echo "<p style='color: green;'>The number you entered is a prime number.</p>";
    else if (is_prime($num) == false) 
        echo "<p style='color: blue;'>The number you entered is not a prime number.</p>";
}
?>
</body>
</html>