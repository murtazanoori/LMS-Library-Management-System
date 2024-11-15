<?php
 session_start();
include 'connection_DB.php';
if (isset($_POST['done'])) {
    # code...
    $book_case_id= $_POST['book_case_id'];
    $c_row = $_POST['c_row'];
    $c_column = $_POST['c_column'];
  
   

    $sql = "INSERT INTO `book_case`(`book_case_id`, `c_row`, `c_column`) VALUES ('$book_case_id','$c_row','$c_column');";
    $query = mysqli_query($con,$sql);
    header("location:add_book_case.php?Data_Inserted");
        $_SESSION['response']="Data Saved Success!";
        $_SESSION['res_type']="success";
}


if (isset($_POST['delete_btn_set'])) {
        
    $del_id = $_POST['delete_id'];

    $q = "DELETE FROM book_case WHERE 	b_c_id = '$del_id'";
    $query = mysqli_query($con,$q);
    if ($query) {
        # code...
        echo "delete";
    }else{
        echo "filed";
    }
}



if (isset($_POST['edit_bookCase'])) {

    $b_c_id = $_POST['b_c_id'];
    $book_case_id = $_POST['book_case_id'];
    $c_row = $_POST['c_row'];
    $c_column = $_POST['c_column'];
    $query_edit = "UPDATE `book_case` SET `book_case_id` = '$book_case_id',`c_row` = '$c_row',`c_column` = '$c_column' WHERE `book_case`.`b_c_id` = '$b_c_id'";
    $result_set = mysqli_query($con,$query_edit);
  
    if ($result_set) {
      # code...
      header("location:book_case_list?Data_updated");
      $_SESSION['response']="Data Updated Success!";
      $_SESSION['res_type']="success";
  
      //echo "data update it.";
    }else {
      # code...
      header("location:book_case_list?somting wrong updating");
      $_SESSION['response']="Hopes! Somting Wrong Data Cant Update Success!";
      $_SESSION['res_type']="success";
  
      //echo "data cant update it.!";
    }
  
    # code...
  
   
  }

?>