<?php 
ob_start();
  ?>




<style>
.bti{
    background-color: Transparent;
    background-repeat:no-repeat;
    text-decoration:none;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
    color:#007bff;
    font-weight:bold;
    float: left;
    margin-top: -10px;
    
}
</style>

  
          








<!--Title-->
<div class="col-12 d-flex align-items-center justify-content-between">
    <h4 class="page-title">
    
    



        <!-- header dashboard -->
<div class="col-12 d-flex align-items-center justify-content-between">
    <div class="wrapper">
        
    <a data-toggle="modal" data-target="#myModal" href="#myModal">
        <i class="mdi mdi-import" style="margin-right:5px"></i>Import CSV</a>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="d-block p-4" style="border-radius:6px; background-color:#f9fbfd">
                            <!-- Modal Header -->
                            <div class="modal-header" style="margin-left:130px">
                                <h4 class="modal-title">Import CSV File</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <form class="form-horizontal" action="add_fasilnama" method="POST" name="upload_excel" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="label">File</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="menu-icon icon-folder input-group-text" style="background-color:#eee"></span>
                                            </div>
                                                <input type="file" name="file" id="file" class="input-large" >
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <button class="btn btn-primary submit-btn btn-block button-loading"  data-loading-text="Loading..." type="submit" id="submit" name="Import">Upload</button>
                                </div>
                            </form>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

    </h4>
    <div class="d-flex align-items-center">
        <div class="wrapper mr-4 d-none d-sm-block">
            <p class="mb-0">Manage
                <b class="mb-0">Section</b>
            </p>
        </div>
        
        <div class="wrapper">
            <a href="system" class="btn btn-link btn-sm font-weight-bold">
                <i class="icon-home"></i>Home</a>

        </div>
        
    </div>
   
</div>

   

<!--end title-->


<!-- end row -->

