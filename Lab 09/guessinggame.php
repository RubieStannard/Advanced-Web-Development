<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Rubie" />
    <title>Guessing Game</title>
</head>
<body>
<h1>Web Programming - Lab09</h1>
<h2>Guessing Game</h2>
<p>Enter a number between 1 and 100, then press the Guess button.</p>
<form action="guessinggame.php" method="POST">
    <input type="text" name="guess" id="guess">
    <button type="submit" value="submit">Guess</button>
</form>
<?php
session_start();
if (!isset($_SESSION["randNum"])) { // check if session variable exists
    $_SESSION["randNum"] = rand(1, 100); // rand() generates a random integer between 1 and 100
    $_SESSION["guessNum"] = 0; // initialize the guess count
}
$randNum = $_SESSION["randNum"]; // copy the value to a variable
$guessNum = $_SESSION["guessNum"]; // copy the value to a variable

if (isset($_POST["guess"])) {
    if ($_POST["guess"] < 1 or $_POST["guess"] > 100) { // if the guess is lower than 1 or higher than 100
        echo "<p>Please enter a number between 1 and 100.</p>";
    } else {
        if ($_POST["guess"] == $randNum) { // if the guess is equal to the random number
            echo "<p style='color: green;'>Congratulations! You guessed the hidden number!</p>";
        } else {
            echo "<p style='color: red;'>You didn't guess the hidden number.</p>";
        }
    }
} else {
    echo "<p>Please enter a number between 1 and 100.</p>";
}
echo "<p>Number of guesses: $guessNum.</p>";
$guessNum++; // increment the value
$_SESSION["guessNum"] = $guessNum; // update the session variable
?>
    <p><a href="giveup.php">Give Up</a></p>
    <p><a href="startover.php">Start Over</a></p>
</body>
</html>