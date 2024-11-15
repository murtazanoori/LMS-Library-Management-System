<?php 
    session_start();
    require('connection_DB.php');
    if(isset($_POST['submit-book-btn'])){
        $bb_id = $_POST['history-id'];
        $teacher_id = $_POST['teacher-id'];
       // $loan_date = $_POST['loan-date'];
        $return_date = $_POST['return-date'];
        $book_type = $_POST['book-type'];

        $check_copy = mysqli_query($con, 'SELECT copy FROM history_book WHERE hs_id = "'.$bb_id.'"');
        $row = mysqli_fetch_array($check_copy);
        $old_copy_number = $row[0];
        if($old_copy_number > 0){
            $new_copy = ($old_copy_number - 1);
            $update_copy = mysqli_query($con, "UPDATE history_book SET `copy` = ".$new_copy." WHERE hs_id = ".$bb_id."");
            if($update_copy){
                $query = mysqli_query($con, "INSERT INTO loan(`loan_date`, `return_date`, `loan_status`, `loaner`, `loaner_type`, `book_id`, `book_type`)
                VALUES (NOW(), '$return_date', '0', '$teacher_id', '1', '$bb_id', '$book_type')");
                
                if($query){
                    header('location: add_lon_teacher.php');
                }else{
                    echo mysqli_error($con);
                } 
            }else{
                echo mysqli_error($con);
            }
        }  else{
            echo 'This book has not avaliable';
        } 
     }
?>