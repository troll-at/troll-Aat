<?php
session_start();
if (!empty($_SESSION['username'])) {
}else{
    header('Location: login.php');

}

  
?>
<?php
if (isset($_GET['username'])){


}
?>
<?php
$tf=$_GET['username'];
$lk = mysqli_connect("127.0.0.1", "root", "", $tf);
$qry="SELECT count(username) AS total FROM `followers`";
$result=mysqli_query($lk, $qry);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];
?>
<?php
$user = $_GET['username'];
 $db = mysqli_connect("127.0.0.1", "root", "", $user);
 $query="SELECT * FROM `image`";
 $result=mysqli_query($db , $query);
 while ($row = mysqli_fetch_assoc($result)) {

?>
<?php
$tf=$_GET['username'];
$lik = mysqli_connect("127.0.0.1", "root", "", $tf);
$qery="SELECT count(username) AS total FROM `following`";
$resulte=mysqli_query($lik, $qery);
$value=mysqli_fetch_assoc($resulte);
$num_row=$value['total'];
?>
<?php
$user = $_GET['username'];
 $dab = mysqli_connect("127.0.0.1", "root", "", $user);
 $qauery="SELECT * FROM `couverture`";
 $raesult=mysqli_query($dab , $qauery);
 while ($rows = mysqli_fetch_assoc($raesult)) {

?>
<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" type="text/css" href="css/pro.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title><?php echo $_GET['username'];?></title>
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
<div class="topnav" style="width: 100%" id="myTopnav">
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
<nav style="background-image: url('<?php echo $rows['image'];}?>')" class="principale_imgs">
  <?php
$user = $_GET['username'];
 $db = mysqli_connect("127.0.0.1", "root", "", $user);
 $query="SELECT * FROM `image`";
 $result=mysqli_query($db , $query);
 while ($row = mysqli_fetch_assoc($result)) {

?><img width="128px" id="user_img" src="<?php $use=$row['image']; echo $use;}?>" align="bottom"><span><?php echo $_GET['username'];?></span>
</nav>
<div class="topnave" id="Topnav">
  <div style="margin-left:150px;">
  <a id="activee" href="#news">Home</a>
  <a href="followers.php?username=<?php echo $_GET['username'];?>">followers <?php echo $num_rows;?></a>
<a href="following.php?username=<?php echo $_GET['username'];?>">following <?php echo $num_row;}?></a>
 <?php
$username = $_SESSION['username'];
$link = mysqli_connect("127.0.0.1", "root", "", $_GET['username']);
$tof=$_GET['username'];
$query = "SELECT * FROM followers WHERE username='$username'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$count = mysqli_num_rows($result);
if($count > 0){
   echo "<a href='unfollow-him.php?username=".$tof."'>Unfollow</a>";
}else{
  echo '<a href="follow-him.php?username='.$tof.'">Follow</a>';
}

?>
</div></div>  
<?php
$username =$_GET['username'];
 $db = mysqli_connect("127.0.0.1", "root", "", $username);
 $query="SELECT * FROM `$username` ORDER BY image_id DESC";
 $result=mysqli_query($db , $query);
 while ($row = mysqli_fetch_assoc($result)) {
  echo "
  <nav class='trolls'>
  <img id='profile_photo' align='middle' src='".$use."'><span style='padding-left:20px;'><a style='text-decoration-line:none;color:black;font-size:20px;'<a href=''>".$username."</a></span>
  <img style='width:600px;height:680px;padding-top:5px;
' id='posted-image' id='posted-image' src='".$row['images']."'>
   
  </nav>";
}
?>





<!-- Footer -->
<footer style="background-color:#ff9700;margin-top:50px;" class="page-footer font-small blue">

  <!-- Copyright -->
  <div style="padding-top:30px;padding-bottom:25px;color:#ddd" align="center" class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="" style="text-decoration-line:none;color:white"> Troll-At.github.io</a>
  </div>
  <!-- Copyright -->
  <div align="center" style="background-color:#ff5000;padding-top:15px;padding-bottom:10px;">
    Created by Mohamed chouaib Loumedene
  </div>
</footer>
<!-- Footer -->






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

</body>
</html>