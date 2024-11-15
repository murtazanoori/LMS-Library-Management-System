<?php
    include 'connection_DB.php';
    if (isset($_POST['delete_btn_set'])) {
        # code...
        $del_id = $_POST['delete_id'];
        $q = "DELETE FROM student WHERE stu_id = '$del_id'";
        $query = mysqli_query($con,$q);

        if ($query) {
            # code...
            echo "delete";
        }else{
            echo "filed";
        }
    }

?>