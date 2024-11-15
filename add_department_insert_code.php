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
                 $sql = "INSERT into department (department_id, department_name) 
                       values ('".$getData[0]."','".$getData[1]."')";
                       $result = mysqli_query($con, $sql);
            if(!isset($result))
            {
              echo "<script type=\"text/javascript\">
                  alert(\"Invalid File:Please Upload CSV File.\");
                  window.location = \"add_department.php\"
                  </script>";    
            }
            else {
                echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"add_department.php\"
              </script>";
            }
               }
          
               fclose($file);  
         }
      }   
	     if(isset($_POST["Export"])){
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=Department.csv');  
          $output = fopen("php://output", "w");  
		 
          fputcsv($output, array('department_id', 'department_name'));  
          $query = "SELECT * from department ORDER BY department_id DESC";  
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
if(!isset($_SESSION)){
    session_start();
  }
  if (isset($_POST['done'])) {

    $department_id = $_POST['department_id'];
    $faculty_id = $_POST['faculty_id'];
    $department_name = $_POST['department_name'];
    $sql = "INSERT INTO `department`(`department_id`,`department_name`,`faculty_id`) VALUES ('$department_id','$department_name','$faculty_id')";
    $query = mysqli_query($con,$sql);
    if($query){
    header("location:add_department.php?Data_Inserted");
        $_SESSION['response']="Data Saved Success!";
        $_SESSION['res_type']="success";
    }else{
      echo "faild";
    }
}




if (isset($_POST['delete_btn_set'])) {
        
  $del_id = $_POST['delete_id'];
  $q = "DELETE FROM department WHERE department_id = '$del_id'";
  $query = mysqli_query($con,$q);
  if ($query) {
      # code...
      echo "delete";
  }else{
      echo "filed";
  }
}


if (isset($_POST['delete_department'])) {

  $department_id = $_POST['department_id'];
  $department_name = $_POST['department_name'];
  $query_edit = "UPDATE department SET department_id='$department_id',department_name='$department_name' WHERE department_id='$department_id'";
  $result_set = mysqli_query($con,$query_edit);

  if ($result_set) {
    # code...
    header("location:department_list?Data_Inserted");
    $_SESSION['response']="Data Updated Success!";
    $_SESSION['res_type']="success";

    //echo "data update it.";
  }else {
    # code...
    header("location:department_list?somting wrong updating");
    $_SESSION['response']="Hopes! Somting Wrong Data Cant Update Success!";
    $_SESSION['res_type']="success";

    //echo "data cant update it.!";
  }

  # code...

 
}

?>








