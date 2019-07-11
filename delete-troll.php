<?php

if (isset($_GET['photoid'])) {
	
	$coanctioe = mysqli_connect("127.0.0.1", "root", "", $_GET['username']);
	$user = $_GET['username'];
	$usa = $_GET['photoid'];
	$sql = "DELETE FROM $user WHERE image_id = '$usa'";
	if (mysqli_query($coanctioe, $sql)) {
		echo "<script>window.location='user-profile.php'</script>";
	}


}












?>