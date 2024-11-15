<?php 
require('connection_DB.php');
$faculty = $_POST['faculty_id'];

$sql = "SELECT * FROM department WHERE faculty_id = '".$faculty."' ";
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