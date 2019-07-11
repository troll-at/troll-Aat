<?php 
error_reporting(E_ERROR | E_PARSE); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/pro.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
$tif=$_SESSION['username'];
$lak = mysqli_connect("127.0.0.1", "root", "", $tif);
$qary="SELECT count(username) AS total FROM `followers`";
$rsult=mysqli_query($lak, $qary);
$vales=mysqli_fetch_assoc($rsult);
$num_rws=$vales['total'];
?>
<?php
$tiaf=$_SESSION['username'];
$liak = mysqli_connect("127.0.0.1", "root", "", $tiaf);
$qaery="SELECT count(username) AS total FROM `following`";
$reslts=mysqli_query($liak, $qaery);
$valu=mysqli_fetch_assoc($reslts);
$num_ro=$valu['total'];
?>
<div class="topnav" id="myTopnav">
  <a id="trol" href="">TROLL-AT</a>
  <a href="user-profile.php">Home</a>
  <a href="user-followers.php">followers &nbsp<?php echo $num_rws; ?></a>
  <a href="user-following.php">following &nbsp<?php echo $num_ro; ?></a>
  <a href="search.php">Search</a>
  <a href="post.php">Post</a>
  <a href="settings.php">Settings</a> 
  <a href="deconexion.php">Logout</a><a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
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
   $lin=mysqli_connect("127.0.0.1", "root", "", $username);
   $que="DELETE FROM following WHERE username='$tof'";
   if (mysqli_query($lin, $que)) {
   	$li=mysqli_connect("127.0.0.1", "root", "", $tof);
	$quer= "DELETE FROM followers WHERE username='$username'";
	if (mysqli_query($li, $quer)) {
		echo "<script>window.location='profile.php?username=".$tof."'</script>";
	}}
   }else{
 echo "<div align='center'><h1 style='color:white;font-size:20px;'>You don't follow <a style='color:white' href='profile.php?username=".$tof."'>".$tof."</a></h1></div>";
}

?>
</body></html>