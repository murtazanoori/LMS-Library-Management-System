<?php
include 'connection_DB.php';
session_start();
if(isset($_POST['done'])){
	$name = $_POST['name'];
	$dis = $_POST['dis'];
	$info = $_POST['info'];
	
	
	 $img_name = $_FILES['pic']['name'];
	$img_size = $_FILES['pic']['size'];
	$img_type = pathinfo($img_name,PATHINFO_EXTENSION);
	
		# code...
	
	$img_tmp_name = $_FILES['pic']['tmp_name'];
	 move_uploaded_file($img_tmp_name,"images/".$img_name);
		$query = mysqli_query($con,"INSERT INTO `news`(`name`, `dis`, `info`, `news_img`) VALUES ('$name','$dis','$info','$img_name')");
		if ($query) {
				header("location:news_page?Data_Inserted");
				$_SESSION['response']="Data Saved Success!";
				$_SESSION['res_type']="success";
		
	}else {
		# code...
	
			header("location:news_page?something_wrong_try_again");
			$_SESSION['response']="Hops! something wrong try again!";
			$_SESSION['res_type']="success";

	}
	
}

if (isset($_POST['delete_btn_set'])) {
        
	$del_id = $_POST['delete_id'];
	if (isset($_POST['delete_id'])) {
	  $res = mysqli_query($con,"SELECT * FROM news WHERE id = '$del_id'");
	  while ($row = mysqli_fetch_array($res)) {
		$img=$row['news_img'];
		unlink('images/'.$img);
	   }
	}

	

	$q = "DELETE FROM news WHERE id = '$del_id'";
	$query = mysqli_query($con,$q);
	if ($query) {
		# code...
		echo "delete";
	}else{
		echo "filed";
	}
}


// UDPATE STUDENT DATA



include 'connection_DB.php';
	if(isset($_POST['done_edit'])){
	$name = $_POST['name'];
	$dis = $_POST['dis'];
	$info = $_POST['info'];
	
	
	 
	 $img_name = $_FILES['pic']['name'];
	$img_size = $_FILES['pic']['size'];
	$img_type = pathinfo($img_name,PATHINFO_EXTENSION);
	$img_tmp_name = $_FILES['pic']['tmp_name'];
		
   $old_id = $_POST['old_id'];
   $old_img = $_POST['old_img'];
	$query = "SELECT news_img FROM news WHERE id=$old_id";
	$sql = mysqli_query($con,$query);
	$data = mysqli_fetch_array($sql);
	$img = $data['news_img'];
	$file = "images/".$img;
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
                window.location = "news_manage";
        </script>';
			$uploadok=-1;
	}	
	if( !empty($img_name)){
		move_uploaded_file($img_tmp_name,"images/".$img_name);
		unlink($file);
	   $query1 = "UPDATE news SET name='$name', dis='$dis' ,info='$info', news_img='$img_name' WHERE id='$old_id'";
		  $sql = mysqli_query($con,$query1);
		$uploadok==0;
		 

	 
	 }
	 elseif(empty($img_name)){
		$query2 = "UPDATE news SET name='$name', dis='$dis' ,info='$info', news_img='$old_img'  WHERE id='$old_id'";
		$sql = mysqli_query($con,$query2);
	 }
	if($sql){
	    header("location:news_manage?Data_Updated");
        $_SESSION['response']="Data Updated Success!";
        $_SESSION['res_type']="success";

	}
	else {
	header("location:news_manage?something_wrong_try_again");
	$_SESSION['response']="something wrong try again";
	$_SESSION['res_type']="success";
}
	
	
}




   

?>