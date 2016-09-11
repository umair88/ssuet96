<?php
session_start();


?>

<!DOCTYPE html>
<head>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Artifika" />


  <title>
    Logged Out
  </title>
</head>
<body>
<ul class="topnav" id="myTopnav">
  <li><a href="index.php">Register</a></li>
  <li><a href="login.php">Login</a></li>
  </li>
</ul>

<!--to echo someting you can write < ?= instead of writing < ?php echo  -->
  <h2>Thank you  <?= $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?> for visiting. </h2>

<footer class="footer">
<p><?php include("footer.php");?></p>
</footer>
</body>
</html>

<?php
session_destroy();


?>


