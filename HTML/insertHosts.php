<?php
session_start();
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'event_creator'; // Database Name
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) 
{
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$unisql = "SELECT *
			 FROM events
			 WHERE name = '".$_SESSION['eventName']."'";
			 
$query = mysqli_query($conn, $unisql);
if(!$query) 
{
	die ('SQL Error: ' . mysqli_error($conn));
}
$row = mysqli_fetch_array($query);
$eventID = (int)$row['id'] + 1;
$uniName = $_SESSION['uniName'];

// Create new affiliation
$sql2 = "INSERT INTO hosts (id, name)
		VALUES ('$eventID', '$uniName')";
$query2 = mysqli_query($conn, $sql2);

if (!$query2) 
{
	die ('SQL Error: ' . mysqli_error($conn));
}
header("location: Events.php");

//echo "<script> window.location.href = 'Events.php'</script>";

?>