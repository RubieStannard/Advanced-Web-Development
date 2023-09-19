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
if (isset($_POST["name"], $_POST["email"])) { // check if both form data exists - isset checks whether a variable is set
    $name = $_POST["name"]; // obtain the form name data 
    $email = $_POST["email"]; // obtain the form email data 
    $filename = "../../data/lab06/guestbook.txt"; // assumes php file is inside lab05
    umask(0007);
    $dir = "../../data/lab06";
    if (!is_dir($dir)) {
        mkdir($dir, 02770);       
    }
    $data = $name . " " . $email  . "\n"; // concatenate first and last name delimited by space - combine two strings to create one - use . because it's a concatinate operation
    echo "<p>Guestbook</p> "; // generate guestbook
    $alldata = array(); // create an empty array
    if (file_exists($filename)) { // check if file exists for reading
        $itemdata = array(); // create an empty array
        $handle = fopen($filename, "r"); // open the file in read mode
        //if (!is_writable($filename)) { // i_writebale tells whether the filename is writable
        //$itemdata = array(); // create an empty array
        //$handle = fopen($filename, "a+"); // open the file in read mode
        while (!feof($handle)) { // loop while not end of file - feof tests for end-of-file
            $onedata = fgets($handle); // read a line from the text file
            if ($onedata != "") { // ignore blank lines
                $data = explode(",", $onedata); // explode string to array
                $alldata [] = $data; // create an array element
                $itemdata[] = $data [0]; // create a string element
            }        
        }
        fclose($handle); // close the text file
        $newdata = !(in_array($name, $itemdata)); // check if item exists in array - in_array searches an array for a specific value

    } else {
        $newdata = true; // if the data doesn't exist make new data
    }

    if ($newdata) {
        $handle = fopen($filename, "a"); // open the file in append mode
        $data = $name . "," . $email . "\n"; // concatenate item and qty delimited by comma
        fputs($handle, $data); // write string to text file
        echo "<p style='color: green;'>Thank you for signing the guest book</p>";
        fclose ($handle); // close the text file
    } else {
        echo "<p style='color: red;'>You have already signed the guest book!</p>";
    }

} else { // no input
    echo "<p style='color: red;'>You must enter your name and email address!</p>";
    echo "<p style='color: red;'>Use the browser's 'Go back' button to return to the Guestbook form</p>";
}
?>
    <a href="guestbookform.php">Add another visitor</a>
    <a href="guestbookshow.php">View guest book</a>
</body>
</html>
