<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Advanced Web Development" />
  <meta name="keywords" content="PHP" />
  <meta name="author" content="Rubie Stannard" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <title>Home Page</title>
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
  <h5 style="font-size:18px" class="center padding-32"><span class="tag">HOME</span></h5>
<?php
echo "<p>Name: Rubie Stannard</p>";
echo "<p>Student ID: 103982732</p>";
$link = "103982732@student.swin.edu.au";
echo "<p>Email: <a href='.$link.'>103982732@student.swin.edu.au</a></p>";
echo "<p>I declare that this assignment is my individual work. I have not worked collaboratively, nor have I copied from any other student’s work or from any other source.</p>";
echo "<br>";
?>
</div>
</div>
<footer>
  <p><em>&copy; 2023 Rubie Stannard. All rights reserved.</em></p>
</footer>
</body>
</html>