<?php 
    session_start();
    require('connection_DB.php');
    if(isset($_POST['book_id'])){

        $id = $_POST['student_id'];
        $book_id = $_POST['book_id'];

        $query = mysqli_query($con, 'SELECT loaner_type, book_type FROM loan WHERE loaner = "'.$id.'" AND book_id = "'.$book_id.'"');
        $row = mysqli_fetch_array($query);
        $loaner_table_name = $row[0];
        $book_table_name = $row[1];
        
        if(($loaner_table_name == '0') && ($book_table_name == 'book')){
            $join_sql = 'SELECT student.stu_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, student.name, student.lastname, book.book_title, loan.loan_date, loan.return_date FROM loan 
            JOIN book ON book.book_id = loan.book_id JOIN student ON student.stu_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                    echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '0') && ($book_table_name == 'fasilnama')){
            $join_sql = 'SELECT student.stu_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, student.name, student.lastname, fasilnama.fasilnama_title, loan.loan_date, loan.return_date FROM loan 
            JOIN fasilnama ON fasilnama.fasilnama_id = loan.book_id JOIN student ON student.stu_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '0') && ($book_table_name == 'general')){
            $join_sql = 'SELECT student.stu_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, student.name, student.lastname, general_book.book_title, loan.loan_date, loan.return_date FROM loan 
            JOIN general_book ON general_book.general_book_id = loan.book_id JOIN student ON student.stu_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '0') && ($book_table_name == 'history')){
            $join_sql = 'SELECT student.stu_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, student.name, student.lastname, history_book.book_title, loan.loan_date, loan.return_date FROM loan 
            JOIN history_book ON history_book.hs_id = loan.book_id JOIN student ON student.stu_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '0') && ($book_table_name == 'monograph')){
            $join_sql = 'SELECT student.stu_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, student.name, student.lastname, monograph.m_title, loan.loan_date, loan.return_date FROM loan 
            JOIN monograph ON monograph.mo_id = loan.book_id JOIN student ON student.stu_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '0') && ($book_table_name == 'rule')){
            $join_sql = 'SELECT student.stu_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, student.name, student.lastname, rule_book.book_title, loan.loan_date, loan.return_date FROM loan 
            JOIN rule_book ON rule_book.r_id = loan.book_id JOIN student ON student.stu_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '1') && ($book_table_name == 'book')){
            $join_sql = 'SELECT teacher.teacher_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, teacher.name, teacher.lastname, book.book_title, loan.loan_date, loan.return_date FROM loan 
            JOIN book ON book.book_id = loan.book_id JOIN teacher ON teacher.teacher_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                    echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '1') && ($book_table_name == 'fasilnama')){
            $join_sql = 'SELECT teacher.teacher_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, teacher.name, teacher.lastname, fasilnama.fasilnama_title, loan.loan_date, loan.return_date FROM loan 
            JOIN fasilnama ON fasilnama.fasilnama_id = loan.book_id JOIN teacher ON teacher.teacher_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '1') && ($book_table_name == 'general')){
            $join_sql = 'SELECT teacher.teacher_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, teacher.name, teacher.lastname, general_book.book_title, loan.loan_date, loan.return_date FROM loan 
            JOIN general_book ON general_book.general_book_id = loan.book_id JOIN teacher ON teacher.teacher_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '1') && ($book_table_name == 'history')){
            $join_sql = 'SELECT teacher.teacher_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, teacher.name, teacher.lastname, history_book.book_title, loan.loan_date, loan.return_date FROM loan 
            JOIN history_book ON history_book.hs_id = loan.book_id JOIN teacher ON teacher.teacher_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '1') && ($book_table_name == 'monograph')){
            $join_sql = 'SELECT teacher.teacher_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, teacher.name, teacher.lastname, monograph.m_title, loan.loan_date, loan.return_date FROM loan 
            JOIN monograph ON monograph.mo_id = loan.book_id JOIN teacher ON teacher.teacher_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '1') && ($book_table_name == 'rule')){
            $join_sql = 'SELECT teacher.teacher_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, teacher.name, teacher.lastname, rule_book.book_title, loan.loan_date, loan.return_date FROM loan 
            JOIN rule_book ON rule_book.r_id = loan.book_id JOIN teacher ON teacher.teacher_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '2') && ($book_table_name == 'book')){
            $join_sql = 'SELECT employee.e_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, employee.name, employee.lastname, book.book_title, loan.loan_date, loan.return_date FROM loan 
            JOIN book ON book.book_id = loan.book_id JOIN employee ON employee.e_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                    echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '2') && ($book_table_name == 'fasilnama')){
            $join_sql = 'SELECT employee.e_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, employee.name, employee.lastname, fasilnama.fasilnama_title, loan.loan_date, loan.return_date FROM loan 
            JOIN fasilnama ON fasilnama.fasilnama_id = loan.book_id JOIN employee ON employee.e_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '2') && ($book_table_name == 'general')){
            $join_sql = 'SELECT employee.e_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, employee.name, employee.lastname, general_book.book_title, loan.loan_date, loan.return_date FROM loan 
            JOIN general_book ON general_book.general_book_id = loan.book_id JOIN employee ON employee.e_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '2') && ($book_table_name == 'history')){
            $join_sql = 'SELECT employee.e_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, employee.name, employee.lastname, history_book.book_title, loan.loan_date, loan.return_date FROM loan 
            JOIN history_book ON history_book.hs_id = loan.book_id JOIN employee ON employee.e_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '2') && ($book_table_name == 'monograph')){
            $join_sql = 'SELECT employee.e_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, employee.name, employee.lastname, monograph.m_title, loan.loan_date, loan.return_date FROM loan 
            JOIN monograph ON monograph.mo_id = loan.book_id JOIN employee ON employee.e_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }else if(($loaner_table_name == '2') && ($book_table_name == 'rule')){
            $join_sql = 'SELECT employee.e_id, loan.l_id, loan.book_id, loan.loan_status, loan.book_type, employee.name, employee.lastname, rule_book.book_title, loan.loan_date, loan.return_date FROM loan 
            JOIN rule_book ON rule_book.r_id = loan.book_id JOIN employee ON employee.e_id = loan.loaner WHERE loan.loaner = "'.$id.'" AND loan.book_id = "'.$book_id.'"';
            $join_query = mysqli_query($con, $join_sql);
            $num_row = mysqli_num_rows($join_query);
            if($num_row > 0){
                while($row2 = mysqli_fetch_array($join_query)){
                echo json_encode($row2);
                }
            }else{
                echo json_encode('no record');
            }
        }
        
        exit();
    }
?>