<!DOCTYPE html>
<html>
<head>
		<title>TableView</title>
</head>

<body>
<table>
	<tr>
		<th>Username</th>
		<th>Password</th>
		<th>ID</th>
		<th>Name</th>
	</tr>
	<?php
	$conn = mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "test");
	$sql = "SELECT Username, ID, Name from test";
	$result = mysqli_query($conn, $sql);
	if($result-> num_rows > 0)
		while($row = $result->fetch_assoc())
		{
			echo "<tr><td>". $row["Username"]. "<tr><td>". $row["ID"]. "<tr><td>". $row["Name"]. "<tr><td>";
		}
		echo "</table>";
	else
	{
		echo "no Results";
	}
		$conn->close()
	?>
</table>

</body>

</html>