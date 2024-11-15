<?php
session_start();
require('connection_DB.php');

$from = $_POST['from'];
$section = $_POST['section'];

if(($from == 'book') && ($section == '0')){
    $join = 'SELECT student.stu_id, student.name, student.lastname, book.book_id, book.book_title, loan.loan_date, loan.return_date FROM `loan` 
    JOIN student ON student.stu_id = loan.loaner JOIN book ON book.book_id = loan.book_id WHERE loan_status = 0 AND loaner_type = 0 AND book_type = "book"';
    $query = mysqli_query($con, $join);
    $reauly_array = [];
    if(mysqli_num_rows($query) > 0){
        foreach($query as $row)
        {
            array_push($reauly_array, $row);
        }
        echo json_encode($reauly_array);
    }else{
        echo mysqli_error($con);
    }
}

?>