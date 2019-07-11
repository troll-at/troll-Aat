<?php
session_start();
if (!empty($_SESSION['username'])) {
  
}else{
    header('Location: login.php');

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/pro.css">
    <title>POST</title>
</head>
<body style="background:#ff7700">
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
<div class="topnave" id="Topnav">
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
</script>
</body>
</html>
<?php

// Upload and Rename File

if (isset($_POST['submit']))
{
  
  $filename = $_FILES["file"]["name"];
  $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
  $file_ext = substr($filename, strripos($filename, '.')); // get file name
  $filesize = $_FILES["file"]["size"];
  $allowed_file_types = array('.jpg','.jpeg','.png','.gif');  
  $newfilename = md5($file_basename) . $file_ext;
  $user=$_SESSION['username'];
   $tar=$user.$newfilename;
  $dbconn = mysqli_connect("127.0.0.1", "root", "", $user);
  if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000))
  { 
    // Rename file
    $newfilename = md5($file_basename) . $file_ext;
    if (file_exists($user. $newfilename))
    {
      // file already exists error
      echo "You have already uploaded this file.";
    }
    else
    {   
      $tar=$user."/".$newfilename;
      move_uploaded_file($_FILES["file"]["tmp_name"], $tar);     
      $mysql="INSERT INTO $user (images) VALUES ('$tar')";
      if (mysqli_query($dbconn, $mysql)) {
        echo "
    <div style='color:white;margin-top:100px;' align='center'><h1>Your photo has been uploaded</h1><a href='user-profile.php'><button style='backgound-color:green;font-size:25px;text-decoration:none;color:white;background-color:red;border:solid 1px red;'>go to your profile</button></a></div>";

      } else {
        echo "

    <div style='color:white;margin-top:100px;' align='center'><h1>Sorry, there was a problem</h1></div>
";
    }
    }
  }
  elseif (empty($file_basename))
  { 
    // file selection error
    echo "Please select a file to upload.";
  } 
  elseif ($filesize > 200000)
  { 
    // file size error
    echo "The file you are trying to upload is too large.";
  }
  else
  {
    // file type error
    echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
    unlink($_FILES["file"]["tmp_name"]);
  }
}
?>
