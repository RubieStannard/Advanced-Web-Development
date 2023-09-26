<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Rubie" />
    <title>Set Up</title>
</head>
<body>
<h1>Web Programming - Lab10</h1>
<form action="setup.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username">
    <br> <!--Break-->
    <label for="password">Password:</label>
    <input type="text" name="password">
    <br> <!--Break-->
    <label for="databasename">Database Name:</label>
    <input type="text" name="databasename">
    <br> <!--Break-->
    <button type="submit" value="submit">Sign</button>
    <button type="reset" value="reset">Reset</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $host = "feenix-mariadb.swin.edu.au";
    if (isset($_POST["username"], $_POST["password"], $_POST["databasename"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $databasename = $_POST["databasename"];
        umask(0007);
        $dir = "../../data/lab10";
        if (!is_dir($dir)) {
            mkdir($dir, 02770);       
        }
        $filename = "../../data/lab10/mykeys.txt"; // assumes php file is inside lab10 mykeys.inc.php
        $handle = fopen($filename, "w");
    }
    if (!is_writable($filename)) { // is_writebale tells whether the filename is writable
        echo "<p>Cannot write to file</p>";
    } else {
        $data = $host . "\n" . $username . "\n" . $password . "\n" . $databasename . "\n";
        if (fwrite($handle, $data) > 0) { // write string to text file - fwrite writes a file if there's data checks if write worked
            echo "<p style='color: green;'>Successfully created key</p>"; // write works
        } else {
            echo "<p style='color: red;'>Cannot create key</p>"; // write failed
        }
    fclose($handle);
    }

    $conn = @mysqli_connect($host, $user, $pswd, $dbnm) or die('Failed to connect to server'); // Open the connection - Connect to mysql server and use database

    // Create the table
    $create = "CREATE IF NOT EXISTS TABLE hitcounter (
        id SMALLINT NOT NULL PRIMARY KEY,
        hits SMALLINT NOT NULL
    )";
    if (mysqli_query($conn, $create)) {
        echo "<p style='color:green'>Successfully created table.</p>";
    } else {
        echo "<p style='color:red'>Error creating table.</p>";
    }
    $query = "INSERT INTO hitcounter VALUES (1, 0)"; // Insert the data
    $results = mysqli_query($conn, $query);
    if (!$results) {
        echo "<p style='color: red;'>Error creating table.</p>";
    } else {
        echo "<p style='color: green;'>Successfully created table.</p>";
    }
        echo "<p style='color: green;'>Successfully created table.</p>";
// Close the connection
mysqli_close($conn);      
}     
?>
</body>
</html>