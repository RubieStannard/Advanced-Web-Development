<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="description" content="Web application development" />
 <meta name="keywords" content="PHP" />
 <meta name="author" content="Rubie" />
 <title>Search Member</title>
</head>
<body>
<h1>Web Programming - Lab08</h1>
<form action="member_search.php" method="POST">
    <label for="lname">Last Name:</label>
    <input type="text" name="lname" id="lname">
    <br> <!--Break-->
    <button type="submit" value="submit">Search Member</button>
</form>
<?php
// complete your answer based on Lecture 8 slides 26 and 44
require_once ("settings.php");
$conn = @mysqli_connect($host, $user, $pswd) or die('Failed to connect to server'); // Open the connection - Connect to mysql server
@mysqli_select_db($conn, $dbnm) or die('Database not available'); // Use database
if (isset($_POST["lname"])) {
    $lname = $_POST["lname"];
    $query = "SELECT member_id, firstname, lastname, email FROM vipmembers WHERE lastname LIKE '%$lname%'"; // LIKE used to search for a specified pattern in a column - % represents zero, one, or multiple characters
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) > 0) { // returns the number of rows in a result set.
        echo "<table width='100%' border='1'>";
        echo "<tr><th>member_id</th><th>fname</th><th>lname</th><th>email</th></tr>";
        while ($row = mysqli_fetch_assoc($results)) { // fetches a result row as an associative array.
            echo "<tr><td>" . $row["member_id"] . "</td>";
            echo "<td>" . $row["firstname"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo "<td>" . $row["email"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No members found</p>";
    }
}
// Close the connection
mysqli_close($conn);
?>
</body>
</html>