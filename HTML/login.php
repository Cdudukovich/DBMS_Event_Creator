<?php
// Always start this first
session_start();
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'event_creator'; // Database Name

$_SESSION["LoggedIn"] = true;
$_SESSION["Level"] = "admin";

$myUserName = $_POST['username'];
$myPassword = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$myUserName'";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}
$sql = "SELECT username, first_name, level from users";     
$result1 = mysqli_query($conn, $query);
$count1 = mysqli_num_rows($result1); 
if($count1 == 1)
{
    $query2 = "SELECT password FROM users WHERE username='$myUserName'";

    $result2 = mysqli_query($conn, $query2);
    $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    $hash = $row['password'];
    if ( password_verify( "$myPassword", $hash ) ) 
        {
            #$_SESSION['user_id'] = $user->ID;
            echo " <script>alert('Password is Correct'); window.location.href='events.php'</script>";
        }
        else
        {
            echo " <script>alert('Password is incorrect'); window.location.href='login.html'</script>  ";
        }
}


?>