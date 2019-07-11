<?php
session_start();
if (!empty($_SESSION['username'])) {

}else{
    header('Location: login.php');

}
?>
<?php
?>
<?php
$user = $_SESSION['username'];
$_SESSION['userna'] = $user;
 $db = mysqli_connect("127.0.0.1", "root", "", $user);
 $query="SELECT * FROM `couverture`";
 $result=mysqli_query($db , $query);
 while ($row = mysqli_fetch_assoc($result)) {

?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    
  </style>
  <title><?php echo $_SESSION['username'];?></title>
<link rel="stylesheet" type="text/css" href="css/pro.css">
<link rel="icon" type="image/icon" href="images/favicon.ico"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
$tf=$_SESSION['username'];
$_SESSION['username'] = $tf;
$lk = mysqli_connect("127.0.0.1", "root", "", $tf);
$qry="SELECT count(username) AS total FROM `followers`";
$result=mysqli_query($lk, $qry);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];
?>
<?php
$tf=$_SESSION['username'];
$lik = mysqli_connect("127.0.0.1", "root", "", $tf);
$qery="SELECT count(username) AS total FROM `following`";
$results=mysqli_query($lik, $qery);
$value=mysqli_fetch_assoc($results);
$num_row=$value['total'];
?>
<div class="topnav" style="width: 100%" id="myTopnav">
  <a id="trol" href="">TROLL-AT</a>
  <a href="user-profile.php">Home</a>
  <a href="user-followers.php">followers &nbsp<?php echo $num_rows; ?></a>
  <a href="user-following.php">following &nbsp<?php echo $num_row; ?></a>
  <a href="search.php">Search</a>
  <a href="post.php">Post</a>
  <a href="settings.php">Settings</a> 
  <a href="deconexion.php">Logout</a><a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div><br><br>

<nav style="background-image: url('<?php echo $row['image'];}?>')" class="principale_imgs">
  <?php
$user = $_SESSION['username'];
 $dab = mysqli_connect("127.0.0.1", "root", "", $user);
 $qauery="SELECT * FROM `image`";
 $raesult=mysqli_query($dab , $qauery);
 while ($rows = mysqli_fetch_assoc($raesult)) {

?>
  <img width="128px" id="user_img" src="<?php $use=$rows['image']; echo $use;}?>" align="bottom"><span><?php echo $_SESSION['username'];?></span>
</nav>
<div class="topnave" id="Topnav">
  <br>
<br><br>
 </div>

  
<?php
$html="<b><br><br><br><br><br><br><br><br><br><br><br><br><b>";
$username =$_SESSION['username'];
 $db = mysqli_connect("127.0.0.1", "root", "", $username);
 $query="SELECT * FROM `$username` ORDER BY image_id DESC";
 $result=mysqli_query($db , $query);
 while ($row = mysqli_fetch_assoc($result)) {
  echo "
  <nav style='  background-color:#ff9700;width : 600px ; color:black;margin-top:100px;margin-left:100px;height:720px;' class='trolls'>
  <div class='dropdown'>
  <button class='dropbtn'><img src='images/icons/3.png'></button>
  <div class='dropdown-content'>
<a href='delete-troll.php?photoid=".$row['image_id']."&&username=".$user."'>DELETE</a>
 
  </div>
</div>
  <img id='profile_photo' align='middle' src='".$use."'><span style='padding-left:20px;'><a style='text-decoration-line:none;color:black;font-size:20px;'<a href=''>".$username."</a></span>
  <img style='width:600px;height:630px;padding-top:5px;
' id='posted-image' src='".$row['images']."'>
   <br><br><br>
  </nav>";
}
?>





<!-- Footer -->
<footer style="background-color:#ff9700;margin-top:150px;bottom:0;position:relative;width:100%" class="page-footer font-small blue">

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