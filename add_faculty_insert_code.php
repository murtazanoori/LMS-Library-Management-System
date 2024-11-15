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
                 $sql = "INSERT into faculty (faculty_id, faculty_name) 
                       values ('".$getData[0]."','".$getData[1]."')";
                       $result = mysqli_query($con, $sql);
            if(!isset($result))
            {
              echo "<script type=\"text/javascript\">
                  alert(\"Invalid File:Please Upload CSV File.\");
                  window.location = \"add_faculty.php\"
                  </script>";    
            }
            else {
                echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"add_faculty.php\"
              </script>";
            }
               }
          
               fclose($file);  
         }
      }   
	     if(isset($_POST["Export"])){
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=Faculty.csv');  
          $output = fopen("php://output", "w");  
		 
          fputcsv($output, array('faculty_id', 'faculty_name'));  
          $query = "SELECT * from faculty ORDER BY faculty_id DESC";  
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
    # code...
    $faculty_id = $_POST['faculty_id'];
    $faculty_name = $_POST['faculty_name'];
 

    $sql = "INSERT INTO `faculty`(`faculty_id`,`faculty_name`) VALUES ('$faculty_id','$faculty_name')";
    $query = mysqli_query($con,$sql);
    if($query){
        header("location:add_faculty?Data_Inserted");
        $_SESSION['response']="Data Saved Success!";
        $_SESSION['res_type']="success";
    }else{ echo "faild";}
}


// delete code


if (isset($_POST['delete_btn_set'])) {
        
  $del_id = $_POST['delete_id'];
  $q = "DELETE FROM faculty WHERE 	faculty_id = '$del_id'";
  $query = mysqli_query($con,$q);
  if ($query) {
      # code...
      echo "delete";
  }else{
      echo "filed";
  }
  
}


// end



if (isset($_POST['delete_faculty'])) {

  $faculty_id = $_POST['faculty_id'];
  $faculty_name = $_POST['faculty_name'];
  $query_edit = "UPDATE faculty SET faculty_id='$faculty_id',faculty_name='$faculty_name' WHERE faculty_id='$faculty_id'";
  $result_set = mysqli_query($con,$query_edit);

  if ($result_set) {
    # code...
    header("location:faculty_list?Data_Updated");
    $_SESSION['response']="Data Updated Success!";
    $_SESSION['res_type']="success";

    //echo "data update it.";
  }else {
    # code...
    header("location:faculty_list?somting wrong updating");
    $_SESSION['response']="Hopes! Somting Wrong Data Cant Update Success!";
    $_SESSION['res_type']="success";

    //echo "data cant update it.!";
  }

  # code...

 
}

?>