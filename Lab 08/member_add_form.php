<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="description" content="Web application development" />
 <meta name="keywords" content="PHP" />
 <meta name="author" content="Rubie" />
 <title>Add New Member</title>
</head>
<body>
<h1>Web Programming - Lab08</h1>
<form action="member_add.php" method="POST">
    <label for="fname">First Name:</label>
    <input type="text" name="fname">
    <br> <!--Break-->
    <label for="lname">Last Name:</label>
    <input type="text" name="lname">
    <br> <!--Break-->
    <label for="gender">Gender:</label>
    <input type="text" name="gender" maxlength="1">
    <br> <!--Break-->
    <label for="email">Email:</label>
    <input type="text" name="email">
    <br> <!--Break-->
    <label for="phone">Phone:</label>
    <input type="text" name="phone">
    <br> <!--Break-->
    <button type="submit" value="submit">Add Member</button>
</form>
</body>
</html>