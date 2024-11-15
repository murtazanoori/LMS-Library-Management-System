<?php
 session_start();
include 'connection_DB.php';
if (isset($_POST['done'])) {
    
    $m_title = $_POST['m_title'];
    $author = $_POST['author'];
    $guide_teacher = $_POST['guide_teacher'];
    $graduation_year = $_POST['graduation_year'];
    $score= $_POST['score'];
    $case_id = $_POST['case_id'];
    $copy_id = $_POST['copy_id'];
    $row = $_POST['row'];
    $column = $_POST['column'];
    
    $sql = 'SELECT * FROM book_case WHERE book_case_id = "'.$case_id.'" AND c_row = '.$row.' AND c_column = "'.$column.'"';
    $res = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($res)){
        $b_c_id = $row['b_c_id'];
    }
    
    $sql = "INSERT INTO `monograph`(`m_title`, `author`, `guide_teacher`, `graduation_year`, `score`, `b_c_id`,`copy_id`)
     VALUES ('$m_title',' $author','$guide_teacher','$graduation_year',' $score','$b_c_id','$copy_id')";
    $query = mysqli_query($con,$sql);
    if($query){
        header("location:add_monograph.php?Data_Inserted");
        $_SESSION['response']="Data Saved Success!";
        $_SESSION['res_type']="success";
    }else{ echo "faild";}
}

?>