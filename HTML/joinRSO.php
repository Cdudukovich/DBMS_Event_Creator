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

// Set needed values.
$username = $_SESSION['username'];
$rsoName = $_GET['table'];

// Query the database to see if the user is already in the RSO.
$sql1 = "SELECT *
        FROM aff2
        WHERE username = '".$_SESSION['username']."'";
$query1 = mysqli_query($conn, $sql1);
$rowcount = mysqli_num_rows($query1);

if($rowcount === 0) //The user is not already in the RSO
{
	// Create new affiliation
	$sql2 = "INSERT INTO aff2 (username, name, type)
			VALUES ('$username', '$rsoName', 2)";
	$query2 = mysqli_query($conn, $sql2);

	if (!$query2) 
	{
		die ('SQL Error: ' . mysqli_error($conn));
	}
}
else // Cannot join an RSO you are already in
{
	echo " <script>alert('You're already a member of this RSO.'); window.location.href='RSO.php'</script>  ";
}

echo "<script> window.location.href = 'RSO.php'</script>";

?>