<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Rubie" />
    <title>Creating a Guest Book</title>
</head>
<body>
<h1>Web Programming - Lab 5</h1>
<?php
if (isset($_POST["firstname"], $_POST["lastname"])) { // check if both form data exists - isset checks whether a variable is set
    $firstname = addslashes($_POST["firstname"]); // obtain the form first name data - addlashes quote string with slashes
    $lastname = addslashes($_POST["lastname"]); // obtain the form last name data - addlashes quote string with slashes
    $filename = "../../data/lab05/guestbook.txt"; // assumes php file is inside lab05
    umask(0007);
    $dir = "../../data/lab05";
    // mkdir($dir, 02770);
    $data = $firstname . " " . $lastname . "\n"; // concatenate first and last name delimited by space - combine two strings to create one - use . because it's a concatinate operation
    echo "<p>Guestbook</p> "; // generate guestbook
    $handle = fopen($filename, "a+"); // open the file in read and write mode
        if (!is_writable($filename)) { // i_writebale tells whether the filename is writable
            echo "<p>Cannot write to file</p>";
            echo '<a href="guestbookform.php">Go back</a>';
        } else {
        if (fwrite($handle, $data) == true) { // write string to text file - fwrite writes a file if there's data checks if write worked
            echo "<p style='color: green;'>Thank you for signing the Guest book</p>"; // write works
        } else {
            echo "<p style='color: red;'>Cannot add your name to the Guest book</p>"; // write failed
        }
    }
    fclose($handle); // close the text file - fclose closes an open file
} else { // no input
    echo "<p style='color: red;'>You must enter your first and last name!</p>";
    echo "<p style='color: red;'>Use the browser's 'Go back' button to return to the Guestbook form</p>";
}
?>
    <a href="guestbookshow.php">View guest book</a>
</body>
</html>
