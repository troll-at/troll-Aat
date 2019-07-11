<!DOCTYPE html>
<html>
<head>
   <title></title>
</head>
<body>
<div style="width:30%;">
   <form method="post" action="change-password.php">
      <div>
         <label style="color:blue;">Old Password</label>
         <input type="password" name="old_pass" placeholder="Old Password . . . . .">
      </div>
      <div>
         <label style="color:blue;">New Password</label>
         <input type="password" name="new_pass" placeholder="New Password . . . . .">
      </div>
      <div>
         <label style="color:blue;">Re-Type New Password</label>
         <input type="password" name="re_pass" placeholder="Re-Type New Password . . . . .">
      </div>
      <button type="submit" name="re_password">Submit</button>
   </form>
</div>
</body>
</html>
<?php
$database_connection = mysqli_connect("localhost", "root", "", "trollat-login-signin") or die();?>
<?php
 
if (isset($_POST['re_password']))
   {
   $old_pass = $_POST['old_pass'];
   $new_pass = $_POST['new_pass'];
   $re_pass = $_POST['re_pass'];
   $password_query = mysqli_query("select * from users where id='1'");
   $password_row = mysqli_fetch_array($password_query);
   $database_password = $password_row['password'];
   if ($database_password == $old_pass)
      {
      if ($new_pass == $re_pass)
         {
         $update_pwd = mysqli_query("update users set password='$new_pass' where id='1'");
         echo "<script>alert('Update Sucessfully'); window.location='index.php'</script>";
         }
        else
         {
         echo "<script>alert('Your new and Retype Password is not match'); window.location='index.php'</script>";
         }
      }
     else
      {
      echo "<script>alert('Your old password is wrong'); window.location='index.php'</script>";
      }
   }
 
?>