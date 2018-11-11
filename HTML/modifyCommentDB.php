<?php
// Always start this first
session_start();
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'event_creator'; // Database Name

$_SESSION["LoggedIn"] = true;
$_SESSION["Level"] = "admin";

$user_level = $_SESSION['level'];

$con = mysqli_connect("localhost", "root", "", "event_creator");
mysqli_select_db($con, "comments");

$sql = "UPDATE comments
		SET comment_text = '".$_POST['description']."'
		WHERE username = '".$_SESSION['username']."'
			AND c_id = '".$_SESSION['commentID']."'";  


mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);

echo "<script> window.location.href = 'Events.php'</script>";

?>