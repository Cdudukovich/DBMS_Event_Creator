<html>
<body>

<?php

$con = mysqli_connect("localhost", "root", "");

if (!$con)

  {

  die('Could not connect: ');

  }

mysqli_select_db($con, "test");

$password_string = mysqli_real_escape_string($con, '$_POST[password]');
// The value of $password_hash
// should similar to the following:
// $2y$10$aHhnT035EnQGbWAd8PfEROs7PJTHmr6rmzE2SvCQWOygSpGwX2rtW
$password_hash = password_hash($password_string, PASSWORD_BCRYPT);



$sql="INSERT INTO users (Username, Password, ID, Name)
VALUES
('$_POST[username]','$password_hash', '34344', '$_POST[name]')";

if (!mysqli_query($con, $sql))

  {

  die('Error: ');

  }

echo "1 record added";

mysqli_close($con)

?>

</body>

</html>

