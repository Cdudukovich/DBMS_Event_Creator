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

// Determine if the university exists
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

	// This formats the date time from the form into something that the DB can accept 
	$datetime = $_POST['date'] . ' ' . $_POST['time'];
	$datetime = mysqli_real_escape_string($con, $datetime);
	$datetime = strtotime($datetime);
	$datetime = date('Y-m-d H:i:s',$datetime);

	// Checks if there are events at that same time and location
	$sql = "SELECT * 
			FROM events
			WHERE lat = '$_POST[lat]' AND log = '$_POST[long]' AND event_datetime = '$datetime'";
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($query);
	if($row['name'] == "")
	{
		echo " <script>alert('Event location/time already occupied.'); window.location.href='Events.php'</script>  ";
	}


	$sql="INSERT INTO events (name, description, category, type, phone, email, lat, log, event_datetime)
	VALUES
	('$_POST[name]', '$_POST[comment]', '$_POST[category]', '$_POST[type]', '$_POST[phone]', '$_POST[email]', '$_POST[lat]', '$_POST[long]', '$datetime')";

	mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);	
	
	// Saves the event name and uniname to be used in the insert hosts.php file
	$_SESSION['eventName'] = $_POST['name'];
	$_SESSION['uniName'] = $_POST['universityName'];
	header("insertHosts.php");
}

mysqli_close($con);
header("location: Events.php");

?>

</body>

</html>

