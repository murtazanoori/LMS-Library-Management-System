<?php

include 'connection_DB.php';
session_start();
if(isset($_POST['done'])){
	$title = $_POST['title'];
	$info = $_POST['info'];
	$author = $_POST['author'];
	$publish_year = $_POST['publish_year'];
    $pages = $_POST['pages'];
    $avalibality = $_POST['avalibality'];
    
	 $img_name = $_FILES['pic']['name'];
	$img_size = $_FILES['pic']['size'];
	$img_type = pathinfo($img_name,PATHINFO_EXTENSION);
	
		# code...
	
	$img_tmp_name = $_FILES['pic']['tmp_name'];
	 move_uploaded_file($img_tmp_name,"journal/".$img_name);
		$query = mysqli_query($con,"INSERT INTO `journal`(`title`, `info`, `author`,`publish_year`,`pages`,`avalibality`, `photo`) VALUES ('$title','$info','$author','$publish_year','$pages','$avalibality','$img_name')");
		if ($query) {
				header("location:add_journal?Data_Inserted");
				$_SESSION['response']="Data Saved Success!";
				$_SESSION['res_type']="success";
		
	}else {
		# code...
	
			header("location:add_journal?something_wrong_try_again");
			$_SESSION['response']="Hops! something wrong try again!";
			$_SESSION['res_type']="success";

	}
	
}

if (isset($_POST['delete_btn_set'])) {
        
	$del_id = $_POST['delete_id'];
	if (isset($_POST['delete_id'])) {
	  $res = mysqli_query($con,"SELECT * FROM journal WHERE j_id = '$del_id'");
	  while ($row = mysqli_fetch_array($res)) {
		$img=$row['photo'];
		unlink('journal/'.$img);
	   }
	}

	

	$q = "DELETE FROM journal WHERE j_id = '$del_id'";
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
    $title = $_POST['title'];
    $info = $_POST['info'];
	$author = $_POST['author'];
    $publish_year = $_POST['publish_year'];
    $pages = $_POST['pages'];
    $avalibality = $_POST['avalibality'];
	
	 
	 $img_name = $_FILES['pic']['name'];
	$img_size = $_FILES['pic']['size'];
	$img_type = pathinfo($img_name,PATHINFO_EXTENSION);
	$img_tmp_name = $_FILES['pic']['tmp_name'];
		
   $old_id = $_POST['old_id'];
   $old_img = $_POST['old_img'];
	$query = "SELECT photo FROM journal WHERE j_id=$old_id";
	$sql = mysqli_query($con,$query);
	$data = mysqli_fetch_array($sql);
	$img = $data['photo'];
	$file = "journal/".$img;
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
                window.location = "journal_list";
        </script>';
			$uploadok=-1;
	}	
	if( !empty($img_name)){
		move_uploaded_file($img_tmp_name,"journal/".$img_name);
		unlink($file);
	   $query1 = "UPDATE journal SET title='$title', info='$info' ,author='$author',publish_year='$publish_year',pages='$pages',avalibality='$avalibality', photo='$img_name' WHERE j_id='$old_id'";
		  $sql = mysqli_query($con,$query1);
		$uploadok==0;
		 

	 
	 }
	 elseif(empty($img_name)){
		$query2 = "UPDATE journal SET title='$title', info='$info',author='$author',publish_year='$publish_year',pages='$pages',avalibality='$avalibality', photo='$old_img'  WHERE j_id='$old_id'";
		$sql = mysqli_query($con,$query2);
	 }
	if($sql){
	    header("location:journal_list?Data_Updated");
        $_SESSION['response']="Data Updated Success!";
        $_SESSION['res_type']="success";

	}
	else {
	header("location:journal_list?something_wrong_try_again");
	$_SESSION['response']="something wrong try again";
	$_SESSION['res_type']="success";
}
	
	
}
?>
