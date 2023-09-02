<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Web Programming :: Lab 2" />
    <meta name="keywords" content="Web,programming" />
    <title>Using variables, arrays and operators</title>
</head>
<body>
    <h1>Web Programming - Lab 2</h1>
<?php
    $num = 4.5;
    if(is_numeric($num)){         
        $num = round($num);
        if($num % 2 == 0){
            echo "<p>The variable $num <b>contains an even</b> number.</p>";
        } // true statement
        else{
            echo "<p>The variable $num <b>does not contain an even</b> number.</p>";
        } // false statement
    }
    else{
        echo "<p>Please enter a number.</p>";
    } // false statement
?>
</body>
</html>