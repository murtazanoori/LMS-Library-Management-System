<?php 
ob_start();
session_start();
  ?>





<!--Title-->
<div class="col-12 d-flex align-items-center justify-content-between">
    <h4 class="page-title">
    
    

    </h4>
    <div class="d-flex align-items-center">
        <div class="wrapper mr-4 d-none d-sm-block">
            <p class="mb-0">List
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
                <h4 class="header-title">Recent List Cd File</h4><br>
               
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
                        <?php 
                            include 'add_cd_of_book.php';
                
                            if (isset($_SESSION['response'])) { ?>
                            <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <b class=""><?= $_SESSION['response'];?></b>
                                </div>
                                <?php } unset($_SESSION['response']);?>    

                            <div class="">
                                <form class="" action="barcode_page_cd" method ="POST">
                                <table class="table table-responsive table-bordered table-hover js-basic-example dataTable table-custom">
                                    <thead>
                                        <tr>
                                            <th>
                                            
                                                <div class="checkbox">             
                                                        <input type="checkbox"  id="select-all" name="check" class="checkitem">
                                                </div>                           
                                
                                            </th>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Subject</th>
                                            <th>Presenter</th>
                                            <th>Files Info</th>
                                            <th>Author</th>
                                            <th>CD Number</th>
                                            <th>Case</th>
                                            <th>Copy</th>
                                        </tr>
                                    </thead>
                                  <tbody>
                                        <?php
                                         include 'connection_DB.php';
                                         $q = "SELECT * FROM `cd` JOIN book_case ON cd.b_c_id = book_case.b_c_id";
                                         $query = mysqli_query($con,$q);

                                        while($res = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                <th>
                                                <div class="checkbox">             
                                            <input type="checkbox" name="barcodeText[]" value="<?php echo $res['cd_id'];?>" class="checkitem">
                                            </div>                           
                                </th>
                                <th scope="row">
                                   
                                        <?php echo $res['cd_id'];?>
                                    
                                </th>
                                <td>
                                    <?php echo $res['cd_title'];?>
                                </td>

                                <td>
                                    <?php echo $res['subject'];?>
                                </td>

                                <td>
                                    <?php echo $res['presenter'];?>
                                </td>

                                <td>
                                    <?php echo $res['files_info'];?>
                                </td>
                                <td>
                                    <?php echo $res['Author'];?>
                                </td>
                                <td>
                                    <?php echo $res['cd_number'];?>
                                </td>
                                <td>
                                    <?php echo $res['book_case_id'];?><?php echo $res['c_row'];?><?php echo $res['c_column'];?>
                                </td>
                                <td>
                                <?php 
                                        if($res['copy']==1){
                                            //echo"copy";
                                            ?>
                                            <label class="badge badge-success"><?php echo "1";?></lable>
                                        <?php
                                        }
                                        elseif($res['copy']==2){
                                            //echo"copy";      
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
                        
                            <button type="submit" class="btn btn-info" name="generateBarcode" >Generate Barcode</button>  
                                
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

<!-- Javascript -->
<script src="vendors/table/bundles/libscripts.bundle.js"></script>    
<script src="vendors/table/bundles/vendorscripts.bundle.js"></script>

<script src="vendors/table/bundles/datatablescripts.bundle.js"></script>
 

<script src="vendors/table/bundles/mainscripts.bundle.js"></script>
<script src="vendors/table/js/pages/tables/jquery-datatable.js"></script>
<script src="vendors/table/js/pages/ui/dialogs.js"></script>

<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>
