<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Advanced Web Development" />
  <meta name="keywords" content="PHP" />
  <meta name="author" content="Rubie Stannard" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <title>Search Job Vacancy Page</title>
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
  <h5 style="font-size:18px" class="center padding-32"><span class="tag">SEARCH JOB FORM</span></h5>
<!-- Form -->
<form action="searchjobprocess.php" method="GET">
  <div class="container">
    Job title:
      <input type="text" name="jobtitle" id="jobtitle" maxlength="20" required="required">
  </div><br>
  <div class="container">
    Position:
      <input type="radio" name="position" id="position" value="Full Time"/>Full time
      <input type="radio" name="position" id="position" value="Part Time"/>Part time
  </div><br>
  <div class="container">
    Contract:
      <input type="radio" name="contract" id="contract" value="Ongoing"/>Ongoing
      <input type="radio" name="contract" id="contract" value="Fixed Term"/>Fixed term
  </div><br>
  <div class="container">
    Application by:
      <label>
        <input type="checkbox" name="applicationby[]" id="applicationby[]" value="Post">Post
      </label>
      <label>
        <input type="checkbox" name="applicationby[]" id="applicationby[]" value="Email">Email
      </label>
  </div><br>
  <div class="container">
    <label for="location">Location:</label>
      <select name="location" id="location" value="State">
        <option disabled selected value>---</option> <!-- The initial 3 dashes can't be selected -->
        <option value="ACT">ACT</option>
        <option value="NSW">NSW</option>
        <option value="NT">NT</option>
        <option value="QLD">QLD</option>
        <option value="SA">SA</option>
        <option value="TAS">TAS</option>
        <option value="VIC">VIC</option>
        <option value="WA">WA</option>
      </select>
  </div><br>
  <div class="container">
    <label>
      <input class=".btn-float-left" type="submit" name="search" id="search" value="Search">
    </label>
  </div><br>
</form>
</div>
</div>
<footer>
  <p><em>&copy; 2023 Rubie Stannard. All rights reserved.</em></p>
</footer>
</body>
</html>