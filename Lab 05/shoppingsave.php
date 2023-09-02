<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Rubie" />
    <title>Understanding file functions</title>
    </head>
<body>
<h1>Web Programming - Lab 5</h1>
<?php // read the comments for hints on how to answer each item
if (isset($_POST["itemname"], $_POST["quantity"])) { // check if both form data exists - isset checks whether a variable is set
    $item = $_POST["itemname"]; // obtain the form item data
    $qty = $_POST["quantity"]; // obtain the form quantity data
    $filename = "../../data/shop.txt"; // assumes php file is inside lab05
    $handle = fopen($filename, "a"); // open the file in append mode
    $data = $item . "," . $qty . "\n"; // concatenate item and qty delimited by comma - combine two strings to create one - use . because it's a concatinate operation
    fwrite($handle, $data); // write string to text file - fwrite writes a file
    fclose($handle); // close the text file - fclose closes an open file
    echo "<p>Shopping List</p> "; // generate shopping list
    $handle = fopen($filename, "r"); // open the file in read mode
        while (!feof($handle)) { // loop while not end of file - feof tests for end-of-file
            $data = fgets($handle); // read a line from the text file -  fgets gets line from file pointer
            echo "<p>", $data, "</p>"; // generate HTML output of the data
        }
    fclose($handle); // close the text file - fclose closes an open file
} else { // no input
echo "<p>Please enter item and quantity in the input form.</p>";
}
?>
</body>
</html>