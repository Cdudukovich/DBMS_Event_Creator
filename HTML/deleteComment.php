<?php
// Always start this first
session_start();
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'event_creator'; // Database Name

$_SESSION["LoggedIn"] = true;
$_SESSION["Level"] = "admin";

// This stores the name of the table entry that was passed in when this script was called
$_SESSION["commentID"] = $_GET['table'];

if($_SESSION['commentID'] == "")
{
      echo " <script>alert('User had no comment for this event.'); window.location.href='detail_View.php'</script>  ";
}

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}

$sql = "DELETE
        FROM comments
        WHERE c_id = '".$_SESSION['commentID']."'";

mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);

echo "<script> window.location.href = 'Events.php'</script>";

?>
