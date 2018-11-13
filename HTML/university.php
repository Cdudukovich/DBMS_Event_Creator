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
$_SESSION['universityName'] = "UCF";

// Add error check to determine if database is empty
$sql = "SELECT *
		FROM university";

$query = mysqli_query($conn, $sql);
if (!$query) 
{
	die ('SQL Error: ' . mysqli_error($conn));
}
/*
if(mysql_num_rows($query) == 0)
{
	// Send back to previous page, there is no university by this name.
}
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Universities</title>
  <link rel="stylesheet" href="stylesheets/screen.css" type="text/css" media="screen" charset="utf-8">
  <link rel="stylesheet" href="stylesheets/style.css" type="text/css" media="screen" charset="utf-8">
</head>


<body>

<div id="page">
  <div id="header">
    <h1>University</h1>
       <input class="logout_button" type="button" onclick="location.href='logout.php';" value="Logout" />
  </div>
  
  <div id="navigation">
    <ul class="tabs">
      <li><a href="Events.php">Events</a></li>
      <li><a href="RSO.php">RSO</a></li>
      <li><a href="university.php">Universities</a></li>
    </ul>
  </div>
	<table class="data-table">
		 <h1 align="center">University</h1> 
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>		
				<th>Location</th>
				<th>Number of Students</th>
				<th>Join</th>
			</tr>
		</thead>
		<tbody>
		<?php
			while ($row = mysqli_fetch_array($query))
			{
				echo "<tr>
						<td>".$row['name']."</td>
						<td>".$row['description']."</td>
						<td>".$row['location']."</td>
						<td>".$row['student_num']."</td>
						<td><a href=joinUniversity.php?table=" . urlencode($row['name']) . " >Join</a></td>
					</tr>";

			}
		?>
		</tbody>

		<?php
		    if($_SESSION['level'] == 2) {
		    ?>
		        <input type='button' id='forgothide' value='Create New University' onclick="location.href='newUniversity.html';">
		    <?php
		    }
		?>
      </form>
      
    </div>
    <div id="resources">
    </div>
  </div>

</div>    
    <!--<p class="quiet"><small>Creative Commons License</small></p>!-->


</body>