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

// No search terms
// Bring up only allowed events
if(!isset($_SESSION['search']))
{
	$sql = "SELECT * 
		FROM events
		WHERE events.type = 1 OR ( 
		events.id in (SELECT id 
		FROM hosts
		WHERE name in 
		(SELECT name 
		FROM aff1
		WHERE username = '$_SESSION[username]')) and events.type = 2)";
}
// No search terms
// Bring up only allowed events
elseif($_SESSION['search'] == '')
{
	$sql = "SELECT * 
		FROM events
		WHERE events.type = 1 OR ( 
		events.id in (SELECT id 
		FROM hosts
		WHERE name in 
		(SELECT name 
		FROM aff1
		WHERE username = '$_SESSION[username]')) and events.type = 2)";
}
// Bring up the searched event.
else
{
	$sql = "SELECT * from events where name = '" . $_SESSION['search'] ."'";
	$_SESSION['search'] = '';
}
		
$query = mysqli_query($conn, $sql);

if (!$query) 
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
	<form action="EventSearch.php" method="post" class="hform" name="searchEvent">
        <fieldset>
            <legend></legend>
            Search: <input type="text" name="searchVal" /><br><br>
        </fieldset>

        <p>
            <input type="submit" name="submit" value="Submit" class="button">
            <input type="button" onclick="document.getElementById('searchEvent').reset()" value="Clear">
        </p>
        <input type="submit" name="submit" value="Reset" class="button">
    </form>
	<table class="data-table">
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
		while ($row = mysqli_fetch_array($query))
		{

			$_SESSION['name'] = $row['name'];
			echo "<tr>
					<td>".$row['name']."</td>
					<td>".$row['category']."</td>
					<td>".$row['phone']."</td>
					<td>".$row['email']."</td>
					<td><a href=detail_View_call.php?table=" . urlencode($row['name']) . " >View More</a></td>
				</tr>";

		}?>
		</tbody>
	</table>
	<?php
    if($_SESSION['level'] != 0) {
    ?>
        <input type='button' id='forgothide' value='Create New Event' onclick="location.href='NewEvent.html';">
    <?php
    }
?>
</body>
</html>

