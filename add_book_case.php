<?php 

ob_start();

?>
<head>
    <link rel="stylesheet" href="css/style.css">
    <style>
    /* design of save botton */
    #savebtn {
        right: 40px;
        bottom: 25px;
        position:fixed;
        border-radius: 50%;
        border:none;
        color: white;
        background-color: #0cca8e;
        border-color: #0cca8e;
        width: 60px;
        height: 60px;
        cursor: pointer;
        z-index: 9999;
        margin-bottom: 40px;
    }

    #savebtn:hover {
        color: #fff;
        background-color: #0ccc9e;
    }

    p.mdi-content-save-all {
        font-size: 33px;
    }
    #sp{
       margin-top:100px;
    }
    .error{
        color: red;
        font-style: italic;
        padding-top: 10px;
    }
    </style>
       <!-- header dashboard -->
<div class="col-12 d-flex align-items-center justify-content-between">
    <h4 class="page-title"></h4>
    <div class="d-flex align-items-center">
        <div class="wrapper mr-4 d-none d-sm-block">
            <p class="mb-0">Add
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

        <!--start of content -->
<div class="bg-white d-block p-4" style="width:100%"; margin-bottom:70px; margin-top:20px; border:1px solid #eee; border-radius:6px;" id="b">
    <div class="d-block p-4" style="border-radius:6px; background-color:#f9fbfd">
    <p class="mdi mdi-account-plus" style="font-size:1.2rem;"> Add Book Case</p>
        <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br><br>
        <div style="margin-top:20px">
            <?php 
                include 'add_book_case_insert_code.php';
                
                if (isset($_SESSION['response'])) { ?>
                <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center auto-close">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <b class=""><?= $_SESSION['response'];?></b>
                </div>
            <?php } unset($_SESSION['response']);?>
            <!-- form -->
            <form id="form" action="add_book_case_insert_code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Book Case ID</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text  mdi mdi-server" style="background-color:#eee;"></span>
                            </div>
                            <input type="number" name="book_case_id" class="form-control" placeholder="Type book case id here.." style="height:40px;">
                        </div>
                    </div>
         
                    <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Case Row</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text  mdi mdi-table-row"
                                    style="background-color:#eee;"></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Type case row here.."
                                name="c_row" style="height:40px;">
                        </div>
                    </div>
                   
                    <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Case Column</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text  mdi mdi-table-column-plus-after"
                                    style="background-color:#eee;"></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Type case column here.." name="c_column" style="height:40px;">
                        </div>
                    </div>
                    
                    
                    
                   
                </div>
                <button type="submit" name="done" id="savebtn"><p class="mdi mdi-content-save-all"></p></button>
                
            </form>
       </div>
        
        <!-- end of form -->
    </div>

    <script type="text/javascript" src="jq/jquery.validate.js"></script>
<script type="text/javascript" src="jq/jquery-3.4.1.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
          $("#form").validate({
            rules:{
                book_case_id: {
                required: true
              },
              c_row: {
                required: true
              },
              c_column: {
                required: true
              }
              
            },
            messages:{
                book_case_id:{
                required:'<span id="sp" style="color:red;">This filed is required : only 2 digit avaliable</span>'
              },
              c_row:{
                required: '<span id="sp" style="color:red">This filed is required : one digit avaliable</span>'
              },
              c_column:{
                required:'<span id="sp" style="color:red">This filed is required : one digit avaliable</span>'
              }
              
            },
                errorPlacement: function (error,element) {
                    
                    error.insertAfter(element.closest("div"));
                }
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
</div>
<!-- end of content -->

<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>