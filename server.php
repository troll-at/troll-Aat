<?php  //Start the Session
session_start();
error_reporting(E_ERROR | E_PARSE);
 $connection = mysqli_connect("127.0.0.1", "root", "", "trollat-login-signin");

//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `troll-at-users` WHERE username='$username' and password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count > 0){
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['id5024041245'] = "hello";
header('Location: user-profile.php');

}else{
	echo "false";
}
}
//3.1.4 if the user is logged in Greets the user with message

?>