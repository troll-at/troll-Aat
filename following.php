<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
   body {
  font-family: Arial, Helvetica, sans-serif;
  margin:0;
}

* {
  box-sizing: border-box;
}

/* Create a column layout with Flexbox */
.row {
  display: flex;
}

/* Left column (menu) */
.left {
  flex: 35%;
  padding: 15px 0;
}

.left h2 {
  padding-left: 8px;
}

/* Right column (page content) */
.right {
  flex: 65%;
  padding: 15px;
}

/* Style the search box */
#mySearch {
  width: 100%;
  font-size: 18px;
  padding: 11px;
  border: 1px solid #ddd;
}

/* Style the navigation menu inside the left column */
#myMenu {
  list-style-type: none;
  padding: 0;
  margin-top: 50px;
}

#myMenu li a {
  padding: 12px;
  border:1px grey solid;
  color:black;
  background-color:#f0f0f0;
  font-size:20px;
  text-decoration: none;
  display: block
}

  </style>
  <link rel="stylesheet" type="text/css" href="css/sit.css">
  <link rel="stylesheet" type="text/css" href="css/site.css">
  <title></title>
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
<br>
<?php
$tf=$_GET['username'];
$lk = mysqli_connect("127.0.0.1", "root", "", $tf);
$qry="SELECT count(username) AS total FROM `following`";
$result=mysqli_query($lk, $qry);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];
?>
<nav class="trolls" style="background:orange;overflow-y:auto;"><br>
<div align="center">
<span style="color:white;font-size:25px;">Following of <a style="color: white;text-decoration-line: none;" href="profile.php?username=<?php echo $_GET['username'];?>"><?php echo $_GET['username'];?></a></span></div>
<div align="center"><h1>Numbre of following : <?php echo $num_rows;?></h1></div><br><br>
  <input type="text" id="mySearch" onkeyup="mFunction()" placeholder="Search.." title="Type in a category" type="text" placeholder="search..." name="userse" style="border: 1px solid #ff9700;font-size: 20px;">
<ul id="myMenu">
<?php
$uqd=$_GET['username'];
 $db = mysqli_connect("127.0.0.1", "root", "", $uqd );
 $query="SELECT * FROM `following` ";
 $result=mysqli_query($db , $query);
 while ($row = mysqli_fetch_assoc($result)) {
    echo "<li><a href=''>".$row['username']."</a></li>";
  }
?>
</ul>

<script>
function mFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("mySearch");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myMenu");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
function follow(){
document.getElementById("follow-button").style.background = "#ff9700";
document.getElementById('follow-button').innerHTML = "following";
</script>



</body>
</html>