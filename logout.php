<?php
  session_start();
  if(isset($_SESSION['welcome'])){
      session_destroy();
      header("location:login.php?message=logouted");
  }
  else{
      header("location:login.php?message=required");
  }

?>