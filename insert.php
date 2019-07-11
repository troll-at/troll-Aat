<?php
// attempt insert query execution

session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("127.0.0.1", "root", "", "trollat-login-signin");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_REQUEST['username']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
 
 //verifier que username est unique
$query = "SELECT * FROM `troll-at-users` WHERE username='$username'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$count = mysqli_num_rows($result);
if($count > 0){
    echo "username already exist !";
    die("d");
    mysqli_close($link);
}else{

    // attempt insert query execution
    $sql = "INSERT INTO `troll-at-users` (username, email, password) VALUES ('$username','$email', '$password')";
    if(mysqli_query($link, $sql)){
        $_SESSION['usernam'] = $username;
        mkdir($username);
        $sql = "CREATE DATABASE $username";
        if ($link->query($sql) === TRUE) {
            echo "";
        }
        $db=new mysqli("127.0.0.1", "root", "", $username);
        $tab = "CREATE TABLE $username (
        image_id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        images TEXT(250) NOT NULL,
        ima_text VARCHAR(250) NOT NULL,
        user_image VARCHAR(250) NOT NULL,
        reg_date TIMESTAMP
        ) ";
        if ($db->query($tab) === TRUE) {
            
            $t = "CREATE TABLE image (
        image TEXT(250) NOT NULL
        ) ";
        $ta = "CREATE TABLE couverture (
        image TEXT(250) NOT NULL
        ) ";
        $tat = "CREATE TABLE followers (
        username TEXT(250) NOT NULL
        ) ";
         $taat = "CREATE TABLE following (
        username TEXT(250) NOT NULL
        ) ";
        if ($db->query($t) === TRUE){
            if ($db->query($ta) === TRUE){
                if ($db->query($taat) === TRUE) {
                 if ($db->query($tat) === TRUE) {
                
                echo "<div style='color:white;margin-top:100px;' align='center'><h1>Your account has been created please finsh it with upload photos</h1><a href='insert-data.php'><button style='backgound-color:green;font-size:25px;text-decoration:none;color:white;background-color:red;border:solid 1px red;'>finish</button></a></div>";

                
            }}}
        }
        }

}}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Finish your account</title>
</head>
<body style="background-color:#ff9700;">

</body>
</html>