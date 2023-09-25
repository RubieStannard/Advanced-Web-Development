<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
  <meta name="description" content="Advanced Web Development" />
  <meta name="keywords" content="PHP" />
  <meta name="author" content="Rubie Stannard" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <title>Process Job Vacancy Data</title>
  <style>
    <?php include "style.css" ?>
  </style>
</head>
<body>
<!-- Navigation bar -->
<div class="top">
  <div class="row padding black">
    <div class="col s3">
      <a href="index.php" class="button block">HOME</a>
    </div>
    <div class="col s3">
      <a href="postjobform.php" class="button block">POST</a>
    </div>
    <div class="col s3">
      <a href="searchjobform.php" class="button block">SEARCH</a>
    </div>
    <div class="col s3">
      <a href="about.php" class="button block">ABOUT</a>
    </div>
  </div>
</div>
<!-- Header image -->
<header class="img display-container">
  <div class="display-middle center">
    <span style="font-size:60px; color:black">Job Vacancy<br>Posting System</span>
  </div>
</header>
<div style="font-size:18px"> <!-- Added large text to the whole page -->
<!-- Title -->
<div class="container">
  <h5 style="font-size:18px" class="center padding-32"><span class="tag">POST JOB PROCESS</span></h5>
<?php
if (isset($_POST["submit"])) { // check the data if it has submitted fully
  if(!empty($_POST["submit"])) { // check the data if it is empty
    $positionid = $_POST["positionid"]; // obtain the form position ID data
    $title = $_POST["title"]; // obtain the form title data
    $description = $_POST["description"]; // obtain the form description data
    $closingdate = $_POST["closingdate"]; // obtain the form closing date data
    $position = $_POST["position"]; // obtain the form position data
    $contract = $_POST["contract"]; // obtain the form contract data
    $applicationby = $_POST["applicationby"]; // obtain the form application by data
    $location = $_POST["location"]; // obtain the form location data
    if (preg_match("/[P]{1}\d{4}/", $positionid) && preg_match("/^[a-zA-Z0-9,.! ]/", $title) == false) { // set regular expression pattern
      echo "<p style='color: red;'>The position ID must start with PID, followed by 4 digits and be 7 characters long.</p>"; // error message
      echo "<p style='color: red;'>The title can only contain a maximum of 20 characters, including spaces, comma, periods, and exclamation points. Other symbols are not allowed.</p>"; // error message
    } 
    $filename = "../../data/jobposts/jobs.txt";
    umask(0007);
    $dir = "../../data/jobposts";
    // mkdir($dir, 02770);
    $data = $positionid . "\t" . $title . "\t" . $description . "\t" . $closingdate . "\t" . $position . "\t" . $contract . "\t" . $applicationby . "\t" . $location . "\r\n"; // concatenate the data
    $handle = fopen($filename, "a+"); // open the file in append mode
    if (!is_writable($filename) == false) { // is_writebale tells whether the filename is writable
      echo "<p>Cannot write to file</p>";
      echo '<a href="postjobform.php">Go back</a>';
    } else {
      if (fwrite($handle, $data) == true) { // write string to text file - fwrite writes a file if there's data checks if write worked
        echo "<p>Your job vacancy has been submitted.</p>"; // write work
      } else {
        echo "<p style='color: red;'>Your job vacancy could not be posted.</p>"; // write fails
      }
    }
    fclose($handle); // close the text file - fclose closes an open file
  } else { // no input
    echo "<p style='color: red;'>All fields are required.</p>";
    echo "<p style='color: red;'>Use the browser's 'Go back' button to return to the Post Job Form</p>";
  }
}
?>
</div>
</div>
<footer>
  <p><em>&copy; 2023 Rubie Stannard. All rights reserved.</em></p>
</footer>
</body>
</html>