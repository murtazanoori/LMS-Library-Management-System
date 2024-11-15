<?php
session_start();
include 'connection_DB.php';
if(isset($_POST['done'])){
	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$username = $_POST['user_name'];
	$password = $_POST['password'];
	$user_role = $_POST['user_role'];
	
	$password = hash('sha256',$password);

	 $img_name = $_FILES['user_image']['name'];
	$img_size = $_FILES['user_image']['size'];
	$img_tmp_name = $_FILES['user_image']['tmp_name'];
	if($_POST['password'] == $_POST['confirm_password']){
		 move_uploaded_file($img_tmp_name,"user_image/".$img_name);
		 $sql = "INSERT INTO users(`name`,`lastname`, `username`, `password`, `role`, `photo`) VALUES ('$name','$lastname','$username','$password','$user_role','$img_name')";
		$run = mysqli_query($con, $sql);
		 if($run)
		 {
			header("location:insert_user?Data_Inserted");
			$_SESSION['response']="Data Saved Success!";
			$_SESSION['res_type']="success";
		 }else{
			 echo mysqli_error($con);
		 }
		
	} else {
	header("location:insert_user?something_wrong_try_again");
	$_SESSION['response']="Hops! something wrong try again!";
	$_SESSION['res_type']="success";
}
	
	
}

		
	
	

?>