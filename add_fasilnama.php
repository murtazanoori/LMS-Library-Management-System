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
                 $sql = "INSERT INTO `fasilnama`(`fasilnama_id`, `fasilnama_title`, `author`, `publish_year`, `fas_info`, `publish_place`, `fas_number`, `b_c_id`, `copy`, `created_at`) VALUES ('".$getData[0]."','".$getData[1]."' ,'".$getData[2]."' ,'".$getData[3]."' ,'".$getData[4]."' ,'".$getData[5]."','".$getData[6]."','".$getData[7]."' ,'".$getData[8]."' ,NOW())";
                       $result = mysqli_query($con, $sql);
            if(!isset($result))
            {
              echo "<script type=\"text/javascript\">
                  alert(\"Invalid File:Please Upload CSV File.\");
                  window.location = \"manage_fasilnama.php\"
                  </script>";    
            }
            else {
                echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"manage_fasilnama.php\"
              </script>";
            }
               }
          
               fclose($file);  
         }
      }   
	     if(isset($_POST["Export"])){
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=fasilnama.csv');  
          $output = fopen("php://output", "w");  
		 
          fputcsv($output, array('fasilnama_id', 'fasilnama_title', 'author', 'publish_year', 'fas_info' ,'publish_place' , 'fas_number','b_c_id','copy','created_at'));  
          $query = "SELECT * from fasilnama ORDER BY fasilnama_id DESC";  
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
if (isset($_POST['subFasilnama'])) {
    
    $fasilnama_id = $_POST['fas_id'];    
    $title = $_POST['fasilnama_title'];
    $author = $_POST['author'];
    $publishYear = $_POST['publish_year'];
    $fasilnamaInfo = $_POST['fas_info'];
    $publishPlace = $_POST['publish_place'];
    $fasilnamaNumber = $_POST['fas_number'];
    $copy = $_POST['copy'];
    $fasilnamaSubject = $_POST['fasilnama_subject'];
    $case_id = $_POST['case_id'];
    $row = $_POST['row'];
    $column = $_POST['column'];



    $check_sql = mysqli_query($con, 'SELECT fasilnama_id FROM fasilnama LIMIT 0,1');
    $num_row = mysqli_num_rows($check_sql);
    $newId = 0;
    if($num_row > 0){
        $case_check = mysqli_query($con, 'SELECT fasilnama_id FROM fasilnama INNER JOIN book_case ON fasilnama.b_c_id = book_case.b_c_id 
        WHERE book_case.book_case_id ="'.$case_id.'" ORDER BY(fasilnama_id) DESC LIMIT 0,1');
        $num_row_data = mysqli_num_rows($case_check);
        if($num_row_data > 0){
            while($row3 = mysqli_fetch_assoc($case_check)){
                $last_id = $row3['fasilnama_id'];
                $string2 = (string)$last_id;
                $digit = substr($string2,8, 4);
                if($digit <= 8){
                    $digit += 1;
                    $newId = $fasilnama_id.'000'.$digit;
                }else if($digit <= 98){
                    $digit += 1;
                    $newId = $fasilnama_id.'00'.$digit;
                }else if($digit <= 998){
                    $digit += 1;
                    $newId = $fasilnama_id.'0'.$digit;
                }else{
                    $digit++;
                    $newId = $fasilnama_id.$digit;
                }
            }
        }else{
            $newId = $fasilnama_id . '0001';
        }
    }else{
        $newId = $fasilnama_id . '0001';
    }



    $sql = 'SELECT * FROM book_case WHERE book_case_id = "'.$case_id.'" AND c_row = '.$row.' AND c_column = "'.$column.'" ';
    $res = mysqli_query($con, $sql);
    $b_c_id = 0;
    while($row = mysqli_fetch_assoc($res)){
    $b_c_id = $row['b_c_id'];
    }

    $sql = "INSERT INTO fasilnama(`fasilnama_id`,`fasilnama_title`, `author`, `publish_year`, `fas_info`, `publish_place`, `fas_number`,`b_c_id`, `copy`, `created_at`)
    VALUES ('$newId','$title',' $author','$publishYear','$fasilnamaInfo','$publishPlace','$fasilnamaNumber','$b_c_id','$copy',NOW())";
    $query = mysqli_query($con,$sql);
    if($query){
        $select = mysqli_query($con, 'SELECT fasilnama_id FROM fasilnama WHERE fasilnama_id = "'.$newId.'"');
        $id = mysqli_fetch_assoc($select);
        $last_id = $id['fasilnama_id'];
        foreach($fasilnamaSubject as $x)
        {
            $sub = mysqli_query($con, "INSERT INTO fasilnama_subject(`subject`, `fasilnama_id`) VALUES ('$x',$last_id) ");
        }
        if($sub){
            header("location:add_book.php?Data_Inserted");
            $_SESSION['response']="Data Saved Success!";
            $_SESSION['res_type']="success";
        }else{
            echo mysqli_error($con);
        }
    }else{ 
        echo mysqli_error($con);
    }
}

// delete
if (isset($_POST['delete_btn_set'])) {
        
    $del_id = $_POST['delete_id'];
    $q = "DELETE FROM fasilnama WHERE fasilnama_id = '$del_id'";
    $query = mysqli_query($con,$q);
    if ($query) {
        # code...
        echo "delete";
    }else{
        echo "filed";
    }
}

// end


// edit
if (isset($_POST['fasilnama_update'])) {
    $fasilnama_id = $_POST['fasilnama_id'];
     $fasilnama_title = $_POST['fasilnama_title'];
     $author = $_POST['author'];
     $publish_year = $_POST['publish_year'];
     $fas_info = $_POST['fas_info'];
     $publish_place = $_POST['publish_place'];
     $fas_number = $_POST['fas_number'];
     //$fasilnama_subject = $_POST['fasilnama_subject'];
     
     $copy = $_POST['copy'];
     
     $b_c_id = $_POST['b_c_id'];
     
    
         # code...
     
         # code...
     
         $query_edit = "UPDATE `fasilnama` SET `fasilnama_title`='$fasilnama_title',`author`='$author',`publish_year`='$publish_year',`fas_info`='$fas_info',`publish_place`='$publish_place',`fas_number`='$fas_number',`b_c_id`='$b_c_id',`copy`='$copy' WHERE fasilnama_id = '$fasilnama_id'";
         $result_set = mysqli_query($con, $query_edit);
   
         if ($result_set) {
             # code...
             header("location:manage_fasilnama?Data_updated");
             $_SESSION['response']="Data Updated Success!";
             $_SESSION['res_type']="success";
   
         //echo "data update it.";
         } else {
             # code...
             header("location:manage_fasilnama?somting wrong updating");
             $_SESSION['response']="Oops! Somting Wrong Data Cant Update Success!";
             $_SESSION['res_type']="success";
   
             //echo "data cant update it.!";
         }
     }
    
   
     # code...
   
    
   
 
 // end

?>