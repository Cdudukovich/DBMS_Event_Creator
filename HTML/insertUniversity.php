<?php
// Always start this first
session_start();
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'event_creator'; // Database Name

$con = mysqli_connect("localhost", "root", "", "event_creator");

if (!$con)

  {

  die('Could not connect: ');

  }

mysqli_select_db($con, "events");

$sql="INSERT INTO university (name, description, location, student_num)
VALUES
('$_POST[name]', '$_POST[description]', '$_POST[location]', '$_POST[numStudents]')";

mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);

$_SESSION['universityName'] = $_POST['name'];

echo "<script> window.location.href = 'university.php'</script>";

?>