<?php
// Always start this first
session_start();
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'event_creator'; // Database Name
if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) 
    {
        // Getting submitted user data from database
        $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
        $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
    	$user = $result->fetch_object();
        
    	// Verify user password and set $_SESSION
    	if ( password_verify( $_POST['password'], $user->password ) ) 
        {
    		$_SESSION['user_id'] = $user->ID;
            echo " <script>alert('Password is Correct'); window.location.href='login.html'</script>";
    	}
        else
        {
            echo " <script>alert('Password is incorrect'); window.location.href='login.html'</script>  ";
        }
    }
}
?>