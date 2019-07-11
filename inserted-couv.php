<?php
session_start();



if (isset($_POST['submit']))
{
  
  $filename =$_FILES["fileToUpload"]["name"];
  $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
  $file_ext = substr($filename, strripos($filename, '.')); // get file name
  $filesize = $_FILES["fileToUpload"]["size"];
  $allowed_file_types = array('.jpg','.jpeg','.gif');  
  $newfilename = md5($file_basename) . $file_ext;
  $user=$_SESSION['usernam'];
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
      move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $tar);     
      $mysql="INSERT INTO couverture (image) VALUES ('$tar')";
      if (mysqli_query($dbconn, $mysql)) {
        echo "<div style='color:white;margin-top:100px;' align='center'><h1>Congratulation your account is ready to use</h1><a href='login.php'><button style='backgound-color:green;font-size:25px;text-decoration:none;color:white;background-color:red;border:solid 1px red;'>go to your profile</button></a></div>";

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
<!DOCTYPE html>
<html>
<head>
    <title>Couverture</title>
</head>
<body style="background-color:#ff9700;">

</body>
</html>