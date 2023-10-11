<?php
session_start(); // Start the session
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
  <title>Login Page</title>
  <style>
    <?php include "style.css" ?>
  </style>
</head>
<body>
<div class="top">
  <div class="row padding black">
    <div class="col s3">
      <a href="index.php" class="button block">HOME</a> <!-- Link to return to home page -->
    </div>
    <div class="col s3">
      <a href="signup.php" class="button block">SIGN UP</a>
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
  <p style="text-align:center"><b>Log In Page</b></p>
<?php
require_once ("settings.php");
$conn = @mysqli_connect($host, $user, $pswd) or die('Failed to connect to server'); // Connect to mysql server
@mysqli_select_db($conn, $dbnm) or die('Database not available'); // Create database tables within your ‘s<7-digit id number>_db’ database

$errors = []; // Initialize error messages

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["email"], $_POST["password"])) {
    $email =  $_POST["email"]; 
    $password = $_POST["password"]; 

    // Check if email is not blank
    if (empty($email)) { // Return error if email is blank
      $errors[] = "<p style='color: red;'>Email is required</p>";
    }

    // Check if password is not blank
    if (empty($password)) { // Return error if password is blank
      $errors[] = "<p style='color: red;'>Password is required</p>";
    }

    // If there are no errors
    if (empty($errors)) {
      // Check if the email exists in the friends table
      $query_check_email = "SELECT friend_id, friend_email, password, profile_name FROM friends WHERE friend_email = '$email'";
      $results = mysqli_query($conn, $query_check_email);
      if (mysqli_num_rows($results) > 0) {
        $row = mysqli_fetch_assoc($results);
        if ($password == $row["password"]) { // Check if password matches the value in friends table
          $_SESSION["email"] = $email;
          $_SESSION["name"] = $row["profile_name"];
          $_SESSION["user_id"] = $row["friend_id"];
          $_SESSION["logged_in"] = true; // Set the session to a successful login in status
          header("Location: friendlist.php"); // Redirect to friendlist
          exit();
        } else {
          $errors[] = "<p style='color: red;'>Invalid password</p>";
        }
      } else {
        $errors[] = "<p style='color: red;'>Email does not exist in the table</p>";
      }
    } else {
      echo "<p style='color: red;'>Error logging in</p>";
    }
  }
  // Close the connection
  mysqli_close($conn);
}
?>
  <div class="container">
<?php
if (!empty($errors)) {
  foreach ($errors as $error) {
    echo $error;
  }
}
?>
<form action="login.php" method="POST"> <!-- POST method for form submission -->
  <div class="container">
    Email:
      <input type="text" name="email" id="email"> <!-- Email input field -->
  </div><br>
  <div class="container">
    Password:
      <input type="password" name="password" id="password"> <!-- Password input field -->
  </div><br>
  <div class="container">
    <label>
      <input style="font-size:15px" class=".btn-float-left" type="submit" name="submit" value="Log in"> <!-- Log in button -->
    </label>
    <label>
      <input style="font-size:15px" class=".btn-float-right" type="reset" name="reset" value="Clear">
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