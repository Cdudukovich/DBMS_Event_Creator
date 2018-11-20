<?php
// Always start this first
session_start();
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'event_creator'; // Database Name

$_SESSION["LoggedIn"] = true;
$_SESSION["Level"] = "admin";

// This stores the name of the table entry that was passed in when this script was called
$_SESSION["commentID"] = $_GET['table'];

if($_SESSION['commentID'] == "")
{
      echo " <script>alert('User had no comment for this event.'); window.location.href='detail_View.php'</script>  ";
}

// Grabs all of the information for comments that match that comment id
$query = "SELECT *
            FROM comments
            WHERE c_id = '" . $_SESSION['commentID'] ."'";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
}

$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
if($count == 0)
{
    // comment not found
    echo " <script>alert('Comment not found.'); window.location.href='Events.php'</script>  ";
}

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Edit Comment</title>
  <link rel="stylesheet" href="stylesheets/screen.css" type="text/css" media="screen" charset="utf-8">
  <link rel="stylesheet" href="stylesheets/styles.css" type="text/css" media="screen" charset="utf-8">

  </head>
<body>

<div id="page">
  <div id="header">
    <!-- Calls the logout button to end the session -->
    <h1>Events</h1>  
          <input class="logout_button" type="button" onclick="location.href='logout.php';" value="Logout" />
  </div>

  <div id="navigation">
    <ul class="tabs">
      <li><a href="Events.php">Events</a></li>
      <li><a href="RSO.php">RSO</a></li>
      <li><a href="university.php">Universities</a></li>
    </ul>
  </div>
  <h2>Original Description</h2>
  <?php
    echo "<tr>
           <td>".$row['comment_text']." </td>
          </tr>";
  ?>

  <div id="body" class="wrapper">
    <div id="introduction">
      <h2>Edit Comment</h2>

      <!-- Keeps track and calls a modify script to edit comments -->
      <form action="modifyCommentDB.php" method="post" class="hform" name="mod" id="mod">
        <fieldset>
          <legend></legend>
                Description: <input id="forminput" type="text" name="description" /><br><br>
        </fieldset>
        
        <p>
          <input type="submit" name="submit" value="Submit" class="button">
          <input type="button" onclick="document.getElementById('signon').reset()" value="Clear">
        </p>
      </form>
      
    </div>
    <div id="resources">
    </div>
  </div>
  
  <div id="footer">
    <ul class="tabs">
      <li><a href="Events.php">Events</a></li>
      <li><a href="RSO.php">RSO</a></li>
    </ul>
    
  </div>
</div>

</body>
</html>
