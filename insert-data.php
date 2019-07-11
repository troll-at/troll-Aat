<?php
if (isset($_SESSION['u'])) {
	header('Location: sign.php');

}
  ?>
<!DOCTYPE html>
<head>
	<title>photo profile</title>
</head>
<html>
<body style="margin:0;background-color:#ff9700;">
<h1 style="color: white;margin-top:300px;" align="center">Please finish your account with uploading your profile photo</h1>
<div style="font-size: 25px;" align="center">
<form action="insert-d.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input  type="submit" value="Upload Image" name="submit">
</form>
</div>
</body>
</html>
