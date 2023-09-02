<!DOCTYPE html>
<html lang="en">
<head>
<title>My First PHP webpage</title>
<meta charset="utf-8">
<meta name="description" content="Web Development">
<meta name="keywords" content="HTML, CSS, JavaScript">
<meta name="author" content="Rubie Stannard">
</head>
<body>
<h1>Use of PHP built-in functions</h1>
<?php
// Use of built-in functions abs() and pow(), and echo statement
// abs() calculates absolute value of an integer
// pow() calculates the value of x to the power of y
// echo statement prints results
echo "<p>Absolute value of -9 is: ", abs (-9),".</p>";
echo "<p>2 to the power of 5 is : ", pow(2,5),".</p>";
echo "<p>Decimal equivalent of 1101 is: ", bindec(1101),".</p>";
echo "<p>Binary equivalent of 14 is: ", decbin(14),".</p>";
// Use of decbin() and bindec() functions
// decbin() converts decimal to binary
// bindec() converts binary to decimal
?>
</body>
</html>