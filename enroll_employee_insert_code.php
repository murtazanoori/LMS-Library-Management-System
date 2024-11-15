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
                 $sql = "INSERT into employee (e_id, name, lastname , email, position_id) 
                       values ('".$getData[0]."','".$getData[1]."' ,'".$getData[2]."' ,'".$getData[3]."' ,'".$getData[4]."')";
                       $result = mysqli_query($con, $sql);
            if(!isset($result))
            {
              echo "<script type=\"text/javascript\">
                  alert(\"Invalid File:Please Upload CSV File.\");
                  window.location = \"enroll_employees.php\"
                  </script>";    
            }
            else {
                echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"enroll_employees.php\"
              </script>";
            }
               }
          
               fclose($file);  
         }
      }   
	     if(isset($_POST["Export"])){
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=Employee.csv');  
          $output = fopen("php://output", "w");  
		 
          fputcsv($output, array('e_id', 'name', 'lastname', 'email', 'position_id' ));  
          $query = "SELECT * from employee ORDER BY e_id DESC";  
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

    $employee_id = $_POST['e_id'];
    $first_name = $_POST['name'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $position_id = $_POST['position_id'];


    $sql = "INSERT INTO `employee`(`e_id`, `name`, `lastname`, `email`,`position_id`) VALUES ('$employee_id','$first_name','$last_name','$email','$position_id');";
    $query = mysqli_query($con,$sql);
    if($query){
    header("location:enroll_employees.php?Data_Inserted");
        $_SESSION['response']="Data Saved Success!";
        $_SESSION['res_type']="success";
    }
    else{

      header("location:enroll_employees.php?Data_cant_insert");
        $_SESSION['response']="Somthing wrong! cant insert data on system.";
        $_SESSION['res_type']="success";
      //echo "faild";

    } 
}

// delete section

if (isset($_POST['delete_btn_set'])) {
        
  $del_id = $_POST['delete_id'];
  $q = "DELETE FROM employee WHERE e_id = '$del_id'";
  $query = mysqli_query($con,$q);
  if ($query) {
    // header("location:enroll_employees?delete_success");
    // $_SESSION['response']="Data Saved Success!";
    // $_SESSION['res_type']="success";
      # code...
      echo "delete";
  }else{
      // echo "filed";
       header("location:enroll_employees?cant delete");
    $_SESSION['response']="Hops! Somting wrong system cant delete data try agin.";
    $_SESSION['res_type']="success";
  }
}

// end

// UDPATE STUDENT DATA
if(isset($_POST['employee_update'])){
  $e_id = $_POST['e_id'];
  $name = $_POST['name'];
  $last_name = $_POST['lastname'];
  $email = $_POST['email'];
  $position_id = $_POST['position_id'];

  $update_data = 'UPDATE employee SET e_id="'.$e_id.'", name = "'.$name.'", lastname = "'.$last_name.'", email = "'.$email.'", position_id = "'.$position_id.'" WHERE e_id = "'.$e_id.'"';
  $run = mysqli_query($con, $update_data);
  if($run){
      header("location:manage_employees?Data_updated");
      $_SESSION['response']="Data updated Success!";
      $_SESSION['res_type']="success";
      //echo 'Data Updated Successfully';
  }else{
      header("location:manage_employees?Data_cant_updated");
      $_SESSION['response']="Hey! somting wrong: data cant update try agin";
      $_SESSION['res_type']="success";
      //echo 'Data Not Updated';
  }

}

// end

?>
