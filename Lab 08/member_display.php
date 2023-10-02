<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="description" content="Web application development" />
 <meta name="keywords" content="PHP" />
 <meta name="author" content="Rubie" />
 <title>Display All Members</title>
</head>
<body>
<h1>Web Programming - Lab08</h1>
<?php
// Complete your answer based on Lecture 8 slides 26 and 44
require_once ("settings.php");
$conn = @mysqli_connect($host, $user, $pswd) or die('Failed to connect to server'); // Open the connection - Connect to mysql server
@mysqli_select_db($conn, $dbnm) or die('Database not available'); // Use database
// Set up SQL string and execute - get data from user, escape it, trust no-one. :)
$query = "SELECT member_id, firstname, lastname FROM vipmembers";
$results = mysqli_query($conn, $query);
if (mysqli_num_rows($results) > 0) {
    echo "<table width='100%' border='1'>";
    echo "<tr><th>member_id</th><th>fname</th><th>lname</th></tr>";
    while ($row = mysqli_fetch_assoc($results)) { 
        echo "<tr><td>" . $row['member_id'] . "</td>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>No members found</p>";
}
// Close the connection
// mysqli_free_result($results);
mysqli_close($conn);
?>
</body>
</html>
