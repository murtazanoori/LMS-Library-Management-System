<?php 
    session_start();
    require('connection_DB.php');
    
    $id = $_POST['id'];
    $book = $_POST['book'];
    $book_type = $_POST['btype'];


    $update_loan = mysqli_query($con, 'UPDATE loan SET `loan_status` = 1 WHERE l_id = "'.$id.'"');
    if($book_type == 'book'){
        $update_book = mysqli_query($con, 'SELECT copy FROM book WHERE book_id = "'.$book.'"');
        $update_book2 = mysqli_fetch_array($update_book);
        $copy = $update_book2[0];
        $copy += 1;
        $update_book_copy = mysqli_query($con, 'UPDATE book SET `copy` = '.$copy.' WHERE book_id = '.$book.'');
        if($update_loan && $update_book_copy){
            echo json_encode('return');
        }else{
            echo json_encode('error');
        }
    }else if($book_type == 'fasilnama'){
        $update_book = mysqli_query($con, 'SELECT copy FROM fasilnama WHERE fasilnama_id = "'.$book.'"');
        $update_book2 = mysqli_fetch_array($update_book);
        $copy = $update_book2[0];
        $copy += 1;
        $update_book_copy = mysqli_query($con, 'UPDATE fasilnama SET `copy` = '.$copy.' WHERE fasilnama_id = '.$book.'');
        if($update_loan && $update_book_copy){
            echo json_encode('return');
        }else{
            echo json_encode('error');
        }
    }
    else if($book_type == 'general'){
        $update_book = mysqli_query($con, 'SELECT copy FROM general_book WHERE general_book_id = "'.$book.'"');
        $update_book2 = mysqli_fetch_array($update_book);
        $copy = $update_book2[0];
        $copy += 1;
        $update_book_copy = mysqli_query($con, 'UPDATE general_book SET `copy` = '.$copy.' WHERE general_book_id = '.$book.'');
        if($update_loan && $update_book_copy){
            echo json_encode('return');
        }else{
            echo json_encode('error');
        }
    }else if($book_type == 'history'){
        $update_book = mysqli_query($con, 'SELECT copy FROM history_book WHERE hs_id = "'.$book.'"');
        $update_book2 = mysqli_fetch_array($update_book);
        $copy = $update_book2[0];
        $copy += 1;
        $update_book_copy = mysqli_query($con, 'UPDATE history_book SET `copy` = '.$copy.' WHERE hs_id = '.$book.'');
        if($update_loan && $update_book_copy){
            echo json_encode('return');
        }else{
            echo json_encode('error');
        }
    }else if($book_type == 'rule'){
        $update_book = mysqli_query($con, 'SELECT copy FROM rule_book WHERE r_id = "'.$book.'"');
        $update_book2 = mysqli_fetch_array($update_book);
        $copy = $update_book2[0];
        $copy += 1;
        $update_book_copy = mysqli_query($con, 'UPDATE rule_book SET `copy` = '.$copy.' WHERE r_id = '.$book.'');
        if($update_loan && $update_book_copy){
            echo json_encode('return');
        }else{
            echo json_encode('error');
        }
    }else if($book_type == 'monograph'){
        $update_book = mysqli_query($con, 'SELECT copy FROM monograph WHERE mo_id = "'.$book.'"');
        $update_book2 = mysqli_fetch_array($update_book);
        $copy = $update_book2[0];
        $copy += 1;
        $update_book_copy = mysqli_query($con, 'UPDATE monograph SET `copy` = '.$copy.' WHERE mo_id = '.$book.'');
        if($update_loan && $update_book_copy){
            echo json_encode('return');
        }else{
            echo json_encode('error');
        }
    }
?>