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
                 $sql = "INSERT into position (position_id, position_name) 
                       values ('".$getData[0]."','".$getData[1]."')";
                       $result = mysqli_query($con, $sql);
            if(!isset($result))
            {
              echo "<script type=\"text/javascript\">
                  alert(\"Invalid File:Please Upload CSV File.\");
                  window.location = \"add_position.php\"
                  </script>";    
            }
            else {
                echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"add_position.php\"
              </script>";
            }
               }
          
               fclose($file);  
         }
      }   
	     if(isset($_POST["Export"])){
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=Position.csv');  
          $output = fopen("php://output", "w");  
		 
          fputcsv($output, array('position_id', 'position_name'));  
          $query = "SELECT * from position ORDER BY position_id DESC";  
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

    $position_name = $_POST['position_name'];
    $sql = "INSERT INTO `position`(`position_name`) VALUES ('$position_name')";
    $query = mysqli_query($con,$sql);
    if($query){
        header("location:add_position.php?Data_Inserted");
        $_SESSION['response']="Data Saved Success!";
        $_SESSION['res_type']="success";
    }else{
      echo "faild";
    }
}



// delete code


if (isset($_POST['delete_btn_set'])) {
        
  $del_id = $_POST['delete_id'];
  $q = "DELETE FROM position WHERE 	position_id = '$del_id'";
  $query = mysqli_query($con,$q);
  if ($query) {
      # code...
      echo "delete";
  }else{
      echo "filed";
  }
  
}


// end




if (isset($_POST['edit_position'])) {

  $position_id = $_POST['position_id'];
  $position_name = $_POST['position_name'];
  $query_edit = "UPDATE `position` SET `position_name` = '$position_name' WHERE `position`.`position_id` = '$position_id'";
  $result_set = mysqli_query($con,$query_edit);

  if ($result_set) {
    # code...
    header("location:position_list?Data_updated");
    $_SESSION['response']="Data Updated Success!";
    $_SESSION['res_type']="success";

    //echo "data update it.";
  }else {
    # code...
    header("location:position_list?somting wrong updating");
    $_SESSION['response']="Hopes! Somting Wrong Data Cant Update Success!";
    $_SESSION['res_type']="success";

    //echo "data cant update it.!";
  }

  # code...

 
}

?>

