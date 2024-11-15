<?php
    require('connection_DB.php');
    if(isset($_POST['employee_id'])){
        $stu_id = $_POST['employee_id'];
        $query = mysqli_query($con, 'SELECT * FROM employee WHERE e_id = "'.$stu_id.'"');
        $num_row = mysqli_num_rows($query);
        if($num_row > 0)
        {
            while($row = mysqli_fetch_array($query)){
                echo json_encode($row);
            }
        }else{
            echo json_encode('no record');
        }
    }else{
        //
    }

    if(isset($_POST['book_id'])){
        $book_id = $_POST['book_id'];
        $query2 = mysqli_query($con, 'SELECT * FROM book WHERE book_id = "'.$book_id.'"');
        $num_row2 = mysqli_num_rows($query2);
        if($num_row2 > 0)
        {
            while($row2 = mysqli_fetch_array($query2)){
                echo json_encode($row2);
            }
        }else{
            echo json_encode('no record');
        }
    }  

    
    if(isset($_POST['fasilnama_id'])){
        $fasilnama_id = $_POST['fasilnama_id'];
        $query3 = mysqli_query($con, 'SELECT * FROM fasilnama WHERE fasilnama_id = "'.$fasilnama_id.'"');
        $num_row3 = mysqli_num_rows($query3);
        if($num_row3 > 0)
        {
            while($row3 = mysqli_fetch_array($query3)){
                echo json_encode($row3);
            }
        }else{
            echo json_encode('no record found');
        }
    }  

    if(isset($_POST['general_id'])){
        $general_book_id = $_POST['general_id'];
        $query4 = mysqli_query($con, 'SELECT * FROM general_book WHERE general_book_id = "'.$general_book_id.'"');
        $num_row4 = mysqli_num_rows($query4);
        if($num_row4 > 0)
        {
            while($row4 = mysqli_fetch_array($query4)){
                echo json_encode($row4);
            }
        }else{
            echo json_encode('no record found');
        }
    } 

    if(isset($_POST['bookrule_id'])){
        $r_id = $_POST['bookrule_id'];
        $query5 = mysqli_query($con, 'SELECT * FROM rule_book WHERE r_id = "'.$r_id.'"');
        $num_row5 = mysqli_num_rows($query5);
        if($num_row5 > 0)
        {
            while($row5 = mysqli_fetch_array($query5)){
                echo json_encode($row5);
            }
        }else{
            echo json_encode('no record found');
        }
    }   
    
    

    if(isset($_POST['monograph_id'])){
        $mo_id = $_POST['monograph_id'];
        $query6 = mysqli_query($con, 'SELECT * FROM monograph WHERE mo_id = "'.$mo_id.'"');
        $num_row6 = mysqli_num_rows($query6);
        if($num_row6 > 0)
        {
            while($row6 = mysqli_fetch_array($query6)){
                echo json_encode($row6);
            }
        }else{
            echo json_encode('no record found');
        }
    }   


    if(isset($_POST['bookh_id'])){
        $hs_id = $_POST['bookh_id'];
        $query7 = mysqli_query($con, 'SELECT * FROM history_book WHERE hs_id = "'.$hs_id.'"');
        $num_row7 = mysqli_num_rows($query7);
        if($num_row7 > 0)
        {
            while($row7 = mysqli_fetch_array($query7)){
                echo json_encode($row7);
            }
        }else{
            echo json_encode('no record found');
        }
    }   

    
?>

