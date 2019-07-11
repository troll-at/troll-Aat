<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/pro.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="topnav" id="myTopnav">
  <a id="trol" href="">TROLL-AT</a>
  <a href="user-profile.php">Home</a>
  <a href="user-followers.php">followers</a>
  <a href="user-following.php">following</a>
  <a href="search.php">Search</a>
  <a href="post.php">Post</a>
  <a href="settings.php">Settings</a> 
  <a href="deconexion.php">Logout</a><a href="javascript:void(0);" class="icon" onclick="myFunction()">
  </a></div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
function like(){
  document.getElementById("like").innerHtml = "hello";
}
</script>

    <i class="fa fa-bars"></i>
  </a>
</div><br><br><br>
<?php
session_start();
$username = $_SESSION['username'];
$link = mysqli_connect("127.0.0.1", "root", "", $_GET['username']);
$tof=$_GET['username'];
$query = "SELECT * FROM followers WHERE username='$username'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$count = mysqli_num_rows($result);
if($count > 0){
    echo("<div style='color:white;margin-top:100px;' align='center'><h1>You already follow <a href='profile.php?username=".$tof."' style='color:white;text-dexoration-align:none;' >".$tof."</a></h1></div>");
    header("Loacation: profile.php?username=".$tof);
    die();
    mysqli_close($link);
}

$utf=$_GET['username'];
$user=$_SESSION['username'];
$db = mysqli_connect("127.0.0.1", "root", "", $utf);
$sql="INSERT INTO `followers` (username) VALUES ('$user')";
$ndb=mysqli_connect("127.0.0.1", "root", "", $user);
$msql="INSERT INTO `following` (username) VALUES ('$utf')";
if(mysqli_query($db, $sql) && mysqli_query($ndb, $msql)){
   echo "<script>window.location='profile.php?username=".$utf."'</script>";
}
?></body></html>