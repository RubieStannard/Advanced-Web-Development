<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Rubie" />
    <title>Understanding string functions</title>
</head>
<body>
<h1>Web Programming - Lab 4</h1>
<?php // read the comments for hints on how to answer each item
    if (isset ($_POST["string"])){ // check if form data exists
        $str = $_POST["string"]; // obtain the form data
        $pattern = "/^[A-Za-z ]+$/"; // set regular expression pattern
        if (preg_match($pattern,$str)) { // check if $str with regular expression preg_match performs a regular expression match (Perl compatible regular expression functions), $pattern is the regular expression
            $ans = ""; // initialise variable for the answer
            $len = strlen($str); // returns the length of the given $str
            for ($i = 0; $i < $len; $i++) { // checks all characters in $str
                $letter = substr ($str, $i, 1); // extract 1 char using substr
                if ((strpos ("AEIOUaeiou", $letter)) === false){ // check using strops, is_numeric is used as strops returns a number. (position) if found, and false otherwise
                    $ans = $ans . $letter; // concatenate letter to answer
                }
            }
            echo "<p>The word with no vowels is ", $ans, ".</p>"; // generate answer after all letters are checked
        }
        else {
            echo "<p>Please enter a string containing only letters or space.</p>"; // string contains invalid characters
        }   
    } else {
        echo "<p>Please enter string from the input form.</p>"; // no input
    }
?>
</body>
</html>
