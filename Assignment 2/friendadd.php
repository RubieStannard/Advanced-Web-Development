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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addfriend"])) {
  $new_friend_id = $_POST["friend_id"];
  
  // Add friends to the friend list
  $query_add_friend = "INSERT INTO myfriends (friend_id1, friend_id2) VALUES ($user_id, $new_friend_id)";
  $results = mysqli_query($conn, $query_add_friend);
  if (!$results) {
    die('Error executing query: ' . mysqli_error($conn));
  }

  // Update the number of friends count
  $query_update_count = "UPDATE friends SET num_of_friends = num_of_friends + 1 WHERE friend_id = $user_id";
  $results = mysqli_query($conn, $query_update_count);
  if (!$results) {
    die('Error executing query: ' . mysqli_error($conn));
  }
}   

// Pagination
$current_page = isset($_GET["page"]) ? $_GET["page"] : 1; // Get the current page number from the query string
$limit = 5; // Limit to only 5 names per page
$offset = ($current_page - 1) * $limit; // Calculate the offset

// List of registered users arranged by profile name
$query_registered_users = "SELECT f.profile_name, f.friend_id, (SELECT COUNT(*) FROM myfriends mf WHERE mf.friend_id1 = $user_id 
  AND mf.friend_id2 = f.friend_id) AS mutual_friend_count FROM friends f WHERE f.friend_id NOT IN (SELECT mf.friend_id2 
  FROM myfriends mf WHERE mf.friend_id1 = $user_id) AND f.friend_id != $user_id ORDER BY f.profile_name LIMIT $limit OFFSET $offset";
$results = mysqli_query($conn, $query_registered_users);

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
  <title>Friend Add Page</title>
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
      <a href="friendlist.php" class="button block">FRIEND LIST</a> <!-- Link to friend list -->
    </div>
    <div class="col s3">
      <a href="logout.php" class="button block">LOG OUT</a> <!-- Link to log out -->
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
    $mutual_friend_count = $row["mutual_friend_count"];
    $friend_id = $row["friend_id"];
    echo "<tr>";
    echo "<td style='text-align:center'>$friend_profile_name</td>";
    echo "<td style='text-align:center'>$mutual_friend_count</td>";
    echo "<td style='text-align:center'>";
    echo "<form action='' method='POST'>";
    echo "<input type='hidden' name='friend_id' value='$friend_id'>";
    echo "<button type='submit' name='addfriend'>Add as friend</button>"; // Add friend button
    echo "</form>";
    echo "</td>";
    echo "</tr>";
  }
  echo "</table>";
  $prev_page = $current_page - 1;
  $next_page = $current_page + 1;
} else {
  echo "<p>No users available to add as friends</p>";
}
?>
<div class="pagination">
  <?php if ($current_page > 1): ?>
    <div class="btn-left">
      <button style="font-size:15px"><a href='friendadd.php?page=<?php echo $prev_page; ?>'>Previous</a></button> <!-- Previous link -->
    </div>
  <?php endif; ?>
  <?php if (mysqli_num_rows($results) >= $limit): ?>
    <div class="btn-right">
      <button style="font-size:15px"><a href='friendadd.php?page=<?php echo $next_page; ?>'>Next</a></button> <!-- Next link -->
    </div>
  <?php endif; ?>
</div>
  </div>
</div>
<footer>
  <p><em>&copy; 2023 Rubie Stannard. All rights reserved.</em></p>
</footer>
</body>
</html>