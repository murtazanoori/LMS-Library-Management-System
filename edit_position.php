
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
    Resent Edit Position
  </div>
  <div class="card-body"><br><br>

            <?php 
                include 'add_position_code.php';
                
                if (isset($_SESSION['response'])) { ?>
                    <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <b class=""><?= $_SESSION['response'];?></b>
                    </div>
                    <?php } unset($_SESSION['response']);?>
  
                <!-- form -->
                    <?php
                    
                        include 'connection_DB.php';
                        $position_id = $_GET['position_id'];
                        $q = "SELECT * FROM `position` WHERE position_id = '$position_id'";
                        $run_query = mysqli_query($con,$q);

                        if (mysqli_num_rows($run_query)>0) {
                            # code...
                            foreach ($run_query as $row) {
                                # code...
                                //echo $row['name'];
                                ?>
                                                <form action="add_position_code.php" method="POST" enctype="multipart/form-data">
                                                   <input type="hidden" name="position_id" value="<?php echo $row['position_id'];?>">
                                                    <div class="row">
                                                    
                                                            
                                                            <div class="col-md-6 form-group mb-3">
                                                                <label for="validationCustomUsername">Position Name</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text  menu-icon  icon-user"
                                                                            style="background-color:#eee;"></span>
                                                                    </div>
                                                                    <input type="text" name="position_name" class="form-control" placeholder="Type position name here.." value="<?php echo $row['position_name'];?>" style="height:40px;" >
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-6 form-group mb-3">
                                                                
                                                                <div class="input-group" style="margin-top:25px;">
                                                                    
                                                                    <button type="submit" class="btn btn-warning" name="edit_position"><b> Edit</b></button>
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

