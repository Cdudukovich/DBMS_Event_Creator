<html>
<body>

<?php

$con = mysqli_connect("localhost", "root", "", "event_creator");

if (!$con)

  {

  die('Could not connect: ');

  }

mysqli_select_db($con, "events");


$sql="INSERT INTO events (name, description, category, type, phone, email, date_of_event, event_time)
VALUES
('$_POST[name]', '$_POST[description]', '$_POST[category]', '$_POST[type]', '$_POST[phone]', '$_POST[email]', '$_POST[date]', '$_POST[time]')";

mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);


mysqli_close($con);
header("location: Events.php");

?>

</body>

</html>

