<?php
ob_start();
?>
<head>
    <link rel="stylesheet" href="css/style.css">
	<!-- animation CSS -->
<link href="bower_components/css/animate.css" rel="stylesheet">
<link rel="stylesheet" href="bower_components/dropify/dist/css/dropify.min.css">
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
    <h4 class="page-title"></h4>
    <div class="d-flex align-items-center">
        <div class="wrapper mr-4 d-none d-sm-block">
            <p class="mb-0">Insert
                <b class="mb-0">Section</b>
            </p>
        </div>
        <div class="wrapper">
            <a href="index.php" class="btn btn-link btn-sm font-weight-bold">
                <i class="menu-icon icon-home"></i>Home</a>
        </div>
    </div>
</div>
<!-- end of header dashboard -->

<!--start of content -->
<div class="bg-white d-block p-4" style="width:100%; margin-bottom:70px; margin-top:20px; border:1px solid #eee; border-radius:6px;" id="b">
    <div class="d-block p-4" style="border-radius:6px; background-color:#f9fbfd">
    <p class="mdi mdi-account-plus" style="font-size:1rem;"> Add User</p>
        <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br><br>
        <div style="margin-top:20px">
            <?php
                include 'add_user_code.php';

                if (isset($_SESSION['response'])) { ?>
                <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center auto-close">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <b class=""><?= $_SESSION['response'];?></b>
                </div>
            <?php } unset($_SESSION['response']);?>
            <!-- form -->
            <form id="form" action="add_user_code.php" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon icon-user"
                                    style="background-color:#eee;"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Type Name Here.."
                                name="name" style="height:40px;">
                        </div>
                  </div>
                  <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Last Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon icon-user"
                                    style="background-color:#eee;"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Type Last Name Here.."
                                name="lastname" style="height:40px;">
                        </div>
                  </div>
					    <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername"> Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon icon-envelope-letter"
                                    style="background-color:#eee;"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Type UserName Here.."
                                name="user_name" style="height:40px;">
                        </div>
                  </div>					  
					<div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername"> Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon icon-lock"
                                    style="background-color:#eee;"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Type Passwword Here.."
                                name="password" style="height:40px;">
                        </div>
                  </div>
					<div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Confirm Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon icon-lock"
                                    style="background-color:#eee;"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Type Confirm Password Here.."
                                name="confirm_password" style="height:40px;">
                        </div>
                  </div>
					<div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Role</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon  icon-badge"
                                    style="background-color:#eee;"></span>
                            </div>
                       <select class="form-control" name="user_role" style="height:40px;">
                       <option selected hidden>Select User Role</option>
                            <option value="0">Admin</option>
                            <option value="1">Librarian</option>
                            </select>
                                     </div>
					</div>
					
					 <div class="col-md-12 form-group mb-3">
                         <label for="validationCustomUsername"> File Upload</label>
                        <div class="input-group">
                           <input type="file" id="input-file-now" class="dropify" name="user_image" />
                        </div>
                  </div>
                </div>

                <button type="submit" name="done" id="savebtn"><p class="mdi mdi-content-save-all"></p></button>

            </form>
       </div>

        <!-- end of form -->
    </div>
</div>
<!-- end of content -->

<script type="text/javascript" src="jq/jquery.validate.js"></script>
<script type="text/javascript" src="jq/jquery-3.4.1.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
          $("#form").validate({
            rules:{
                name: {
                required: true
              },
              lastname: {
                required: true
              },
              user_name: {
                required: true
              },
              password:{
                required:true
              },
              confirm_password:{
                required:true
              }
              
            },
            messages:{
                name:{
                required:'<span id="sp" style="color:red;">* This filed is required :only letter avalible</span>'
              },
              lastname:{
                required: '<span id="sp" style="color:red">* This filed is required : only letter avalible</span>'
              },
              user_name:{
                required:'<span id="sp" style="color:red">** This filed is required : enter email for example john@gmail.com</span>'
              },
              password:{
                required:'<span id="sp" style="color:red;">** This filed is required : enter password. </span>'
              },
              confirm_password:{
                required:'<span id="sp" style="color:red">** This filed is required : confirm password</span>'
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
