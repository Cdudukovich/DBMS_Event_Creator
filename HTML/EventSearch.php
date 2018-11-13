<?php
// Always start this first
session_start();
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'event_creator'; // Database Name

// Saves the input search value into a session variable then calls the event script to update the query
$_SESSION["search"] = $_POST['searchVal'];

echo "<script> window.location.href = 'events.php'</script>";

?>