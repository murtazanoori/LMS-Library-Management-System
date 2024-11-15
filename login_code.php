<?php
session_start();
require('connection_DB.php');

if(isset($_POST['login'])) {
$username =  $_POST['username'];
$password =  $_POST['password'];
$password = hash("sha256",$password);
if (empty($_POST['username']) || empty($_POST['password'])) {

    header("location:login?Empty= Please Fill in the blanks");
    # code...
}else {
    # code...
    
	  $sql=mysqli_query($con,"SELECT username,password,role FROM users where username ='$username' and password='$password' limit 0,1");
      $num_row=mysqli_num_rows($sql);
      if($num_row==1){
          $row = mysqli_fetch_assoc($sql);
          $user_role = $row['role'];
          $_SESSION['welcome'] = $username;
          $_SESSION['role'] = $user_role;
          header("location:system?user=$username");
      }else{
          header("location:login?Invalid= Please Enter Correct Username and Password");
      }
     
}


}

?>