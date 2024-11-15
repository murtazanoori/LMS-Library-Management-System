<?php
require('connection_DB.php');
$case = $_POST['bookCase'];

$sql = "SELECT * FROM book_case WHERE book_case_id = '".$case."' ";
$query_run = mysqli_query($con, $sql);
$reauly_array = [];
if(mysqli_num_rows($query_run) > 0){
    foreach($query_run as $row)
    {
        array_push($reauly_array, $row);
    }
    echo json_encode($reauly_array);
}else{
    echo mysqli_error($con);
}


?>