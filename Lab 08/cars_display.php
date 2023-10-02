<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="description" content="Web application development" />
 <meta name="keywords" content="PHP" />
 <meta name="author" content="Rubie" />
 <title>Cars Display</title>
</head>
<body>
<h1>Web Programming - Lab08</h1>
<?php
// Complete your answer based on Lecture 8 slides 26 and 44
require_once ("settings.php");
// Open the connection - Connect to mysql server
$conn = @mysqli_connect($host, $user, $pswd)
or die('Failed to connect to server');
// Use database
@mysqli_select_db($conn, $dbnm)
or die('Database not available');
// Set up SQL string and execute - get data from user, escape it, trust no-one. :)
// $pcode = mysqli_escape_string($conn, $_GET['pcode']);
$query = "SELECT * FROM cars";
$results = mysqli_query($conn, $query);
// Now use data however we want 
echo "<table width='100%' border='1'>";
echo "<tr><th>make</th><th>model</th><th>price</th><th>car_id</th></tr>";
$row = mysqli_fetch_row($results);
while ($row) {
    echo "<tr><td>{$row[0]}</td>";
    echo "<td>{$row[1]}</td>";
    echo "<td>{$row[2]}</td>";
    echo "<td>{$row[4]}</td></tr>";
    $row = mysqli_fetch_row($results);
}
echo "</table>";
// Close the connection
mysqli_free_result($results);
mysqli_close($conn);
?>
</body>
</html>