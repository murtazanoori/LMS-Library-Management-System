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
                 $sql = "INSERT into student (stu_id, name, lastname , father_name, shift ,status ,phone, photo , department_id , faculty_id ) 
                       values ('".$getData[0]."','".$getData[1]."' ,'".$getData[2]."' ,'".$getData[3]."' ,'".$getData[4]."' ,'".$getData[5]."','".$getData[6]."','".$getData[7]."' ,'".$getData[8]."' ,'".$getData[9]."')";
                       $result = mysqli_query($con, $sql);
            if(!isset($result))
            {
              echo "<script type=\"text/javascript\">
                  alert(\"Invalid File:Please Upload CSV File.\");
                  window.location = \"enroll_student.php\"
                  </script>";    
            }
            else {
                echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"enroll_student.php\"
              </script>";
            }
               }
          
               fclose($file);  
         }
      }   
	     if(isset($_POST["Export"])){
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=Student.csv');  
          $output = fopen("php://output", "w");  
		 
          fputcsv($output, array('stu_id', 'name', 'last_name', 'father_name', 'shift' ,'shift' , 'phone' , 'photo', 'department_id' , 'faculty_id'));  
          $query = "SELECT * from student ORDER BY stu_id DESC";  
          $result = mysqli_query($con, $query);  
          while($row = mysqli_fetch_assoc($result))  
          {  
               fputcsv($output, $row);  
          }  
          fclose($output);  
     }  
?>
<?php
include 'connection_DB.php';
if (isset($_POST['done'])) {
    $stu_id = $_POST['stu_id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $father_name = $_POST['father_name'];
    $shift = $_POST['shift'];
    $status = $_POST['status'];
    $phone = $_POST['phone'];
    $department_id = $_POST['department_id'];
    $faculty_id = $_POST['faculty_id'];
    
    $type = $_FILES['photo']['type'];
    if($type == "image/jpeg" OR $type == "image/jpg" OR $type == "image/png" OR $type == "image/gif" OR $type == ''){
        
        $tmp=$_FILES['photo']['tmp_name'];
        $file_name=time().$_FILES['photo']['name'];
        move_uploaded_file($tmp,"upload/$file_name");
        
        $sql = "INSERT INTO `student`(`stu_id`, `name`, `lastname`, `father_name`, `shift`,`status`, `phone`, `photo`, `department_id`, `faculty_id`) VALUES ('$stu_id','$name','$lastname','$father_name','$shift','$status','$phone','$file_name','$department_id','$faculty_id')";
        $query = mysqli_query($con,$sql);
        header("location:enroll_student.php?Data_Inserted");
        $_SESSION['response']="Data Saved Success!";
        $_SESSION['res_type']="success";
    }else{
        echo 'Invalid file extension';
    }
}



    if (isset($_POST['delete_btn_set'])) {
        
        $del_id = $_POST['delete_id'];
        if (isset($_POST['delete_id'])) {
          $res = mysqli_query($con,"SELECT * FROM student WHERE stu_id = '$del_id'");
          while ($row = mysqli_fetch_array($res)) {
            $img=$row['photo'];
            unlink('upload/'.$img);
           }
        }

        
    
        $q = "DELETE FROM student WHERE stu_id = '$del_id'";
        $query = mysqli_query($con,$q);
        if ($query) {
            # code...
            echo "delete";
        }else{
            echo "filed";
        }
    }


    // UDPATE STUDENT DATA
    if(isset($_POST['student_update'])){
        $student_id = $_POST['stu_id'];
        $name = $_POST['name'];
        $father_name = $_POST['father_name'];
        $last_name = $_POST['lastname'];
        $shift = $_POST['shift'];
        $status = $_POST['status'];
        $phone = $_POST['phone'];
        $faculty = $_POST['faculty_id'];
        $department = $_POST['department_id'];
        
        
            $select = mysqli_query($con, 'SELECT photo FROM student WHERE stu_id = "'.$student_id.'"');
            $data = mysqli_fetch_array($select);
        
            if($_FILES["photo"]["name"] != ""){
                if($_FILES["photo"]["type"] == "image/jpeg" || $_FILES["photo"]["type"] == "image/png" || $_FILES["photo"]["type"] == "image/gif"){
                $path = time() . $_FILES["photo"]["name"];
                $old = $data['photo'];
                unlink('upload/'.$old);
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/$path");
                }
                else{
                //Majeed Write Code to redirect
                //header("location:update.php?insert=fail");
                    header("location:manage_student?image cant updated.");
                    $_SESSION['response']="Hops! somting wrong: data cant update try agin";
                    $_SESSION['res_type']="success";
                }
            }
            else{
                $path = $data['photo'];
            }
        $update_data = 'UPDATE student SET name = "'.$name.'", lastname = "'.$last_name.'", father_name = "'.$father_name.'", shift = "'.$shift.'", status = "'.$status.'", 
        phone = "'.$phone.'", photo = "'.$path.'", department_id = "'.$department.'", faculty_id = "'.$faculty.'" WHERE stu_id = "'.$student_id.'"';
        $run = mysqli_query($con, $update_data);
        if($run){
            header("location:manage_student?Data_updated");
            $_SESSION['response']="Data updated Success!";
            $_SESSION['res_type']="success";
            //echo 'Data Updated Successfully';
        }else{
            header("location:manage_student?Data_cant_updated");
            $_SESSION['response']="Hey! somting wrong: data cant update try agin";
            $_SESSION['res_type']="success";
            //echo 'Data Not Updated';
        }

    }
  
// end


    

?>