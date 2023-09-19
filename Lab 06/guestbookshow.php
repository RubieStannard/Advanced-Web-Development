<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Rubie" />
    <title>Updating the Guest Book System</title>
</head>
<body>
<h1>Web Programming - Lab 6</h1>
<?php 
$filename = "../../data/lab06/guestbook.txt";
if (file_exists($filename)) { // check if file exist
    $handle = fopen($filename, "a+");
    while (!feof($handle)) { // loop while not end of file - feof tests for end-of-file
        $data = file_get_contents($filename); // reads file into string
        $data = stripslashes($data); // removes backslashes
        echo "<pre>$data</pre>"; // define pre-formatted text
    }
    fclose($handle); // close the file
    echo '<a href="guestbookform.php">Back to form</a>';
} else {
    echo "<p>File does not exit</p>";
    echo '<a href="guestbookform.php">Back to form</a>';
}
?>
</body>
</html>
