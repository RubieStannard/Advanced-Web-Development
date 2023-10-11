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
  <title>Sign Up Page</title>
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
      <a href="login.php" class="button block">LOG IN</a>
    </div>
    <div class="col s3">
      <a href="logout" class="button block">LOG OUT</a>
    </div>
    <div class="col s3">
      <a href="about.php" class="button block">ABOUT</a>
    </div>
  </div>
</div>
<div style="font-size:18px">
  <h5 style="font-size:18px" class="center padding-32"><span class="tag">MY FRIEND SYSTEM</span></h5>
  <p style="text-align:center"><b>Registration Page</b></p>
<?php
require_once ("settings.php");
$conn = @mysqli_connect($host, $user, $pswd) or die('Failed to connect to server'); // Connect to mysql server
@mysqli_select_db($conn, $dbnm) or die('Database not available'); // Create database tables within your ‘s<7-digit id number>_db’ database

$errors = []; // Initialize error messages

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["email"], $_POST["name"], $_POST["password"], $_POST["confirmpassword"])) {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    // Check if email matches requirements and is not blank
    if (empty($email) || !preg_match("/^[a-zA-Z0-9.]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/", $email)) { // Return error if email is blank OR (||) it doesn't match
      $errors[] = "<p style='color: red;'>Email is required. Please enter a valid email</p>";
    }

    // Check if profile name matches requirements and is not blank
    if (empty($name) || !preg_match("/^[a-zA-Z ]+$/", $name)) { // Return error if profile name is blank OR (||) it doesn't match
      $errors[] = "<p style='color: red;'>Profile name is required. It can only contain letters</p>";
    }

    // Check if password matches requirements and is not blank
    if (empty($password) || !preg_match("/^[a-zA-Z0-9]+$/", $password)) { // Return error if password is blank OR (||) it doesn't match
      $errors[] = "<p style='color: red;'>Password is required. It can only contain letters and numbers</p>";
    }

    // Check if passwords match
    if ($password !== $confirmpassword) { // Return error if passwords aren't identical
      $errors[] = "<p style='color: red;'>Passwords don't match</p>";
    }

    // Check if the email is already in the table
    $query_check_email = "SELECT * FROM friends WHERE friend_email = '$email'";
    $results = mysqli_query($conn, $query_check_email );
    if (mysqli_num_rows($results) > 0) {
      $errors[] = "<p>Email already exists</p>"; 
    } else {
      $row = mysqli_fetch_row($results);
    }
    
    // If there are no errors
    if (empty($errors)) {
      // Add the data into the friends table
      $query_add_data = "INSERT INTO friends (friend_email, password, profile_name, date_started, num_of_friends) VALUES ('$email', '$password', '$name', CURDATE(), 0)"; // CURDATE() inserts current date, and 0 is the number of friends
      $results = mysqli_query($conn, $query_add_data);
      if ($results) {
        $_SESSION["email"] = $email; // Set the session variable
        $_SESSION["name"] = $name; // Set the session variable
        $_SESSION["logged_in"] = true; // Set the session to a successful login in status
        header("Location: friendadd.php"); // Redirect to friendadd.php
        exit();
      } else {
        $errors[] = "<p style='color: red;'>Error registering</p>";
      }
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
<form action="signup.php" method="POST"> <!-- POST method for form submission -->
  <div class="container">
    Email:
      <input type="text" name="email" id="email"> <!-- Email input field -->
  </div><br>
  <div class="container">
    Profile name:
      <input type="text" name="name" id="name"> <!-- Profile name input field -->
  </div><br>
  <div class="container">
    Password:
      <input type="password" name="password" id="password"> <!-- Password input field -->
  </div><br>
  <div class="container">
    Confirm password:
      <input type="password" name="confirmpassword" id="confirmpassword"> <!-- Confirm password input field -->
  </div><br>
  <div class="container">
    <label>
      <input style="font-size:15px" class=".btn-float-left" type="submit" name="submit" value="Register"> <!-- Register button -->
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
