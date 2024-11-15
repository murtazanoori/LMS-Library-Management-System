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
                 $sql = "INSERT INTO `monograph`(`mo_id`, `m_title`, `Author`, `guide_teacher`, `graduation_year`, `score`, `faculty_id`, `department_id`, `b_c_id`, `copy`, `created_at`) VALUES ('".$getData[0]."','".$getData[1]."' ,'".$getData[2]."' ,'".$getData[3]."' ,'".$getData[4]."' ,'".$getData[5]."','".$getData[6]."','".$getData[7]."' ,'".$getData[8]."' ,'".$getData[9]."',NOW())";
                       $result = mysqli_query($con, $sql);
            if(!isset($result))
            {
              echo "<script type=\"text/javascript\">
                  alert(\"Invalid File:Please Upload CSV File.\");
                  window.location = \"manage_monograph.php\"
                  </script>";    
            }
            else {
                echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"manage_monograph.php\"
              </script>";
            }
               }
          
               fclose($file);  
         }
      }   
	     if(isset($_POST["Export"])){
         
          header('Content-Type: text/csv; charset=utf-8');  
          header('Content-Disposition: attachment; filename=monograph.csv');  
          $output = fopen("php://output", "w");  
		 
          fputcsv($output, array('mo_id', 'm_title', 'Author', 'guide_teacher', 'graduation_year' ,'score' , 'faculty_id' , 'department_id','b_c_id','copy','created_at'));  
          $query = "SELECT * from monograph ORDER BY mo_id DESC";  
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
if (isset($_POST['subMonograph'])) {
    
    $book_id = $_POST['m_id'];
    $title = $_POST['m_title'];
    $author = $_POST['author'];
    $guideTeacher = $_POST['guide_teacher'];
    $graduationYear = $_POST['graduation_year'];
    $score = $_POST['score'];
    $copy = $_POST['copy'];
    $department_id = $_POST['department_id'];
    $faculty_id = $_POST['faculty_id'];
    $case_id = $_POST['case_id'];
    $row = $_POST['row'];
    $column = $_POST['column'];
    
    $check_sql = mysqli_query($con, 'SELECT mo_id FROM monograph LIMIT 0,1');
    $num_row = mysqli_num_rows($check_sql);
    $newId = 0;
    if($num_row > 0){
        $case_check = mysqli_query($con, 'SELECT mo_id FROM monograph INNER JOIN book_case ON monograph.b_c_id = book_case.b_c_id 
        WHERE book_case.book_case_id ="'.$case_id.'" ORDER BY(mo_id) DESC LIMIT 0,1');
        $num_row_data = mysqli_num_rows($case_check);
        if($num_row_data > 0){
            while($row3 = mysqli_fetch_assoc($case_check)){
                $last_id = $row3['mo_id'];
                $string2 = (string)$last_id;
                $digit = substr($string2,8, 4);
                if($digit <= 8){
                    $digit += 1;
                    $newId = $book_id.'000'.$digit;
                }else if($digit <= 98){
                    $digit += 1;
                    $newId = $book_id.'00'.$digit;
                }else if($digit <= 998){
                    $digit += 1;
                    $newId = $book_id.'0'.$digit;
                }else{
                    $digit++;
                    $newId = $book_id.$digit;
                }
            }
        }else{
            $newId = $book_id . '0001';
        }
    }else{
        $newId = $book_id . '0001';
    }


    
    $res = mysqli_query($con, 'SELECT b_c_id FROM book_case WHERE book_case_id = "'.$case_id.'" AND c_row = "'.$row.'" AND c_column = "'.$column.'"');
    $b_c_id = 0;
    while($row2 = mysqli_fetch_assoc($res)){
        $b_c_id = $row2['b_c_id'];
        echo $b_c_id;
    }

    $sql = "INSERT INTO monograph(`mo_id`,`m_title`, `Author`, `guide_teacher`, `graduation_year`, `score`, `faculty_id`, `department_id`, `b_c_id`, `copy`, `created_at`)
    VALUES ('$newId','$title',' $author','$guideTeacher','$graduationYear','$score','$faculty_id','$department_id','$b_c_id','$copy',NOW())";
    $query = mysqli_query($con,$sql);
    if($query){
    header("location:add_book.php?Data_Inserted");
    $_SESSION['response']="Data Saved Success!";
    $_SESSION['res_type']="success";
    }else{ 
        echo mysqli_error($con);
    }
}

// delete
if (isset($_POST['delete_btn_set'])) {
        
    $del_id = $_POST['delete_id'];
    $q = "DELETE FROM monograph WHERE mo_id = '$del_id'";
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
if (isset($_POST['monograph_update'])) {
    $mo_id = $_POST['mo_id'];
     $m_title = $_POST['m_title'];
     $Author = $_POST['Author'];
     $guide_teacher = $_POST['guide_teacher'];
     $graduation_year = $_POST['graduation_year'];
     $score = $_POST['score'];
     $faculty_id = $_POST['faculty_id'];
     $department_id = $_POST['department_id'];
     
     $copy = $_POST['copy'];
     
     $b_c_id = $_POST['b_c_id'];
     
     
     $query_edit = "UPDATE `monograph` SET `m_title`='$m_title',`Author`='$Author',`guide_teacher`='$guide_teacher',`graduation_year`='$graduation_year',`score`='$score',`faculty_id`='$faculty_id',`department_id`='$department_id',`b_c_id`='$b_c_id',`copy`='$copy' WHERE mo_id = '$mo_id'";
     $result_set = mysqli_query($con,$query_edit);
   
     if ($result_set) {
       # code...
       header("location:manage_monograph?Data_updated");
       $_SESSION['response']="Data Updated Success!";
       $_SESSION['res_type']="success";
   
       //echo "data update it.";
     }else {
       # code...
       header("location:manage_monograph?somting wrong updating");
       $_SESSION['response']="Oops! Somting Wrong Data Cant Update Success!";
       $_SESSION['res_type']="success";
   
       //echo "data cant update it.!";
     }
   
     # code...
   
    
   }
 
 // end


?>