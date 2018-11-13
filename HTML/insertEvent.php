<html>
<body>

<?php
include('insertHosts.php');
session_start();
$con = mysqli_connect("localhost", "root", "", "event_creator");

if (!$con)

  {

  die('Could not connect: ');

  }

// Determine if the univeristy exists
$unisql = "SELECT *
			 FROM university
			 WHERE name = '$_POST[universityName]'";
$query = mysqli_query($con, $unisql);
if(!$query) 
{
	die ('SQL Error: ' . mysqli_error($con));
}
$row = mysqli_fetch_array($query);

if($row['name'] != "") // University does exist
{
	// Add event to events
	mysqli_select_db($con, "events");
	$datetime = $_POST['date'] . ' ' . $_POST['time'];
	$datetime = mysqli_real_escape_string($con, $datetime);
	$datetime = strtotime($datetime);
	$datetime = date('Y-m-d H:i:s',$datetime);
	$sql="INSERT INTO events (name, description, category, type, phone, email, lat, log, event_datetime)
	VALUES
	('$_POST[name]', '$_POST[comment]', '$_POST[category]', '$_POST[type]', '$_POST[phone]', '$_POST[email]', '$_POST[lat]', '$_POST[long]', '$datetime')";

	mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);	
	
	$_SESSION['eventName'] = $_POST['name'];
	$_SESSION['uniName'] = $_POST['universityName'];
	header("insertHosts.php");
	echo 'alert(message successfully sent)'; 
	//header("insertHosts.php");
}

mysqli_close($con);
//header("location: Events.php");

?>

</body>

</html>

