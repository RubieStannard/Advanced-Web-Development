<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="description" content="Advanced Web Development"/>
  <meta name="keywords" content="PHP"/>
  <meta name="author" content="Rubie Stannard"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <title>About Page</title>
  <style>
    <?php include "style.css" ?>
  </style>
</head>
<body>
<div class="top">
  <div class="row padding black">
    <div class="col s3">
      <a href="index.php" class="button block">HOME</a> <!-- Link to home -->
    </div>
    <div class="col s3">
      <a href="friendadd.php" class="button block">ADD FRIEND</a> <!-- Link toadd friends -->
    </div>
    <div class="col s3">
      <a href="friendlist.php" class="button block">FRIEND LIST</a> <!-- Link to friend list -->
    </div>
    <div class="col s3">
      <a href="about.php" class="button block">ABOUT</a>
    </div>
  </div>
</div>
<div style="font-size:18px">
  <h5 style="font-size:18px" class="center padding-32"><span class="tag">MY FRIEND SYSTEM</span></h5>
  <div class="container">
<?php
echo "<p><b>1. What tasks have you not attempted or completed?</b></p>";
    echo "<ul>";
      echo "<li><p>I attempted and completed all of the tasks.</p></li>";
  echo "</ul>";
echo "<p><b>2. What special features have you done, or attempted, in creating the site that we should know about?</b></p>";
  echo "<ul>";
    echo "<li><p>No special features have been done or attempted.</p></li>";
  echo "</ul>";
echo "<p><b>3. Which parts did you have trouble with?</b></p>";
  echo "<ul>";
    echo "<li><p>Even though I understood what code I needed to use, getting errors and trying to find the problem made everything difficult.</p></li>";
  echo "</ul>";
echo "<p><b>4. What would you like to do better next time?</b></p>";
  echo "<ul>";
    echo "<li><p>I would like to have a better looking website, and I would like everything to function better.</p></li>";
  echo "</ul>";
echo "<p><b>5. What additional features did you add to the assignment?</b></p>";
  echo "<ul>";
    echo "<li><p>I added settings.php so I could reference the connection information.</p></li>";
  echo "</ul>";
echo "<p><b>6. A screen shot of a discussion response that answered someone’s thread in the unit’s discussion board for Assignment 2.</b></p>";
  echo "<ul>";
    echo "<li><p>I can't add a screenshot since I didn't answer any questions.</p></li>";
  echo "</ul>";
?>
  </div>
</div>
<footer>
  <p><em>&copy; 2023 Rubie Stannard. All rights reserved.</em></p>
</footer>
</body>
</html>