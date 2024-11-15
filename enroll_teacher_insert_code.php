<?php
if(!isset($_SESSION)){
  session_start();
}
  include 'connection_DB.php';
     if(isset($_POST["Import"])){
        
        $filename=$_FILES["file"]["tmp_name"];    
         if($_FILES["file"]["size"] > 0)
         {
            $file = fopen($filename, "r");
			
              while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
               {
                 $sql = "INSERT into teacher (teacher_id, name, lastname , email, shift ,phone,department_id ) 
                       values ('".$getData[0]."','".$getData[1]."' ,'".$getData[2]."' ,'".$getData[3]."' ,'".$getData[4]."' ,'".$getData[5]."','".$getData[6]."')";
                       $result = mysqli_query($con, $sql);
            if(!isset($result))
            {
              echo "<script type=\"text/javascript\">
                  alert(\"Invalid File:Please Upload CSV File.\");
                  window.location = \"enroll_teacher.php\"
                  </script>";    
            }
            else {
                echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"enroll_teacher.php\"
              </script>";
            }
               }
          
               fclose($file);  
         }
      }   
	     if(isset($_POST["Export"])){
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=Teacher.csv');  
          $output = fopen("php://output", "w");  
		 
          fputcsv($output, array('teacher_id', 'name', 'lastname', 'email', 'shift' ,'phone', 'department_id'));  
          $query = "SELECT * from teacher ORDER BY teacher_id DESC";  
          $result = mysqli_query($con, $query);  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }  
?>
<?php
if(!isset($_SESSION)){
  session_start();
}
include 'connection_DB.php';
if (isset($_POST['done'])) {
    # code...
    $teacher_id = $_POST['teacher_id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $shift = $_POST['shift'];
    $phone = $_POST['phone'];
    $department_id = $_POST['department_id'];
    
 

    $sql = "INSERT INTO `teacher`(`teacher_id`, `name`, `lastname`,`email`, `shift`, `phone`, `department_id`) VALUES ('$teacher_id','$name','$lastname','$email','$shift','$phone','$department_id')";
    $query = mysqli_query($con,$sql);
    if($query){
        header("location:enroll_teacher?Data Inserted");
        $_SESSION['response']="Data Saved Success!";
        $_SESSION['res_type']="success";
    }
    else{ 
      header("location:enroll_teacher?cant insert");
      $_SESSION['response']="Hey! Somting Wrong Data Cant insert to system.";
      $_SESSION['res_type']="success";
      // echo "failed"; 
    }
}

// delete section

if (isset($_POST['delete_btn_set'])) {
        
  $del_id = $_POST['delete_id'];
  $q = "DELETE FROM teacher WHERE teacher_id = '$del_id'";
  $query = mysqli_query($con,$q);
  if ($query) {
      # code...
      echo "delete";
  }else{
      echo "filed";
  }
}

// end



 // UDPATE STUDENT DATA
 if(isset($_POST['teacher_update'])){
  $teacher_id = $_POST['teacher_id'];
  $name = $_POST['name'];
  $last_name = $_POST['lastname'];
  $email = $_POST['email'];
  $shift = $_POST['shift'];
  $phone = $_POST['phone'];
  $department = $_POST['department_id'];

  $update_data = 'UPDATE teacher SET teacher_id="'.$teacher_id.'", name = "'.$name.'", lastname = "'.$last_name.'", email = "'.$email.'", shift = "'.$shift.'", 
  phone = "'.$phone.'", department_id = "'.$department.'" WHERE teacher_id = "'.$teacher_id.'"';
  $run = mysqli_query($con, $update_data);
  if($run){
      header("location:manage_teacher?Data_updated");
      $_SESSION['response']="Data updated Success!";
      $_SESSION['res_type']="success";
      //echo 'Data Updated Successfully';
  }else{
      header("location:manage_teacher?Data_cant_updated");
      $_SESSION['response']="Hey! somting wrong: data cant update try agin";
      $_SESSION['res_type']="success";
      //echo 'Data Not Updated';
  }

}

// end

?>