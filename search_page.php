
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
            <?php 
                include 'add_book_insert_code.php';
                
                if (isset($_SESSION['response'])) { ?>
                    <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center auto-close">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <b class=""><?= $_SESSION['response'];?></b>
                    </div>
                    <?php } unset($_SESSION['response']);?>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="">
                        <br><br>
                        <div class="body">
                        <?php 
                            include 'connection_DB.php';
                            if (isset($_POST['search'])) {
                                # code...
                                $book_title = $_POST['book_title'];
                                $translator = $_POST['translator'];
                                $author = $_POST['author'];
                                $faculty = $_POST['faculty'];
                                $q = 'SELECT * FROM `book` JOIN book_case ON book.b_c_id = book_case.b_c_id JOIN faculty ON book.faculty_id = faculty.faculty_id JOIN department ON 
                                book.department_id = department.department_id WHERE book.book_title LIKE "'.$book_title.'" OR book.translator LIKE "'.$translator.'" OR book.author LIKE "'.$author.'" OR book.faculty_id LIKE "'.$faculty.'"';
                                $query = mysqli_query($con,$q);
                                if (mysqli_num_rows($query) > 0) { 
                            ?>
                         

                            <div class="">
                                
                                <table class="table table-responsive table-bordered table-hover js-basic-example dataTable table-custom">
                                    <thead>
                                        <tr>
                                           
                                            <th>Book ID</th>
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
                                        <?php

                                        while($res = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>


                                        <th scope="row">

                                            <?php echo $res['book_id'];?>

                                        </th>
                                        <td>
                                        <?php echo $res['book_title'];?>
                                        </td>

                                        <td>
                                        <?php echo $res['author'];?>
                                        </td>

                                        <td>
                                        <?php echo $res['translator'];?>
                                        </td>

                                        <td>
                                        <?php echo $res['publish_place'];?>
                                        </td>
                                        <td>
                                        <?php echo $res['publisher'];?>
                                        </td>
                                        <td>
                                        <?php echo $res['publish_year'];?>
                                        </td>
                                        <td>
                                        <?php echo $res['volume'];?>
                                        </td>
                                        <td>
                                        <?php echo $res['book_edition'];?>
                                        </td>
                                        <td>
                                        <?php echo $res['number_page'];?>
                                        </td>
                                        <td>
                                        <?php echo $res['book_language'];?>
                                        </td>
                                        <td>
                                        <?php 
                                            if($res['copy']==1){
                                                //echo"Admin";
                                                ?>
                                                <label class="badge badge-success"><?php echo "1";?></lable>
                                            <?php
                                            }
                                            elseif($res['copy']==2){
                                                //echo"Librarian";      
                                        ?>
                                        <label class="badge badge-warning"><?php echo"2";?></lable>
                                        <?php
                                            } elseif ($res['copy']==3) {
                                                # code...
                                        ?>
                                            <label class="badge badge-dark"><?php echo "3";?></lable>
                                        <?php
                                            } elseif ($res['copy']==4) {
                                                # code...
                                            ?>
                                            <label class="badge badge-danger"><?php echo "4";?></lable>
                                            <?php
                                                } elseif ($res['copy']==5) {
                                                    # code...
                                            ?>
                                                <label class="badge badge-primary"><?php echo "5";?></lable>
                                            <?php 
                                                } elseif ($res['copy']==6) {
                                                    # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "6";?></lable>
                                            <?php
                                                }elseif ($res['copy']==7) {
                                                    # code...
                                            ?>
                                                <label class="badge badge-success"><?php echo "7";?></lable>
                                            <?php
                                                }elseif ($res['copy']==8) {
                                                    # code...
                                            ?>
                                                <label class="badge badge-info"><?php echo "8";?></lable>
                                            <?php
                                                }elseif ($res['copy']==9) {
                                                    # code...
                                            ?>
                                                <label class="badge badge-dark"><?php echo "9";?></lable>
                                            <?php
                                                }elseif ($res['copy']==10) {
                                                    # code...
                                            ?>
                                                <label class="badge badge-secondary text-warning"><?php echo "10";?></lable>
                                            <?php }?>
                                        </td>
                                        <td>
                                        <?php echo $res['book_case_id'];?><?php echo $res['c_row'];?><?php echo $res['c_column'];?>
                                        </td>
                                        <td>
                                        <?php echo $res['faculty_name'];?>
                                        </td>
                                        <td>
                                        <?php echo $res['department_name'];?>
                                        </td>
                                        </tr>
                                        <?php
                                            
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                        }else{?>
                            
                                <div class="alert alert-success alert-dismissible text-center auto-close">
                                    <h6> Oops! No Record Found</h6>
                                </div>
                            
                        <?php }

                            }else{
                        ?>
                            <div class="mt-4">
                                <div class="alert alert-warning alert-dismissible text-center">
                                     <b class="">Search Data To Show Record.!</b>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                                
                                
                            </div>
                             
                        </div>
                        
                    </div>
                    </form>
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


