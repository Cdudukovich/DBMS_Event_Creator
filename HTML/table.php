<?php
session_start();
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'event_creator'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = "SELECT username, first_name, level from users";
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<body>
	<table class="data-table">
		<caption class="title">User Events</caption>
		<thead>
			<tr>
				<th>username</th>
				<th>first_name</th>		
				<th>level</th>
			</tr>
		</thead>
		<tbody>
		<?php
		echo $_SESSION["LoggedIn"];
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$row['username'].'</td>
					<td>'.$row['first_name'].'</td>
					<td>'.$row['level'].'</td>
				</tr>';

		}?>
		</tbody>
	</table>
</body>
</html>