<html>
<body>

<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "event_creator");

if (!$con)
{
  die('Could not connect: ');
}

mysqli_select_db($con, "events");

// Insert the comment into the comments table
$sql = "INSERT INTO comments (username, event_id, comment_text, Rating)
		VALUES ('$_SESSION[username]', '$_SESSION[event_id]', '$_POST[comment]', '$_POST[Rating]')";
mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);

mysqli_close($con);
header("location: Events.php");

?>

</body>

</html>

