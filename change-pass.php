<?php
session_start();
 $connection = mysqli_connect("127.0.0.1", "root", "", "trollat-login-signin");
if (isset($_SESSION['id5024041245'])) {
$a=$_SESSION['newpass'];
$z=$_SESSION['username'];
$sql = "UPDATE `troll-at-users` SET password='".$a."'WHERE username='".$z."';";
$result=mysqli_query($connection, $sql);
if ($result) {
	 echo "<script>window.location='login.php';</script>";
}
}else{
	echo "no";
}

?>