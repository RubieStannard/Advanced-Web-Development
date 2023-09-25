<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Advanced Web Development" />
  <meta name="keywords" content="PHP" />
  <meta name="author" content="Rubie Stannard" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <title>About Page</title>
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
  <h5 style="font-size:18px" class="center padding-32"><span class="tag">ABOUT</span></h5>
<?php
echo "<p><b>1. What is the PHP version installed in Mercury?</b></p>";
  echo "<ul>";
    echo "<li><p>The current PHP version installed in Mercury is ' . phpversion()</p></li>";
  echo "</ul>";
echo "<p><b>2. What tasks have you not attempted or completed?</b></p>";
    echo "<ul>";
      echo "<li><p>Task 2 part of requirement of the closing date initially containing the current date of the server in dd/mm/yy format.</p></li>";
      echo "<li><p>Task 3 requirement 1 of checking if the position ID is unique. </p></li>";
      echo "<li><p>Task 5 almost every requirement since I ran out of time and couldn’t get the search to work.</p></li>";
      echo "<li><p>Task 7 requirement 2 of any value applying if no criteria was selected.</p></li>";
      echo "<li><p>Task 8 of modifying searchjobprocess.php to display the job vacancy from the most future closing date until today’s date.</p></li>";
  echo "</ul>";
echo "<p><b>3. What special features have you done, or attempted, in creating the site that we should know about?</b></p>";
  echo "<ul>";
    echo "<li><p>If a special feature is something I added that was not on the assignment document, then I guess the only special feature would be the header image. The assignment document said we had to add CSS styling, which I did, but it did not say anything about a header image.</p></li>";
  echo "</ul>";
echo "<p><b>4. What discussion points did you participate in on the unit’s discussion board for assignment 1?</b></p>";
  echo "<ul>";
    echo "<li><p>For the discussions for assignment 1, I posted a question asking for clarification on question 3. My question asked what would be considered as a special feature. I recieved a reply saying that anything that I have added that was not asked for would be a special feature. The screenshot for this discussion is added below.</p></li>";
  echo "</ul>";
?>
  <img src="style/discussion_question.png" alt="Discussion Question" width="1000" height="361">
</div>
</div>
<footer>
  <p><em>&copy; 2023 Rubie Stannard. All rights reserved.</em></p>
</footer>
</body>
</html>