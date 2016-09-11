<?php
session_start();

  if (isset($_POST['submit'])) {
  include_once("dbconfig.php");
  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);
  $sql = "SELECT * FROM logindata where username = '$username' AND password = '$password' AND activated = '1' LIMIT 1";
  $query = mysqli_query($conn, $sql);

  if ($query) {
    $row = mysqli_fetch_row($query);  
    /* To debug and print the array
    echo "<pre>";  print_r($row); die();*/
    $userId = $row[0];  
    $dbUsername = $row[1];

   }
  $_SESSION['username'] = $dbUsername;  

  if ($username == $dbUsername) {
  $sql2 = "SELECT * FROM userdata WHERE id = '$userId'";
  $query2 = mysqli_query($conn, $sql2);

  if ($query2) {
    $row2 = mysqli_fetch_row($query2);  
    /* To debug and print the array
    echo "<pre>";  print_r($row); die();*/

    $fname = $row2[2];  
    $lname = $row2[3];

   }

    $_SESSION['id'] = $userId;    
    $_SESSION['firstname'] = $fname;
    $_SESSION['lastname'] = $lname;

    header('Location: user.php');
  }
  else {
    echo "Incorrect Username or Password";
  }
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
    Login Page
</title>
</head>
<body>

<ul class="topnav" id="myTopnav">
  <li><a href="index.php">Register</a></li>

</ul>

<form  method="post" action="login.php" autocomplete="off">

<div class='login'>

  <h2>Login</h2>


    <select name="username">
    <option value="default">Select Roll Number</option>
    <option value="Roll No 1">Roll No 1</option>
    <option value="Roll No 2">Roll No 2</option>
    <option value="Roll No 3">Roll No 3</option>
    <option value="Roll No 4">Roll No 4</option>
    <option value="Roll No 5">Roll No 5</option>
    <option value="Roll No 6">Roll No 6</option>
    <option value="Roll No 7">Roll No 7</option>
    <option value="Roll No 8">Roll No 8</option>
    <option value="Roll No 9">Roll No 9</option>
    <option value="Roll No 10">Roll No 10</option>
    <option value="Roll No 11">Roll No 11</option>
    <option value="Roll No 12">Roll No 12</option>
    <option value="Roll No 13">Roll No 13</option>
    <option value="Roll No 14">Roll No 14</option>
    <option value="Roll No 15">Roll No 15</option>
    <option value="Roll No 16">Roll No 16</option>
    <option value="Roll No 17">Roll No 17</option>
    <option value="Roll No 18">Roll No 18</option>
    <option value="Roll No 19">Roll No 19</option>
    <option value="Roll No 20">Roll No 20</option>
    <option value="Roll No 21">Roll No 21</option>
    <option value="Roll No 22">Roll No 22</option>
    <option value="Roll No 23">Roll No 23</option>
    <option value="Roll No 24">Roll No 24</option>
    <option value="Roll No 25">Roll No 25</option>
    <option value="Roll No 26">Roll No 26</option>
    <option value="Roll No 27">Roll No 27</option>
    <option value="Roll No 28">Roll No 28</option>
    <option value="Roll No 29">Roll No 29</option>
    <option value="Roll No 30">Roll No 30</option>
    <option value="Roll No 31">Roll No 31</option>
    <option value="Roll No 32">Roll No 32</option>
    <option value="Roll No 33">Roll No 33</option>
    <option value="Roll No 34">Roll No 34</option>
    <option value="Roll No 35">Roll No 35</option>
    <option value="Roll No 36">Roll No 36</option>
    <option value="Roll No 37">Roll No 37</option>
    <option value="Roll No 38">Roll No 38</option>
    <option value="Roll No 39">Roll No 39</option>
    <option value="Roll No 40">Roll No 40</option>
    <option value="Roll No 41">Roll No 41</option>
    <option value="Roll No 42">Roll No 42</option>
    <option value="Roll No 43">Roll No 43</option>
    <option value="Roll No 44">Roll No 44</option>
    <option value="Roll No 45">Roll No 45</option>
    <option value="Roll No 46">Roll No 46</option>
    <option value="Roll No 47">Roll No 47</option>
    <option value="Roll No 48">Roll No 48</option>
    <option value="Roll No 49">Roll No 49</option>
    <option value="Roll No 50">Roll No 50</option>
    <option value="Roll No 51">Roll No 51</option>
    <option value="Roll No 52">Roll No 52</option>
    <option value="Roll No 53">Roll No 53</option>
    <option value="Roll No 54">Roll No 54</option>
    <option value="Roll No 55">Roll No 55</option>
</select>

  <input type="password" name="password" placeholder="Enter Password"/>
  <input class='animated' type="submit" name="submit" value="Login"> </input><br />
  <!-- <input class='animated' type='submit' name="submit" value='Login' /> -->

</div>
</form>
<div class="video">
<iframe width="560" height="315" src="https://www.youtube.com/embed/bHyIx-6nHM8" frameborder="0" allowfullscreen></iframe>
</div>
<footer class="footer">
<p><?php include("footer.php");?></p>
</footer>
</body>
</html>



