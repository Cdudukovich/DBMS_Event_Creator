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
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>

<body>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>RSO</title>
  <link rel="stylesheet" href="stylesheets/screen.css" type="text/css" media="screen" charset="utf-8">
  <link rel="stylesheet" href="stylesheets/styles.css" type="text/css" media="screen" charset="utf-8">

</head>
	<div id="page">
  <div id="header">
    <h1>Events</h1>  
          <input class="logout_button" type="button" onclick="location.href='logout.php';" value="Logout" />

  </div>

  
  <div id="navigation">
    <ul class="tabs">
      <li><a href="Events.php">Events</a></li>
      <li><a href="RSO.php">RSO</a></li>
    </ul>
  </div>
  </div>
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
	<div id="footer">
    <ul class="tabs">
      <li><a href="Events.php">Events</a></li>
      <li><a href="RSO.php">RSO</a></li>
    </ul>
    
    <p class="quiet"><small>Creative Commons License</small></p>
  </div>
</body>
</html>