<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Advanced Web Development" />
  <meta name="keywords" content="PHP" />
  <meta name="author" content="Rubie Stannard" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <title>Process Job Vacancy Search Data</title>
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
  <h5 style="font-size:18px" class="center padding-32"><span class="tag">JOB VACANCY INFORMATION</span></h5>
<?php
if (isset($_GET["search"])) { // check the data if it has submitted fully
  $search = $_GET["search"]; // obtain the form data
  $search = (string)$search;
  $results = false;
  $filename = "../../data/jobposts/jobs.txt";
  umask(0007);
  $dir = "../../data/jobposts";
  // mkdir($dir, 02770);
  if(!empty($_GET["search"])) { // check the data if it is empty
    $jobtitle = $_GET["jobtitle"]; // obtain the form job title data
    $description = $_GET["description"]; // obtain the form description data
    $closingdate = $_GET["closingdate"]; // obtain the form closing date data
    $position = $_GET["position"]; // obtain the form position data
    $contract = $_GET["contract"]; // obtain the form contract data
    $applicationby = $_GET["applicationby"]; // obtain the form application by data
    $location = $_GET["location"]; // obtain the form location data
    if (is_readable($filename)) {
      $alldata = array();
      $handle = fopen($filename, "r");
      while (!feof($handle) ) {
        $onedata = fgets($handle);
        if ($onedata != "") {
          $data = explode("\t", $onedata); // explode string to array
          $alldata[] = $data;
          $jobtitle = $data[0];
          $description = $data[1];
          $closingdate = $data[2];
          $position = $data[3];
          $contract = $data[4];
          $applicationby = $data[5];
          $location = $data[6];
          echo "<p>Job title: $jobtitle</p>";
          echo "<p>Description: $description \n</p>";
          echo "<p>Closing date: $closingdate \n</p>";
          echo "<p>Position: $position \n</p>";
          echo "<p>Contract: $contract \n</p>";
          echo "<p>Application by: $applicationby \n</p>";
          echo "<p>Location: $location \n </p>";
        }
      }
      fclose($handle);
    } else {
      echo "<p>This file doesn't exist.</p>";
    }
  } else {
  echo "<p>Job title is empty. Please enter a job title.</p>";
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