<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Boilerplate</title>
	<meta name="author" content="Nathan Borror">
  <link rel="stylesheet" href="stylesheets/screen.css" type="text/css" media="screen" charset="utf-8">
  <link rel="stylesheet" href="stylesheets/styles.css" type="text/css" media="screen" charset="utf-8">

</head>
<body>
<div id="page">
  <div id="header">
    <h1>Events</h1>
      <button class="login_button" onclick="location.href='login.html'">Login</button>
      <button class="logout_button">Logout</button>
  </div>

  
  <div id="navigation">
    <ul class="tabs">
      <li><a href="Home1.html">Home</a></li>
      <li><a href="Events.php">Events</a></li>
      <li><a href="Registration1.html">Registration</a></li>
    </ul>
  </div>
    
    <?php include("table.php"); ?>
  </div>
  
  <div id="footer">
    <ul class="tabs">
      <li><a href="Home1.html">Home</a></li>
      <li><a href="Events.php">Events</a></li>
      <li><a href="Registration1.html">Registration</a></li>
    </ul>
    
    <p class="quiet"><small>Creative Commons License</small></p>
  </div>
</div>

</body>
</html>
