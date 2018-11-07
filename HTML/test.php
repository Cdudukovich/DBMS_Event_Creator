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

$event = $_GET['table'];

$sql = "SELECT * from events where name = '$event'";

$query = mysqli_query($conn, $sql);

if (!$query) 
{
	die ('SQL Error: ' . mysqli_error($conn));
}
$row = mysqli_fetch_array($query)
?>

<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</script>


<body>
<table class="data-table">
		<caption class="title">User Events</caption>
		 <h1 align="center">User Events</h1> 
		<thead>
			<tr>
				<th>Event Name</th>
				<th>Category</th>		
				<th>Phone Number</th>
				<th>Email</th>
				<th>View</th>
			</tr>
		</thead>
		<tbody>
		<?php
			echo "<tr>
					<p>".$row['name']."</p>
					<p>".$row['category']."</p>
					<p>".$row['phone']."</p>
					<p>".$row['email']."</p>
				</tr>";

		?>
		</tbody>
	</table>
</body>
</html>
