<html>
<body>

<?php

$con = mysqli_connect("localhost", "root", "", "event_creator");
if (!$con)
  {
  die('Could not connect: ');
  }

mysqli_select_db($con, "users");

// Hashes thes password to promote security 
$password_string = mysqli_real_escape_string($con, $_POST[password]);
$password_hash = password_hash($password_string, PASSWORD_DEFAULT);


$sql="INSERT INTO users (first_name, last_name, username, password, level, email)
VALUES
('$_POST[first_name]', '$password_string', '$_POST[username]', '$password_hash', '$_POST[level]', '$_POST[email]')";

mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);


mysqli_close($con);
header("location: login.html");

?>

</body>

</html>

