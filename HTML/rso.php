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

// Pull the RSO info accounting for the search values.
if(!isset($_SESSION['search']))
{
	$sql = "SELECT name, description from rso";
}
elseif($_SESSION['search'] == '')
{
	$sql = "SELECT name, description from rso";
}
else
{
	$sql = "SELECT name, description from rso where name = '" . $_SESSION['search'] ."'";
	$_SESSION['search'] = '';
}
		
$query = mysqli_query($conn, $sql);

if (!$query) 
{
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>

<body>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Boilerplate</title>
		<meta name="author" content="Nathan Borror">
	  <link rel="stylesheet" href="stylesheets/screen.css" type="text/css" media="screen" charset="utf-8">
	  <!--[if lte IE 6]><link rel="stylesheet" href="stylesheets/lib/ie6.css" type="text/css" media="screen" charset="utf-8"><![endif]-->
	</head>

	<!-- Search -->
    <form action="search.php" method="post" class="hform" name="searchRSO">
        <fieldset>
            <legend></legend>
            Search: <input type="text" name="searchVal" /><br><br>
        </fieldset>

        <p>
            <input type="submit" name="submit" value="Submit" class="button">
            <button onclick="/* set the session variable */">Clear</button>
        </p>
    </form>

    <!-- Create RSOs
    	Available for non students only !-->
	<?php
	    if($_SESSION['level'] != 0) {
	    ?>
	        <form action="insertRSO.php" method="post" class="hform" name="createRSO">
		        <fieldset>
		            <legend></legend>
		            Name: <input type="text" name="rsoName" /><br><br>
		            Description: <input type="text" name="rsoDescription" /><br><br>
		        </fieldset>

		        <p>
		            <input type="submit" name="submit" value="Submit" class="button">
		            <button onclick="/* set the session variable */">Clear</button>
		        </p>
		    </form>
	    <?php
	    }
	?>

    <!-- Display RSOs !-->
	<table class="data-table">
		<caption class="title">User Events</caption>
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>		
			</tr>
		</thead>
		<tbody>
		<?php
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$row['name'].'</td>
					<td>'.$row['description'].'</td>
				</tr>';

		}?>
		</tbody>
	</table>
</body>
</html>