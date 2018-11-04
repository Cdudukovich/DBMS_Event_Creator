<?php
// Always start this first
session_start();
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'event_creator'; // Database Name

$_SESSION["LoggedIn"] = true;
$_SESSION["Level"] = "admin";

$rsoName = $_POST['rsoName'];
$rsoDescription = $_POST['rsoDescription'];

//$_SESSION["username"] = $myUserName;

$user_level = $_SESSION['level'];

/*
$query = "SELECT * FROM users WHERE username = '$myUserName'";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}
*/

// Students cannot create RSOs
if($user_level != 0)
{
    $sql = "SELECT name, description from rso";     

    $sql="INSERT INTO rso (name, description)
    VALUES
    ('$_POST[rsoName]', '$_POST[rsoDescription]')";

    mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);
}
else
{
    //echo " <script>alert('Error: Students cannot create RSOs'); ";
}

echo "<script> window.location.href = 'rso.php'</script>";

?>