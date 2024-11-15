
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
    Resent Edit News
  </div>
  <div class="card-body"><br><br>

            <?php 
                include 'news_code.php';
                
                if (isset($_SESSION['response'])) { ?>
                    <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <b class=""><?= $_SESSION['response'];?></b>
                    </div>
                    <?php } unset($_SESSION['response']);?>
  
                <!-- form -->
                    <?php
                    
                        include 'connection_DB.php';
                        $id = $_GET['id'];
                        $q = "SELECT * FROM `news` WHERE id = '$id'";
                        $run_query = mysqli_query($con,$q);

                        if (mysqli_num_rows($run_query)>0) {
                            # code...
                            foreach ($run_query as $row) {
                                # code...
                                //echo $row['name'];
                                ?>
                                                <form action="news_code" method="POST" enctype="multipart/form-data">
                                                    
                                                    <div class="row">
                                                    <input type="hidden" name="old_id" value="<?php echo $row['id']?>"/>
					                                <input type="hidden" name="old_img" value="<?php echo $row['news_img'];?>"/> 
                                                            <div class="col-md-6 form-group mb-3">
                                                                <label for="validationCustomUsername">News Title</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text menu-icon  icon-note" style="background-color:#eee;"></span>
                                                                    </div>
                                                                    <input type="text" name="name" value="<?php echo $row['name'];?>" class="form-control" placeholder="title" style="height:40px;">
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="col-md-6 form-group mb-3">
                                                                <label for="validationCustomUsername">Discrabtion</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text  menu-icon   icon-pencil"
                                                                            style="background-color:#eee;"></span>
                                                                    </div>
                                                                    <input type="text" name="dis" class="form-control" placeholder="Type dis here.." value="<?php echo $row['dis'];?>" style="height:40px;" >
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-12 form-group mb-3">
                                                                <label for="validationCustomUsername">News</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text  menu-icon  icon-loop"
                                                                            style="background-color:#eee;"></span>
                                                                    </div>
                                                                    <textarea name = "info" value="info" class="form-control" placeholder="Leave new info here" id="floatingTextarea2" style="height:200px;width: 400px; font-size: 0.9rem;"><?php echo $row['info'];?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 form-group mb-3">
                                                                <label for="validationCustomUsername">Select News Image</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        
                                                                    </div>
                                                                    <input type="file" id="input-file-now" class="dropify" name="pic" />
                                                                </div>
                                                            </div>      
                                                            <div class="col-md-12 form-group mb-3">
                                                                <label for="validationCustomUsername">News Image</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text  menu-icon   icon-picture"
                                                                            style="background-color:#eee;"></span>
                                                                    </div>
                                                                    <img src="<?php echo "images/".$row['news_img'];?>" style="height:400px;height:300px;" alt="">
                                                                </div>
                                                            </div>                  
                                                    </div>
                                                    <br><br>
                                                    <button type="submit" class="btn btn-warning" name="done_edit"> Edit</button>
                                                    
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
<script src="jq/jquery.min.js"></script>

<!-- jQuery file upload -->
<script src="js/dropify.min.js"></script>
<script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                 $('.dropify-fr').dropify({
                    messages: {
                        default: 'Drag and drop a file here or click',
                        replace: 'Drag and drop a file or click to replace',
                        remove:  'Remove',
                        error:   'Sorry, the file is too large'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>
<!-- alert auto dismiss code -->




<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>

