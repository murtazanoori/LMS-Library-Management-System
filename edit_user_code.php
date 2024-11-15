<?php
include 'connection_DB.php';
	if(isset($_POST['done'])){
	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$username = $_POST['user_name'];
	$password = $_POST['password'];
	
	$user_role = $_POST['user_role'];
	 
	 $img_name = $_FILES['user_image']['name'];
	$img_size = $_FILES['user_image']['size'];
	$img_type = pathinfo($img_name,PATHINFO_EXTENSION);
	$img_tmp_name = $_FILES['user_image']['tmp_name'];
		
   $old_id = $_POST['old_id'];
   $old_img = $_POST['old_img'];
	$query = "SELECT photo FROM users WHERE user_id=$old_id";
	$sql = mysqli_query($con,$query);
	$data = mysqli_fetch_array($sql);
	$img = $data['photo'];
	$file = "user_image/".$img;
	$uploadok=0;
		//if(file_exists($file)){
		//echo '<script language="javascript" type="text/javascript"> 
               // confirm("Image already exists");
       // </script>';
		//$uploadok=-1;	
	//}
	
	if($img_size >=6291456){
		echo '<script language="javascript" type="text/javascript"> 
                alert("Image size is large");
        </script>';
			$uploadok=-1;
	}
		
	elseif(!empty($img_name) && $img_type !="jpg" && $img_type !="jpeg" && $img_type !="png"){
		echo '<script language="javascript" type="text/javascript"> 
                alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                window.location = "all_user.php";
        </script>';
			$uploadok=-1;
	}	
	if( !empty($img_name)){
		move_uploaded_file($img_tmp_name,"user_image/".$img_name);
		unlink($file);
	   $query1 = "UPDATE users SET name='$name', username='$username' ,password='$password',role='$user_role', photo='$img_name' WHERE user_id='$old_id'";
		  $sql = mysqli_query($con,$query1);
		$uploadok==0;
		 

	 
	 }
	elseif(empty($img_name)){
		$query2 = "UPDATE users SET name='$name',lastname='$lastname', username='$username' ,password='$password',role='$user_role', photo='$old_img'  WHERE user_id='$old_id'";
		$sql = mysqli_query($con,$query2);
	}
    
        if ($sql) {
        
            # code...
        
            header("location:manage_user?Data_Updated");
            $_SESSION['response']="Data Updated Success!";
            $_SESSION['res_type']="success";
        } else {
            header("location:manage_user?something_wrong_try_again");
            $_SESSION['response']="something wrong try again";
            $_SESSION['res_type']="success";
        }
    }

	
	


if (isset($_POST['delete_btn_set'])) {
        
	$del_id = $_POST['delete_id'];
	if (isset($_POST['delete_id'])) {
	  $res = mysqli_query($con,"SELECT * FROM users WHERE user_id = '$del_id'");
	  while ($row = mysqli_fetch_array($res)) {
		$img=$row['photo'];
		unlink('user_image/'.$img);
	   }
	}

	

	$q = "DELETE FROM users WHERE user_id = '$del_id'";
	$query = mysqli_query($con,$q);
	if ($query) {
		# code...
		echo "delete";
	}else{
		echo "filed";
	}
}

?>