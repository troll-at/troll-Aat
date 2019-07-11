<?php
$link = mysqli_connect("127.0.0.1", "root", "", "trollat-login-signin");
$query="SELECT count(username) AS total FROM `troll-at-users`";
$result=mysqli_query($link, $query);
$values=mysqli_fetch_assoc($result);
$num_rows=$values['total'];
echo $num_rows;
?>