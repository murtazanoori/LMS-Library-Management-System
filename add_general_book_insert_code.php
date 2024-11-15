<?php
 session_start();
include 'connection_DB.php';
if (isset($_POST['done'])) {
    
    $book_title = $_POST['book_title'];
    $subject = $_POST['subject'];
    $author = $_POST['author'];
    $translator = $_POST['translator'];
    $publisher= $_POST['publisher'];
    $publish_place= $_POST['publish_place'];
    $volume= $_POST['volume'];
    $edition= $_POST['edition'];
    $page= $_POST['page'];

    $case_id = $_POST['case_id'];
    $row = $_POST['row'];
    $column = $_POST['column'];

    $copy_id = $_POST['copy_id'];
    $sql = 'SELECT * FROM book_case WHERE book_case_id = "'.$case_id.'" AND c_row = '.$row.' AND c_column = "'.$column.'"';
    $res = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($res)){
        $b_c_id = $row['b_c_id'];
    }
    
    $sql = "INSERT INTO `general_book`(`book_title`,`subject`, `author`, `translator`, `publisher`, `publish_place`, `volume`, `edition`,`page`, `b_c_id`,`copy_id`)
     VALUES ('$book_title','$subject',' $author','$translator',' $publisher',' $publish_place',' $volume',' $edition','$page','$b_c_id','$copy_id')";
    $query = mysqli_query($con,$sql);
    if($query){
        header("location:add_general_book.php?Data_Inserted");
        $_SESSION['response']="Data Saved Success!";
        $_SESSION['res_type']="success";
    }else{ echo "faild";}
}

?>