<div class="row col-12 d-flex align-items-center justify-content-between" style="margin-top:20px;">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Recent Manage Fasilnama Book</h4><br>
                <div class="wrapper">
                <a href="fasilnama_table" class="btn btn-link btn-sm font-weight-bold">
                <i class="mdi mdi-layers"></i>Show All Fasilnama Book</a>

                <form class="form-horizontal" action="add_fasilnama" method="post" name="upload_excel"   
                    enctype="multipart/form-data">
                    <div class="form-group" style="float:right; margin-top:-18px;">
                    <button name="Export" class="bti" value="Export To Excel"><i class="icon-share-alt"></i> Export To CSV</button>
     
            </div>                    
            </form>

                </div>
                <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br>
                <div class="table-responsive mt-3">
                    <?php 
                include 'add_fasilnama.php';
                
                if (isset($_SESSION['response'])) { ?>
                    <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center auto-close">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <b class=""><?= $_SESSION['response'];?></b>
                    </div>
                    <?php } unset($_SESSION['response']);?>
                    
                    <div class="col-md-12">
                        <form action="manage_fasilnama" method="post">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="validationCustomUsername">Fasilnama ID</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="background-color:#eee;">#</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Search by id.." name="fasilnama_id" style="height:40px;">
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustomUsername">Title</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text menu-icon icon-speech" style="background-color:#eee;"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search by title.." name="fasilnama_title" style="height:40px;">
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustomUsername">Author</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search by author.." name="author" style="height:40px;">
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustomUsername">Date</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text menu-icon icon-calendar" style="background-color:#eee;"></span>
                                        </div>
                                        <input type="date" class="form-control" placeholder="Search by publish year.." name="created_at" style="height:40px;">
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-12 form-group">
                                    <button type="submit" name="search" class="col-md-6 offset-6 btn btn-primary mdi mdi-magnify mt-3" style="float:right;font-size:2rem;width: 70px;height:50px;">&nbsp;&nbsp;</button>
                                </div>
                            </div>
                        </form>
                    </div>
                                            
                    <?php
                        if(isset($_POST['search'])){  

                                $fasilnama_id = $_POST['fasilnama_id'];
                                $fasilnama_title = $_POST['fasilnama_title'];
                                $author = $_POST['author'];
                                $created_at = $_POST['created_at'];
                                
                                $q = 'SELECT * FROM `fasilnama` JOIN book_case ON fasilnama.b_c_id = book_case.b_c_id
                                WHERE fasilnama.fasilnama_id LIKE "'.$fasilnama_id.'" OR fasilnama.fasilnama_title LIKE "'.$fasilnama_title.'" OR fasilnama.author LIKE "'.$author.'" OR fasilnama.created_at LIKE "'.$created_at.'"';
                              $query = mysqli_query($con,$q);
                            if (mysqli_num_rows($query) > 0) {     
                    ?>
                    
                    <table class="table table-responsive table-hover table-centered mb-0" id="order-listing">
                     <form action="barcode_page_fasilnama" method="POST">
                        <thead class="bg-info text-white">
                            <tr>
                              
                                

                            <th>
                                
                                <div class="checkbox">             
                                     <input type="checkbox"  id="select-all" name="check" class="checkitem">
                                </div> 
                                
                                
                                </th>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Publish Year</th>
                                <th>Fasilnam Info</th>
                                <th>Publish Place</th>
                                <th>Fasilnama Number</th>
                                <th>Case</th>
                                <th>Copy</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                    while($res = mysqli_fetch_array($query)){
                                ?>
                            <tr>
                            <th>
                                                <div class="checkbox">             
                                            <input type="checkbox" name="barcodeText[]" value="<?php echo $res['fasilnama_id'];?>" class="checkitem">
                                            </div>                           
                                </th>
                                <th scope="row">
                                   
                                        <?php echo $res['fasilnama_id'];?>
                                
                                </th>
                                <td>
                                    <?php echo $res['fasilnama_title'];?>
                                </td>

                                <td>
                                    <?php echo $res['author'];?>
                                </td>

                                <td>
                                    <?php echo $res['publish_year'];?>
                                </td>
                                <td>
                                    <?php echo $res['fas_info'];?>
                                </td>
                                <td>
                                    <?php echo $res['publish_place'];?>
                                </td>
                                <td>
                                    <?php echo $res['fas_number'];?>
                                </td>
                                <td>
                                    <?php echo $res['book_case_id'];?><?php echo $res['c_row'];?><?php echo $res['c_column'];?>
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
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="edit_fasilnama?fasilnama_id=<?php echo $res['fasilnama_id'];?>"><i class="mdi mdi-pencil mr-1 text-muted"></i>Edit</a>
                                            <?php if($_SESSION['role'] == 0){?>
                                            <input type="hidden" name="" class="delete_id_value" value="<?php echo $res['fasilnama_id'];?>">
                                            <a class="dropdown-item delete_btn_ajax" href="javascript: void(0);"><i class="mdi mdi-delete mr-1 text-muted"></i>Remove</a>
                                            <?php }?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                         
                                }
                                ?>
                                
                        </tbody>
                        
                    </table>
                    <input type="hidden" name="barcodeType" value="code128" <?php echo (@$_POST['barcodeType'] == 'code128' ? 'selected="selected"' : ''); ?>>
                                <input type="hidden" name="barcodeDisplay" value="horizontal" <?php echo (@$_POST['barcodeDisplay'] == 'horizontal' ? 'selected="selected"' : ''); ?>>
                                <input type="hidden" name="barcodeSize" id="barcodeSize" value="20">
                                <input type="hidden" name="printText" id="printText" value="true"><br>
                        
                            <button type="submit" class="btn btn-info float-right" name="generateBarcode" >Generate Barcode</button> 
                    </form>
                    <?php
                        }else{?>
                            
                                <div class="alert alert-success alert-dismissible text-center auto-close">
                                    <h6> Hops! No Record Found</h6>
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
    </div>
</div>
<!-- end row -->


<script src="js/jquery-3.4.1.js" charset="utf-8"></script>
<script>
    $(document).ready(function(){
        $('.delete_btn_ajax').click(function (e){
            e.preventDefault();

            
            var deleteid = $(this).closest("tr").find('.delete_id_value').val();
            console.log(deleteid);
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        type: "POST",
                        url:  "add_fasilnama.php",
                        data: {
                            "delete_btn_set": 1,
                            "delete_id": deleteid,
                        },
                        success: function (response){

                            swal("Data Deleted Successfully.!", {
                                icon: "success",

                            }).then((result) => {
                                location.reload();
                            });

                        }


                    });


                }   
            });
            
            
        });
            
    });

</script>

<!-- alert auto dismiss code -->
<script src="js/jquery-3.4.1.js" charset="utf-8"></script>
<script>
    $(document).ready(function(){
        setTimeout(function() {
            $('.auto-close').fadeOut('slow');
            }, 2000);
    });
</script>

<script>

    $(document).ready(function() {
      $("#select-all").click (function () {
        
        $(" input[type='checkbox']").prop('checked',this.checked);
      });
      $(".checkitem").change(function () {
          if($(this).prop("checked")==false){
              $("#select-all").prop("checked", false)
          }
          if($(".checkitem:checked").length == $(".checkitem").length){
              $("#select-all").prop("checked", true)

          }
      });


    });

</script>

<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>
