






<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GU-LIB</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->

  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logo Gawharshad.png" />
</head>
<!-- end row -->





<div class="row col-12 d-flex align-items-center justify-content-between" style="margin-top:20px;">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Recent Search Book</h4><br>
               
                <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br>
              
                                        
                    <!-- table -->

                    <div id="main-content">
        <div class="container-fluid ">
            <div class="block-header">
               
            </div>
            

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="">
                        <br><br>
                        <div class="body">
                        
                         

                            <div class="">
                            <?php 

                                include 'connection_DB.php';

                                if (isset($_GET['id']) && $_GET['id']>0 && isset($_GET['t']) && $_GET['t']!='') {
                                    $id = mysqli_real_escape_string($con, $_GET['id']);
                                    $t = mysqli_real_escape_string($con, $_GET['t']);
                                    if ($t=="book") {
                                        # code...
                                        // $table ="book";
                                        $sql = "SELECT * FROM book JOIN book_case ON book.b_c_id = book_case.b_c_id JOIN faculty ON book.faculty_id = faculty.faculty_id JOIN department ON 
                                        book.department_id = department.department_id WHERE book_id='$id'";
                                        $res = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_array($res); ?>
                                
                                
                                <table class="table table-responsive table-bordered table-hover js-basic-example dataTable table-custom">
                                    <thead>
                                        <tr>
                                           
                                            
                                            <th>Book Title</th>
                                            <th>Author</th>
                                            <th>Translator</th>
                                            <th>Publish Place</th>
                                            <th>Publisher</th>
                                            <th>Publish Year</th>
                                            <th>Volume</th>
                                            <th>Book Edition</th>
                                            <th>Page</th>
                                            <th>Book Language</th>
                                            <th>Copy</th>
                                            <th>BC ID</th>
                                            <th>Faculty</th>
                                            <th>Dep</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                        <tr>


                                       
                                        <td>
                                        <?php echo $row['book_title']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['author']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['translator']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['publish_place']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['publisher']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['publish_year']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['volume']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['book_edition']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['number_page']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['book_language']; ?>
                                        </td>
                                        <td>
                                        <?php
                                            if ($row['copy']==1) {
                                                //echo"Admin";?>
                                                <label class="badge badge-success"><?php echo "1"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==2) {
                                                //echo"Librarian";
                                        ?>
                                        <label class="badge badge-warning"><?php echo"2"; ?></lable>
                                        <?php
                                            } elseif ($row['copy']==3) {
                                                # code...?>
                                            <label class="badge badge-dark"><?php echo "3"; ?></lable>
                                        <?php
                                            } elseif ($row['copy']==4) {
                                                # code...
                                            ?>
                                            <label class="badge badge-danger"><?php echo "4"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==5) {
                                                # code...?>
                                                <label class="badge badge-primary"><?php echo "5"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==6) {
                                                # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "6"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==7) {
                                                # code...?>
                                                <label class="badge badge-success"><?php echo "7"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==8) {
                                                # code...
                                            ?>
                                                <label class="badge badge-info"><?php echo "8"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==9) {
                                                # code...?>
                                                <label class="badge badge-dark"><?php echo "9"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==10) {
                                                # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "10"; ?></lable>
                                            <?php
                                            } ?>
                                        </td>
                                        <td>
                                        <?php echo $row['book_case_id']; ?><?php echo $row['c_row']; ?><?php echo $row['c_column']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['faculty_name']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['department_name']; ?>
                                        </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                               
                                <?php
                                    } elseif ($t =="general_book") {
                                        # code...
                                        // $table ="general_book";
                                        $sql = "SELECT * FROM general_book JOIN book_case ON general_book.b_c_id = book_case.b_c_id WHERE general_book_id='$id'";
                                        $res = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_array($res); ?>
                                    <table class="table table-responsive table-bordered table-hover js-basic-example dataTable table-custom">
                                    <thead>
                                        <tr>
                                           
                                           
                                            <th>Book Title</th>
                                            <th>Subject</th>
                                            <th>Author</th>
                                            <th>Translator</th>
                                            <th>Publisher</th>
                                            <th>Publish Place</th>
                                            <th>Volume</th>
                                            <th>Edition</th>
                                            <th>Page</th>
                                            <th>BC ID</th>
                                            <th>Copy</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                        <tr>


                                        <td>
                                        <?php echo $row['book_title']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['subject']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['author']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['translator']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['publisher']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['publish_place']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['volume']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['edition']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['page']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['book_case_id']; ?><?php echo $row['c_row']; ?><?php echo $row['c_column']; ?>
                                        </td>
                                        <td>
                                        <?php
                                            if ($row['copy']==1) {
                                                //echo"Admin";?>
                                                <label class="badge badge-success"><?php echo "1"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==2) {
                                                //echo"Librarian";
                                        ?>
                                        <label class="badge badge-warning"><?php echo"2"; ?></lable>
                                        <?php
                                            } elseif ($row['copy']==3) {
                                                # code...?>
                                            <label class="badge badge-dark"><?php echo "3"; ?></lable>
                                        <?php
                                            } elseif ($row['copy']==4) {
                                                # code...
                                            ?>
                                            <label class="badge badge-danger"><?php echo "4"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==5) {
                                                # code...?>
                                                <label class="badge badge-primary"><?php echo "5"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==6) {
                                                # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "6"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==7) {
                                                # code...?>
                                                <label class="badge badge-success"><?php echo "7"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==8) {
                                                # code...
                                            ?>
                                                <label class="badge badge-info"><?php echo "8"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==9) {
                                                # code...?>
                                                <label class="badge badge-dark"><?php echo "9"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==10) {
                                                # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "10"; ?></lable>
                                            <?php
                                            } ?>
                                        </td>
                                        
                                        
                                        
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <?php
                                    } elseif ($t =="monograph") {
                                        # code...
                                        // $table ="monograph";
                                        $sql = "SELECT * FROM monograph JOIN book_case ON monograph.b_c_id = book_case.b_c_id JOIN faculty ON monograph.faculty_id = faculty.faculty_id JOIN department ON 
                                        monograph.department_id = department.department_id WHERE mo_id='$id'";
                                        $res = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_array($res);
     
                                        # code...?>
                                 <table class="table table-responsive table-bordered table-hover js-basic-example dataTable table-custom">
                                    <thead>
                                        <tr>
                                           
                                            
                                            <th>Monograph Title</th>
                                            <th>Author</th>
                                            <th>Guide Teacher</th>
                                            <th>graduation Year</th>
                                            <th>Score</th>
                                            <th>Faculty</th>
                                            <th>Dep</th>
                                            <th>BC ID</th>
                                            <th>Copy</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                        <tr>


                                        
                                        <td>
                                        <?php echo $row['m_title']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['Author']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['guide_teacher']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['graduation_year']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['score']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['faculty_name']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['department_name']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['book_case_id']; ?><?php echo $row['c_row']; ?><?php echo $row['c_column']; ?>
                                        </td>
                                        
                                        
                                        <td>
                                        <?php
                                            if ($row['copy']==1) {
                                                //echo"Admin";?>
                                                <label class="badge badge-success"><?php echo "1"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==2) {
                                                //echo"Librarian";
                                        ?>
                                        <label class="badge badge-warning"><?php echo"2"; ?></lable>
                                        <?php
                                            } elseif ($row['copy']==3) {
                                                # code...?>
                                            <label class="badge badge-dark"><?php echo "3"; ?></lable>
                                        <?php
                                            } elseif ($row['copy']==4) {
                                                # code...
                                            ?>
                                            <label class="badge badge-danger"><?php echo "4"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==5) {
                                                # code...?>
                                                <label class="badge badge-primary"><?php echo "5"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==6) {
                                                # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "6"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==7) {
                                                # code...?>
                                                <label class="badge badge-success"><?php echo "7"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==8) {
                                                # code...
                                            ?>
                                                <label class="badge badge-info"><?php echo "8"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==9) {
                                                # code...?>
                                                <label class="badge badge-dark"><?php echo "9"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==10) {
                                                # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "10"; ?></lable>
                                            <?php
                                            } ?>
                                        </td>
                                        
                                       
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <?php
                                    } elseif ($t =="fasilnama") {
                                        # code...
                                        // $table ="monograph";
                                        $sql = "SELECT * FROM fasilnama JOIN book_case ON fasilnama.b_c_id = book_case.b_c_id WHERE fasilnama_id='$id'";
                                        $res = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_array($res);
                                        //    echo $row['fasilnama_title'];?>
                                 <table class="table table-responsive table-bordered table-hover js-basic-example dataTable table-custom">
                                    <thead>
                                        <tr>
                                           
                                            
                                            <th>Fasilnama Title</th>
                                            <th>Author</th>
                                            <th>Publish Year</th>
                                            <th>Fasilnama Information</th>
                                            <th>Publish Place</th>
                                            <th>Fasilnama Number</th>
                                            <th>BC ID</th>
                                            <th>Copy</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                        <tr>


                                        
                                        <td>
                                        <?php echo $row['fasilnama_title']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['author']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['publish_year']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['fas_info']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['publish_place']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['fas_number']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['book_case_id']; ?><?php echo $row['c_row']; ?><?php echo $row['c_column']; ?>
                                        </td>
                                        
                                        
                                        <td>
                                        <?php
                                            if ($row['copy']==1) {
                                                //echo"Admin";?>
                                                <label class="badge badge-success"><?php echo "1"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==2) {
                                                //echo"Librarian";
                                        ?>
                                        <label class="badge badge-warning"><?php echo"2"; ?></lable>
                                        <?php
                                            } elseif ($row['copy']==3) {
                                                # code...?>
                                            <label class="badge badge-dark"><?php echo "3"; ?></lable>
                                        <?php
                                            } elseif ($row['copy']==4) {
                                                # code...
                                            ?>
                                            <label class="badge badge-danger"><?php echo "4"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==5) {
                                                # code...?>
                                                <label class="badge badge-primary"><?php echo "5"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==6) {
                                                # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "6"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==7) {
                                                # code...?>
                                                <label class="badge badge-success"><?php echo "7"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==8) {
                                                # code...
                                            ?>
                                                <label class="badge badge-info"><?php echo "8"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==9) {
                                                # code...?>
                                                <label class="badge badge-dark"><?php echo "9"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==10) {
                                                # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "10"; ?></lable>
                                            <?php
                                            } ?>
                                        </td>
                                        
                                       
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <?php
                                    } elseif ($t =="rule_book") {
                                        # code...
                                        // $table ="monograph";
                                        $sql = "SELECT * FROM rule_book JOIN book_case ON rule_book.b_c_id = book_case.b_c_id WHERE R_id='$id'";
                                        $res = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_array($res);
                                        //    echo $row['fasilnama_title'];?>
                                         <table class="table table-responsive table-bordered table-hover js-basic-example dataTable table-custom">
                                    <thead>
                                        <tr>
                                           
                                            
                                            <th>Rule Title</th>
                                            <th>Author</th>
                                            <th>Translator</th>
                                            <th>Publish Place</th>
                                            <th>Publisher</th>
                                            <th>Publish Year</th>
                                            <th>Volume</th>
                                            <th>Book Edition</th>
                                            <th>Page</th>
                                            <th>BC ID</th>
                                            <th>Copy</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                        <tr>


                                        
                                        <td>
                                        <?php echo $row['book_title']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['Author']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['Translator']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['publish_place']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['publisher']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['publish_year']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['volume']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['book_edition']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['page']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['book_case_id']; ?><?php echo $row['c_row']; ?><?php echo $row['c_column']; ?>
                                        </td>
                                        
                                        
                                        <td>
                                        <?php
                                            if ($row['copy']==1) {
                                                //echo"Admin";?>
                                                <label class="badge badge-success"><?php echo "1"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==2) {
                                                //echo"Librarian";
                                        ?>
                                        <label class="badge badge-warning"><?php echo"2"; ?></lable>
                                        <?php
                                            } elseif ($row['copy']==3) {
                                                # code...?>
                                            <label class="badge badge-dark"><?php echo "3"; ?></lable>
                                        <?php
                                            } elseif ($row['copy']==4) {
                                                # code...
                                            ?>
                                            <label class="badge badge-danger"><?php echo "4"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==5) {
                                                # code...?>
                                                <label class="badge badge-primary"><?php echo "5"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==6) {
                                                # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "6"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==7) {
                                                # code...?>
                                                <label class="badge badge-success"><?php echo "7"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==8) {
                                                # code...
                                            ?>
                                                <label class="badge badge-info"><?php echo "8"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==9) {
                                                # code...?>
                                                <label class="badge badge-dark"><?php echo "9"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==10) {
                                                # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "10"; ?></lable>
                                            <?php
                                            } ?>
                                        </td>
                                        
                                       
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                
                                <?php
                                    } elseif ($t =="history_book") {
                                        # code...
                                        // $table ="monograph";
                                        $sql = "SELECT * FROM history_book JOIN book_case ON history_book.b_c_id = book_case.b_c_id WHERE hs_id='$id'";
                                        $res = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_array($res);
                                        //    echo $row['book_title'];?>
                                     <table class="table table-responsive table-bordered table-hover js-basic-example dataTable table-custom">
                                    <thead>
                                        <tr>
                                           
                                            
                                            <th>Rule Title</th>
                                            <th>Author</th>
                                            <th>Translator</th>
                                            <th>Publish Place</th>
                                            <th>Publisher</th>
                                            <th>Publish Year</th>
                                            <th>Volume</th>
                                            <th>Book Edition</th>
                                            <th>Page</th>
                                            <th>BC ID</th>
                                            <th>Copy</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                        <tr>


                                        
                                        <td>
                                        <?php echo $row['book_title']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['Author']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['Translator']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['publish_place']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['publisher']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['publish_year']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['volume']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['edition']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['page']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['book_case_id']; ?><?php echo $row['c_row']; ?><?php echo $row['c_column']; ?>
                                        </td>
                                        
                                        
                                        <td>
                                        <?php
                                            if ($row['copy']==1) {
                                                //echo"Admin";?>
                                                <label class="badge badge-success"><?php echo "1"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==2) {
                                                //echo"Librarian";
                                        ?>
                                        <label class="badge badge-warning"><?php echo"2"; ?></lable>
                                        <?php
                                            } elseif ($row['copy']==3) {
                                                # code...?>
                                            <label class="badge badge-dark"><?php echo "3"; ?></lable>
                                        <?php
                                            } elseif ($row['copy']==4) {
                                                # code...
                                            ?>
                                            <label class="badge badge-danger"><?php echo "4"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==5) {
                                                # code...?>
                                                <label class="badge badge-primary"><?php echo "5"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==6) {
                                                # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "6"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==7) {
                                                # code...?>
                                                <label class="badge badge-success"><?php echo "7"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==8) {
                                                # code...
                                            ?>
                                                <label class="badge badge-info"><?php echo "8"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==9) {
                                                # code...?>
                                                <label class="badge badge-dark"><?php echo "9"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==10) {
                                                # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "10"; ?></lable>
                                            <?php
                                            } ?>
                                        </td>
                                        
                                       
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <?php
                                    } elseif ($t =="cd") {
                                        # code...
                                        // $table ="monograph";
                                        $sql = "SELECT * FROM cd JOIN book_case ON cd.b_c_id = book_case.b_c_id WHERE cd_id='$id'";
                                        $res = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_array($res);
                                        //    echo $row['cd_title'];?>
                                      <table class="table table-responsive table-bordered table-hover js-basic-example dataTable table-custom">
                                    <thead class="">
                                        <tr>
                                           
                                            
                                            <th>CD Title</th>
                                            <th>Subject</th>
                                            <th>Presenter</th>
                                            <th>Files Info</th>
                                            <th>Author</th>
                                            <th>CD Number</th>
                                            <th>Date</th>
                                            <th>BC ID</th>
                                            <th>Copy</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                        <tr>
                                        
                                        <td>
                                        <?php echo $row['cd_title']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['subject']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['presenter']; ?>
                                        </td>

                                        <td>
                                        <?php echo $row['presenter']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['Author']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['cd_number']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['created_at']; ?>
                                        </td>
                                        <td>
                                        <?php echo $row['book_case_id']; ?><?php echo $row['c_row']; ?><?php echo $row['c_column']; ?>
                                        </td>
                                        
                                        
                                        <td>
                                        <?php
                                            if ($row['copy']==1) {
                                                //echo"Admin";?>
                                                <label class="badge badge-success"><?php echo "1"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==2) {
                                                //echo"Librarian";
                                        ?>
                                        <label class="badge badge-warning"><?php echo"2"; ?></lable>
                                        <?php
                                            } elseif ($row['copy']==3) {
                                                # code...?>
                                            <label class="badge badge-dark"><?php echo "3"; ?></lable>
                                        <?php
                                            } elseif ($row['copy']==4) {
                                                # code...
                                            ?>
                                            <label class="badge badge-danger"><?php echo "4"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==5) {
                                                # code...?>
                                                <label class="badge badge-primary"><?php echo "5"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==6) {
                                                # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "6"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==7) {
                                                # code...?>
                                                <label class="badge badge-success"><?php echo "7"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==8) {
                                                # code...
                                            ?>
                                                <label class="badge badge-info"><?php echo "8"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==9) {
                                                # code...?>
                                                <label class="badge badge-dark"><?php echo "9"; ?></lable>
                                            <?php
                                            } elseif ($row['copy']==10) {
                                                # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "10"; ?></lable>
                                            <?php
                                            } ?>
                                        </td>

                                        
                                        
                                       
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                <?php
                                    }
                                }
                                ?> 

                            </div>
                             
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div> 



                    <!-- end -->
                    
                    
                  
                
            </div>
        </div>
    </div>
</div>
<!-- end row -->


<!-- alert auto dismiss code -->
<script src="js/jquery-3.4.1.js" charset="utf-8"></script>
<script>
    $(document).ready(function(){
        setTimeout(function() {
            $('.auto-close').fadeOut('slow');
            }, 2000);
    });
</script>

<!-- alert auto dismiss code -->
<script src="js/jquery-3.4.1.js" charset="utf-8"></script>


<!-- Javascript -->
<script src="vendors/table/bundles/libscripts.bundle.js"></script>    
<script src="vendors/table/bundles/vendorscripts.bundle.js"></script>

<script src="vendors/table/bundles/datatablescripts.bundle.js"></script>
 

<script src="vendors/table/bundles/mainscripts.bundle.js"></script>
<script src="vendors/table/js/pages/tables/jquery-datatable.js"></script>
<script src="vendors/table/js/pages/ui/dialogs.js"></script>

