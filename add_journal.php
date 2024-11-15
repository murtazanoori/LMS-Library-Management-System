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
</head>
<!-- header dashboard -->
<div class="col-12 d-flex align-items-center justify-content-between">
    <h4 class="page-title">
    
    
    </h4>
    <!-- file -->

   

    <!-- end of file -->
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
<div class="bg-white d-block p-4" style="width:100%; margin-bottom:70px; margin-top:20px; border:1px solid #eee; border-radius:6px;" id="b">
    <div class="d-block p-4" style="border-radius:6px; background-color:#f9fbfd">
    <p class="menu-icon icon-calendar text-primary" style="font-size:1.2rem;"> Journal</p>
        <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br><br>
        <div style="margin-top:20px">
            <?php
                include 'journal_code.php';

                if (isset($_SESSION['response'])) { ?>
                <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center auto-close">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <b class=""><?= $_SESSION['response'];?></b>
                </div>
            <?php } unset($_SESSION['response']);?>
            <!-- form -->
            <form id="form" action="journal_code" method="post" enctype="multipart/form-data">
                <div class="row">


                  <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Journal Title</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon icon-note"
                                    style="background-color:#eee;"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Type title.."
                                name="title" style="height:40px;">
                        </div>
                  </div>
                
                


                  <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Journal Author</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon icon-chemistry"
                                    style="background-color:#eee;"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Type author.."
                                name="author" style="height:40px;">
                        </div>
                  </div>
                
                 <div class="col-md-12 form-group mb-3">
                    <div class="form-floating">
                        <label for="floatingTextarea2">Journal Information</label>
                        <textarea name="info" class="form-control" placeholder="Leave info here" id="floatingTextarea2" style="height:200px"></textarea>
                        
                    </div>
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Publish Year</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon icon-chemistry"
                                    style="background-color:#eee;"></span>
                            </div>
                            <input type="date" class="form-control" placeholder="Type publish year.."
                                name="publish_year" style="height:40px;">
                        </div>
                    </div>
                  <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Page</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon icon-chemistry"
                                    style="background-color:#eee;"></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Type page.."
                                name="pages" style="height:40px;">
                        </div>
                  </div>
                  <div class="col-md-12 form-group mb-3">
                        <label for="validationCustomUsername">Avalibality</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon  icon-clock"
                                    style="background-color:#eee;"></span>
                            </div>
                                        <select data-plugin="customselect" class="form-control" name="avalibality" style="height:40px;">
                                        <option selected hidden>Select Avalibality</option>
                                                <option value="Avalible">Avalible</option>
                                                <option value="Coming_Soon">Coming Soon</option>
                                            </select>
                        </div>
                    </div>
                    
                    <br>
                    <div class="col-md-12 form-group mb-3">
                         <label for="validationCustomUsername"> File Upload</label>
                        <div class="input-group">
                           <input type="file" id="input-file-now" class="dropify" name="pic" />
                        </div>
                  </div>
               

                <button type="submit" name="done" id="savebtn"><p class="mdi mdi-content-save-all"></p></button>
                </div>
            </form>
       

        <!-- end of form -->
    </div>
</div>
<!-- end of content -->

<!-- validation -->

<script type="text/javascript" src="jq/jquery.validate.js"></script>
    <script type="text/javascript" src="jq/jquery-3.4.1.js"></script>
    <script type="text/javascript">
            $(document).ready(function() {
            $("#form").validate({
                rules:{
                   
                    title: {
                    required: true
                    },
                    info: {
                    required: true
                    },
                    author: {
                    required: true
                    },
                    publish_year: {
                    required: true
                    },
                    pages: {
                    required: true
                    }

                },
                
                    messages:{
                    
                        title:{
                        required: '<span id="sp" style="color:red">* This filed is required</span>'
                    },
                    info:{
                        required: '<span id="sp" style="color:red">* This filed is required</span>'
                    },
                    author:{
                        required: '<span id="sp" style="color:red">* This filed is required</span>'
                    },
                    publish_year:{
                        required: '<span id="sp" style="color:red">* This filed is required</span>'
                    },
                    pages:{
                        required: '<span id="sp" style="color:red">* This filed is required</span>'
                    }
                },
                    errorPlacement: function (error,element) {
                        
                        error.insertAfter(element.closest("div"));
                    }
            });
            });
        </script>

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
<script src="js/jquery-3.4.1.js" charset="utf-8"></script>
<script>
    $(document).ready(function(){
        setTimeout(function() {
            $('.auto-close').fadeOut('slow');
            }, 2000);
    });
</script>

<!-- master page -->
<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>
