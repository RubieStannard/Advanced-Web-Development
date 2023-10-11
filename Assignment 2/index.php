<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="description" content="Advanced Web Development"/>
  <meta name="keywords" content="PHP"/>
  <meta name="author" content="Rubie Stannard"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <title>Assignment Home Page</title>
  <style>
    <?php include "style.css" ?>
  </style>
</head>
<body>
<div class="top">
  <div class="row padding black">
    <div class="col s3">
      <a href="index.php" class="button block">HOME</a>
    </div>
    <div class="col s3">
      <a href="signup.php" class="button block">SIGN UP</a> <!-- Sign up hyperlink -->
    </div>
    <div class="col s3">
      <a href="login.php" class="button block">LOG IN</a> <!-- Log in hyperlink -->
    </div>
    <div class="col s3">
      <a href="about.php" class="button block">ABOUT</a> <!-- About hyperlink -->
    </div>
  </div>
</div>
<div style="font-size:18px"> 
  <h5 style="font-size:18px" class="center padding-32"><span class="tag">MY FRIEND SYSTEM</span></h5>
  <p style="text-align:center"><b>Assignment Home Page</b></p>
  <div class="container">
<?php
echo "<p>Name: Rubie Stannard</p>";
echo "<p>Student ID: 103982732</p>";
$link = "103982732@student.swin.edu.au";
echo "<p>Email: <a href='.$link.'>103982732@student.swin.edu.au</a></p>";
echo "<p>I declare that this assignment is my individual work. I have not worked collaboratively, nor have I copied from any other student’s work or from any other source.</p>"; // Statement
echo "<br>";
?>
<?php
require_once ("settings.php");
$conn = @mysqli_connect($host, $user, $pswd) or die('Failed to connect to server'); // Connect to mysql server
@mysqli_select_db($conn, $dbnm) or die('Database not available'); // Create database tables within your ‘s<7-digit id number>_db’ database

// Create friends table if it doesn't currently exist in the database 
$table1 = "CREATE TABLE IF NOT EXISTS friends (
  friend_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  friend_email VARCHAR(50) NOT NULL,
  password VARCHAR(20) NOT NULL,
  profile_name VARCHAR(30) NOT NULL,
  date_started DATE NOT NULL,
  num_of_friends INT UNSIGNED NOT NULL
)";

// Create myfriends table if it doesn't currently exist in the database 
$table2 = "CREATE TABLE IF NOT EXISTS myfriends (
  friend_id1 INT NOT NULL,
  friend_id2 INT NOT NULL
  CHECK (friend_id1 <> friend_id2)
)";

if (mysqli_query($conn, $table1) && mysqli_query($conn, $table2)) { 
  echo "<p style='color: green;'>Successfully created tables</p>"; // Message to indicate the success in creating the table
} else {
  echo "<p style='color: red;'>Error creating tables</p>"; // Message to indicate the failure in creating the table
}

$query_check_friends = "SELECT * FROM friends"; // Check if friends table is empty
$results = mysqli_query($conn, $query_check_friends);
if (mysqli_num_rows($results) > 0) { // Returns the number of rows that have more than 0 data in the result set 
  echo "<p>The friends table already has data</p>";
} else { // Populate the friends table with 10 sample records
  $query_insert_friends = "INSERT INTO friends (friend_email, password, profile_name, date_started, num_of_friends) VALUES
    ('undeadlegion8@gmail.com', 'Farr0nK33p', 'Abyss Watchers', '2023-03-24', 6),
    ('demonssouls53@gmail.com', 'DirtyColossus3055', 'Maiden Astraea', '2023-02-05', 9),
    ('darkeater2016@outlook.com', 'The0Ringed0City', 'Darkeater Midir', '2023-03-28', 3),
    ('theroyalaegis@outlook.com', 'bellhammer34', 'Velstadt Aegis', '2023-06-18', 7),
    ('lordofcinder25@gmail.com', 'First1000Flame', 'Lord Gwyn', '2023-09-22', 5),
    ('aota12@yahoo.com', 'Gr3yW0lfS1f', 'Artorias Abysswalker', '2023-10-23', 1),
    ('ladymaria@outlook.com', '24TOH1114081', 'Lady Maria', '2023-12-09', 10),
    ('sira80@outlook.com', 'DS2katana80000', 'Sir Alonne', '2023-08-26', 2),
    ('eldenring@yahoo.com', 'elden22rememberance127', 'Elden Beast', '2023-05-13', 4),
    ('martyr9081@gmail.com', '256forsakencainhurst', 'Martyr Logarius', '2023-04-17', 8)";

  if (mysqli_query($conn, $query_insert_friends)) { 
    echo "<p style='color: green;'>Successfully added friends data</p>"; // Message to indicate the success in inserting the records
  } else {
    echo "<p style='color: red;'>Error adding friends data</p>"; // Message to indicate the failure in inserting the records
  }
}

$query_check_myfriends = "SELECT * FROM myfriends"; // Check if myfriends table is empty
$results = mysqli_query($conn, $query_check_myfriends);
if (mysqli_num_rows($results) > 0) { // Returns the number of rows that have more than 0 data in the result set 
  echo "<p>The myfriends table already has data</p>";
} else { // Populate the myfriends table with 20 sample records
  $query_insert_myfriends = "INSERT INTO myfriends (friend_id1, friend_id2) VALUES
    (3, 9), (1, 3), (3, 5), (2, 3), (3, 6), 
    (5, 7), (1, 8), (6, 7), (4, 8), (7, 9), 
    (8, 10), (4, 5), (3, 7), (5, 8), (6, 8), 
    (2, 10), (3, 9), (6, 10), (7, 8), (2, 9)";

  if (mysqli_query($conn, $query_insert_myfriends)) { 
    echo "<p style='color: green;'>Successfully added myfriends data</p>"; // Message to indicate the success in inserting the records
  } else {
    echo "<p style='color: red;'>Error adding myfriends data</p>"; // Message to indicate the failure in inserting the records
  }
}
// Close connection
mysqli_close($conn);
?>
  </div>
</div>
<footer>
  <p><em>&copy; 2023 Rubie Stannard. All rights reserved.</em></p>
</footer>
</body>
</html>