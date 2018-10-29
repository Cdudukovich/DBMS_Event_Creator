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
$user_level = $_SESSION['level'];
$sql = "SELECT name, category, phone, email from events where type = 1";
		
$query = mysqli_query($conn, $sql);

if (!$query) 
{
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<body>
	<table class="data-table">
		<caption class="title">User Events</caption>
		<thead>
			<tr>
				<th>Event Name</th>
				<th>Category</th>		
				<th>Phone Number</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$row['name'].'</td>
					<td>'.$row['category'].'</td>
					<td>'.$row['phone'].'</td>
					<td>'.$row['email'].'</td>
				</tr>';

		}?>
		</tbody>
	</table>
</body>
</html>