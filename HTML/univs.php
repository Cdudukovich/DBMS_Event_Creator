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

if(!isset($_SESSION['search']) )
{
	$sql = "SELECT *
		FROM university";
}
elseif(($_SESSION['search'] == ''))
{
$sql = "SELECT *
		FROM university";
}
else
{
		$sql = "SELECT * from university where name = '" . $_SESSION['search'] ."'";
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
	<form action="univSearch.php" method="post" class="hform" name="searchEvent">
        <fieldset>
            <legend></legend>
            Search: <input type="text" name="searchVal" /><br><br>
        </fieldset>

        <p>
            <input type="submit" name="submit" value="Submit" class="button">
            <input type="button" onclick="document.getElementById('searchEvent').reset()" value="Clear">
        </p>
        <input type="submit" name="submit" value="Reset" class="button">
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
</html>

