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

// This stores the name of the table entry that was passed in when this script was called
$event = $_GET['table'];

$sql = "SELECT * from events where name = '$event'";

//Query the databse looking for the event 
$query = mysqli_query($conn, $sql);

if (!$query) 
{
	die ('SQL Error: ' . mysqli_error($conn));
}
$row = mysqli_fetch_array($query);

//Query the database looking for all the comments and rating for the events 
$comment_id = $row['id'];

$sql2 = "SELECT * from comments where event_id = '$comment_id'";

$query2 = mysqli_query($conn, $sql2);

if (!$query2) 
{
	die ('SQL Error: ' . mysqli_error($conn));
}
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
		 <h1 align="center"><?php echo $row['name']?></h1> 
		<tbody>
			<input class="logout_button" type="button" onclick="location.href='Events.php';" value="Back" style="position: relative; left: 1%; top: 50%;">
		<?php
			echo "<tr>
					<p><th><strong>Name</strong></th><th>".$row['name']."</p></th>
				  </tr>
				  <tr>
					<p><td><strong>Category</strong></td><td>".$row['category']."</p></td>
				  <tr>
					<p><td><strong>Email</strong></td><td>".$row['email']."</p></td>
				  </tr>
				  <tr>
					<p><td><strong>Phone Number</strong></td><td>".$row['phone']."</p></td>
				  </tr>
				  <tr>
					<p><td><strong>Description</strong></td><td>".$row['description']."</p></td>
				  </tr>
				";

		?>
		</tbody>
	</table>

	<table class="data-table">
		 <h1 align="center">Comments</h1> 
		<thead>
			<tr>
				<th>Username</th>
				<th>Rating</th>		
				<th>Time</th>
				<th>Comment</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while ($comment = mysqli_fetch_array($query2) )
			{

				echo "<tr>
						<td>".$comment['username']."</td>
						<td>".$comment['Rating']."</td>
						<td>".$comment['time']."</td>
						<td>".$comment['comment_text']."</td>
					</tr>";

			}
		
		?>
		</tbody>
	</table>
</body>
</html>
