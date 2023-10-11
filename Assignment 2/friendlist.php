<?php
session_start(); // Start the session
require_once ("settings.php");
$conn = @mysqli_connect($host, $user, $pswd) or die('Failed to connect to server'); // Connect to mysql server
@mysqli_select_db($conn, $dbnm) or die('Database not available'); // Create database tables within your ‘s<7-digit id number>_db’ database

// Check if the user is logged in
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
  header("Location: login.php");
  exit();
}

// Session information
$user_id = $_SESSION["user_id"];
$email = $_SESSION["email"];
$name = $_SESSION["name"];

// Get the users information
$query_get_user = "SELECT friend_id, num_of_friends FROM friends WHERE friend_email = '$email'";
$results = mysqli_query($conn, $query_get_user);
$row = mysqli_fetch_assoc($results);
$user_id = $row["friend_id"];
$num_of_friend = $row["num_of_friends"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["unfriend"])) {
  $unfriend_id = $_POST["friend_id"];

  // Remove friends from the myfriends list
  $query_remove_friend = "DELETE FROM myfriends WHERE (friend_id1 = $user_id AND friend_id2 = $unfriend_id) OR (friend_id1 = $unfriend_id AND friend_id2 = $user_id)";
  $results = mysqli_query($conn, $query_remove_friend);
  if (!$results) {
    die('Error executing query: ' . mysqli_error($conn));
  }

  // Update the number of friends count
  $query_update_count = "UPDATE friends SET num_of_friends = num_of_friends - 1 WHERE friend_id = $user_id";
  $results = mysqli_query($conn, $query_update_count);
  if (!$results) {
    die('Error executing query: ' . mysqli_error($conn));
  }
}  

// List of current friends arranged by profile name
$query_current_friends = "SELECT f.profile_name, f.friend_id, (SELECT COUNT(*) FROM myfriends mf WHERE mf.friend_id1 = $user_id 
  AND mf.friend_id2 = f.friend_id) AS mutual_friend_count FROM friends f WHERE f.friend_id IN 
  (SELECT mf.friend_id2 FROM myfriends mf WHERE mf.friend_id1 = $user_id) AND f.friend_id != $user_id ORDER BY f.profile_name";
$results = mysqli_query($conn, $query_current_friends);

// Close connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="description" content="Advanced Web Development"/>
  <meta name="keywords" content="PHP"/>
  <meta name="author" content="Rubie Stannard"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <title>Friend List Page</title>
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
      <a href="friendadd.php" class="button block">ADD FRIEND</a>
    </div>
    <div class="col s3">
      <a href="logout.php" class="button block">LOG OUT</a>
    </div>
    <div class="col s3">
      <a href="about.php" class="button block">ABOUT</a>
    </div>
  </div>
</div>
<div style="font-size:18px">
<h5 style="font-size:18px" class="center padding-32"><span class="tag">MY FRIEND SYSTEM</span></h5>
<p style="text-align:center"><b><?php echo $_SESSION["name"] ?>'s Add Friend Page</b></p> <!-- Profile name of the logged user -->
<p style="text-align:center"><b>Total number of friends is <?php echo $num_of_friend ?></b></p> <!-- Number of friends -->
  <div class="container">
<?php
if (mysqli_num_rows($results) > 0) {
  echo "<table width='100%' border='1'>";
  while ($row = mysqli_fetch_assoc($results)) {
    $friend_profile_name = $row["profile_name"];
    $friend_id = $row["friend_id"];
    echo "<tr>";
    echo "<td style='text-align:center'>$friend_profile_name</td>";
    echo "<td style='text-align:center'>";
    echo "<form action='' method='POST'>";
    echo "<input type='hidden' name='friend_id' value='$friend_id'>";
    echo "<button type='submit' name='unfriend'>Unfriend</button>"; // Unfriend button
    echo "</form>";
    echo "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "<p>You have no friends yet</p>";
}
?>
  </div>
</div>
<footer>
  <p><em>&copy; 2023 Rubie Stannard. All rights reserved.</em></p>
</footer>
</body>
</html>