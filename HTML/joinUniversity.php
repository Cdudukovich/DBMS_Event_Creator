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

$username = $_SESSION['username'];
$uniName = $_GET['table'];
$_SESSION['uniName'] = $uniName;

// Delete old affiliation
$sql1 = "DELETE
        FROM aff1
        WHERE username = '".$_SESSION['username']."'";
if($sql1)
{
	$query1 = mysqli_query($conn, $sql1);
}

// Create new affiliation
$sql2 = "INSERT INTO aff1 (name, username)
		VALUES ('$uniName', '$username')";
$query2 = mysqli_query($conn, $sql2);

/*
// Check if there is an old affiliation
$sql1 = "SELECT count(*)
        FROM aff1
        WHERE username = '".$_SESSION['username']."'";
if($sql1 == 0)
{
	$sql2 = "INSERT INTO aff1 (name, username)
			VALUES ('$uniName', '$username')";
	$query2 = mysqli_query($conn, $sql2);
}
else
{
	$sql2 = "UPDATE aff1
			SET name = '".$_GET['table']."'
			WHERE username = '".$_SESSION['username']."'";
	$query2 = mysqli_query($conn, $sql2);
}
*/

if (!$query2) 
{
	die ('SQL Error: ' . mysqli_error($conn));
}


echo "<script> window.location.href = 'university.php'</script>";

?>