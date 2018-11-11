<?php
// Always start this first
session_start();
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'event_creator'; // Database Name

$_SESSION["LoggedIn"] = true;
$_SESSION["Level"] = "admin";

// testing---delete later------------
$_SESSION["commentID"] = 12344;
$_SESSION["username"] = 'JohnSermarini';
// testing---------------------------

$query = "SELECT c_id, username, comment_text 
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
if($row['username'] != $_SESSION["username"])
{
    // user is not correct
    echo " <script>alert('Cannot edit comments you did not make.'); window.location.href='Events.php'</script>  ";
}

?>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Registration</title>
  <link rel="stylesheet" href="stylesheets/screen.css" type="text/css" media="screen" charset="utf-8">
</head>

<div id="page">
  <div id="header">
    <h1>User Login</h1>
  </div>
  
  <div id="navigation">
    <ul class="tabs">
      <li> </li>
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
      <!--
      <form action="Registration1.html">
              <input type="submit" value="Register" />
      </form>
      !-->
      
    </div>
    <div id="resources">
    </div>
  </div>
  
  <div id="footer">
    <ul class="tabs">
      <li></li>
    </ul>
    
  </div>
</div>

</body>
</html>



?>