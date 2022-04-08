<?php /*
if (isset($_POST['submit'])) {
  echo "yes received the data";
}
*/ ?>
<?php
if (isset($_POST['submit'])) {
  //echo "yes received the data";
  $user = $_POST['username'];
  $pass = $_POST['password'];
  echo $user . " " . $pass;

  //Validate the form
  if ($user && $pass) {
    echo $user . " " . $pass;
  } else {
    echo "Username and password fields cannot be blank";
  }

  $host = 'db';
  // Database user name
  $dbname = 'loginapp';
  $dbuser = 'root';
  //database user password
  $dbpass = 'lionPass';

  // Check the MySQL connection status
  $conn = new mysqli($host, $dbuser, $dbpass, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {
    echo "Connected to MySQL server successfully!";
  }

  // Create the records inside db
  $query = "INSERT INTO Users(username,password)";
  $query .= "VALUES ('$user', '$pass')";

  $result = mysqli_query($conn, $query);

  if (!$result) {
    die('Query insertion failed');
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP CRUD App</title>
</head>

<body>
  <form action="create.php" method="post">

    <label for="username"> Username </label>
    <input type="text" name="username">
    <label for="password"> Password </label>
    <input type="password" name="password">
    <input type="submit" name="submit" value="Submit">

  </form>
</body>

</html>