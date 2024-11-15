
<?php 

ob_start();
  ?>

  
<head>
</head>
<div class="col-12 d-flex align-items-center justify-content-between">
    <div class="wrapper">
    

  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
    </div>
  </div>
  </div>
        </div>  
    <div class="d-flex align-items-center">
        <div class="wrapper mr-4 d-none d-sm-block">
            <p class="mb-0">Edit
                <b class="mb-0">Section</b>
            </p>
        </div>
        <div class="wrapper">
            <a href="system" class="btn btn-link btn-sm font-weight-bold">
                <i class="menu-icon icon-home"></i>Home</a>
        </div>
    </div>
</div>
<!-- end of header dashboard -->
<div class="card col-12" style="margin-top:40px;">
  <div class="card-header bg-info text-white">
    Resent Edit Book Case
  </div>
  <div class="card-body"><br><br>

            <?php 
                include 'add_book_case_insert_code.php';
                
                if (isset($_SESSION['response'])) { ?>
                    <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <b class=""><?= $_SESSION['response'];?></b>
                    </div>
                    <?php } unset($_SESSION['response']);?>
  
                <!-- form -->
                    <?php
                    
                        include 'connection_DB.php';
                        $b_c_id = $_GET['b_c_id'];
                        $q = "SELECT * FROM `book_case` WHERE b_c_id = '$b_c_id'";
                        $run_query = mysqli_query($con,$q);

                        if (mysqli_num_rows($run_query)>0) {
                            # code...
                            foreach ($run_query as $row) {
                                # code...
                                //echo $row['name'];
                                ?>
                                                <form action="add_book_case_insert_code.php" method="POST" enctype="multipart/form-data">
                                                   <input type="hidden" name="b_c_id" value="<?php echo $row['b_c_id'];?>">
                                                    <div class="row">
                                                    
                                                            
                                                            <div class="col-md-6 form-group mb-3">
                                                                <label for="validationCustomUsername"> Book Case ID</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text  menu-icon  icon-user"
                                                                            style="background-color:#eee;"></span>
                                                                    </div>
                                                                    <input type="number" name="book_case_id" class="form-control" placeholder="Type book case id name here.." value="<?php echo $row['book_case_id'];?>" style="height:40px;" >
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-6 form-group mb-3">
                                                                <label for="validationCustomUsername"> Case Row</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text  menu-icon  icon-user"
                                                                            style="background-color:#eee;"></span>
                                                                    </div>
                                                                    <input type="number" name="c_row" class="form-control" placeholder="Type c_row here.." value="<?php echo $row['c_row'];?>" style="height:40px;" >
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-6 form-group mb-3">
                                                                <label for="validationCustomUsername"> Culmn Row</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text  menu-icon  icon-user"
                                                                            style="background-color:#eee;"></span>
                                                                    </div>
                                                                    <input type="number" name="c_column" class="form-control" placeholder="Type c column here.." value="<?php echo $row['c_column'];?>" style="height:40px;" >
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-6 form-group mb-3">
                                                                
                                                                <div class="input-group" style="margin-top:25px;">
                                                                    
                                                                    <button type="submit" class="btn btn-warning" name="edit_bookCase"><b>Edit</b></button>
                                                                </div>
                                                            </div>                   
                                                    </div>
                                                    <br><br>
                                                    
                                                    
                                                </form> 
                                                <!-- end form -->

                                <?php
                            }
                            


                            

                        }else {
                            # code...
                            echo "No Record Available";
                        }
                
                    ?>
  </div>
  <!-- <div class="card-header text-center bg-info text-white">
    Manage Data
  </div> -->
</div>





<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>

