<?php

session_start();

if (isset($_SESSION['id'])) {
/*
To Check Session Array
print_r($_SESSION); die();
*/
$userId = $_SESSION['id'];
$username = $_SESSION['username'];
$firstname = $_SESSION['firstname'];
} else {
	header('Location: login.php');
	die();
}

?>

<!DOCTYPE html>
<head>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/style1.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Artifika" />


  <title>
    User Logged In Page
  </title>
</head>
<body>


<form method="post" action="thanks.php">

<ul class="topnav" id="myTopnav">
  <li><a href="index.php">Register</a></li>
  </li>
</ul>
<div> <br><h3> Good to see you <?php echo $firstname; ?> <br /></h3> </div>

<div> <br><h4> These are all registered users <br /></h4> </div>
</div>

<div class="divTable" style="border: 1px solid #eee; border-bottom: 2px solid #00cccc;">
<div class="divTableBody">
<div class="divTableRow">
<div class="divTableCell">&nbsp;Roll No.</div>
<div class="divTableCell">&nbsp;Name</div>
<div class="divTableCell">&nbsp;Country</div>
<div class="divTableCell">&nbsp;Email</div>
<div class="divTableCell">&nbsp;Degree</div>
<div class="divTableCell">&nbsp;Certification</div>
<div class="divTableCell">&nbsp;Company</div>
<div class="divTableCell">&nbsp;Area of Expertise</div>
</div>
</div>

<?php
include("dbconfig.php");
$id = "SELECT * FROM userdata WHERE fname != ''";
$query = mysqli_query($conn, $id);
while($row = mysqli_fetch_row($query)) {
?>
<div class="divTableBody">
<div class="divTableRow" style="font-family: Artifika; font-size: 14px; font-weight: normal; text-align: center; background: #fff; color:#000; border-collapse: collapse";>
<div class="divTableCell">&nbsp;<?php $rollNoStr = explode(" ",$row[1]); echo $rollNoStr[2]; ?></div>
<div class="divTableCell">&nbsp;<?php echo $row[2]; echo " "; echo $row[3]; ?></div>
<div class="divTableCell">&nbsp;<?php echo $row[4]; ?></div>
<div class="divTableCell">&nbsp;<?php echo $row[6]; ?></div>
<div class="divTableCell">&nbsp;<?php echo $row[9]; ?></div>
<div class="divTableCell">&nbsp;<?php echo $row[10];?></div>
<div class="divTableCell">&nbsp;<?php echo $row[12];?></div>
<div class="divTableCell">&nbsp;<?php echo $row[13];?></div>
</div>
</div>


<?php }
?>
</div>
<p>
<div class='logout'>
<br>
<input class='animated' type="submit" value="Log out" />

</div>
</form>
<footer class="footer">
<p><?php include("footer.php");?></p>
</footer>
</body>
</html>