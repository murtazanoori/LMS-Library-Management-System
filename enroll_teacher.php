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
    <a data-toggle="modal" data-target="#myModal" href="#myModal">
        <i class="mdi mdi-import" style="margin-right:5px"></i>Import CSV</a>
    
    </h4>
    <!-- file -->

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
                        <form class="form-horizontal" action="enroll_teacher_insert_code.php" method="post" name="upload_excel" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 mb-3">
                            <label class="label">File</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="menu-icon icon-folder input-group-text" style="background-color:#eee"></span>
                            </div>
                            <input type="file" name="file" id="file" class="input-large" required>
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

    <!-- end of file -->
    <div class="d-flex align-items-center">
        <div class="wrapper mr-4 d-none d-sm-block">
            <p class="mb-0">Enroll
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
<div class="bg-white d-block p-4" style="min-height:60vh; margin-bottom:70px; margin-top:20px; border:1px solid #eee; border-radius:6px;" id="b">
    <div class="d-block p-4" style="border-radius:6px; background-color:#f9fbfd">
    <p class="mdi mdi-account-plus" style="font-size:1.2rem;"> Enroll Teacher</p>
        <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br><br>
        <div style="margin-top:20px">
            <?php 
                include 'enroll_teacher_insert_code.php';
                
                if (isset($_SESSION['response'])) { ?>
                <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center auto-close">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <b class=""><?= $_SESSION['response'];?></b>
                </div>
            <?php } unset($_SESSION['response']);?>
            <!-- form -->
            <form id="form" action="enroll_teacher_insert_code.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Teahcer ID</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon icon-key" style="background-color:#eee;"></span>
                            </div>
                            <input type="text" class="form-control" placeholder=" Type id here.." name="teacher_id" style="height:40px;" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text  menu-icon  icon-user"
                                    style="background-color:#eee;"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Type your name here.."
                                name="name" style="height:40px;" required>
                        </div>
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Last Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon icon-user"
                                    style="background-color:#eee;"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Type your last name here.."
                                name="lastname" style="height:40px;" required>
                        </div>
                    </div>

                    <div class="col-md-6 form-group mb-3">
                       <label for="validationCustomUsername">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon  icon-envelope-letter"
                                    style="background-color:#eee;"></span>
                            </div>
                            <input type="email" class="form-control" placeholder="Type your email here.." name="email" style="height:40px;" required>
                        </div>
                    </div>

                    <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Shift</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon  icon-clock"
                                    style="background-color:#eee;"></span>
                            </div>
                       <select data-plugin="customselect" class="form-control" name="shift" style="height:40px;">
                       <option selected hidden>Select Time</option>
                                                <option value="Morning">Morning</option>
                                                <option value="After noon">After noon</option>
                                                <option value="Evening">Evening</option>
                                                <option value="FullTime">Full Time</option>
                                            </select>
                                            </div>
                                </div> 

                    <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Departmenet</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon  icon-drawer"
                                    style="background-color:#eee;"></span>
                            </div>
                            <?php 
                            $Q = "SELECT * FROM `department`";
                       $query=mysqli_query($con,$Q);
                       $account=mysqli_num_rows($query);
                       ?>
                       <select class="form-control" name="department_id" style="height:40px;">
                       <option selected hidden>Select Department</option>
                      <?php 
                      for($i=1; $i<=$account; $i++){
                          $row=mysqli_fetch_array($query);
                          ?>
                            <option value="<?php echo $row["department_id"]; ?>"><?php echo $row["department_name"]; ?></option>
                     <?php
                      }
                      ?>
                                            </select>
                                            </div>
                                </div> 
                    
                    
                    
                    
                    
                    
                    <div class="col-md-6 form-group mb-3">
                        <label for="validationCustomUsername">Phone</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text menu-icon  icon-phone"
                                    style="background-color:#eee;"></span>
                            </div>
                            <input type="phone" class="form-control" placeholder="(+93)000 000 000" name="phone" style="height:40px;" required>
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
<!-- validition -->

<script type="text/javascript" src="jq/jquery.validate.js"></script>
<script type="text/javascript" src="jq/jquery-3.4.1.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
          $("#form").validate({
            rules:{
                teacher_id: {
                required: true
              },
                name: {
                required: true
              },
              lastname:{
                required:true
              },
              email:{
                required:true
              },
              shift:{
                required:true
              },
              phone:{
                required:true
              },
              department_id:{
                required:true
              }

            },
            messages:{
                teacher_id:{
                required:'<span id="sp" style="color:red;">** This filed is required : Insert id here..</span>'
              },
              name:{
                required: '<span id="sp" style="color:red">** This filed is required : Insert name here..</span>'
              },
              lastname:{
                required:'<span id="sp" style="color:red;">** This filed is required : Insert last name here..</span>'
              },
              email:{
                required:'<span id="sp" style="color:red">** This filed is required : Email use @. for example admin.library@gmail.com</span>'
              },
              shift:{
                required:'<span id="sp" style="color:red">** This filed is required : Select onec..</span>'
              },
              phone:{
                required:'<span id="sp" style="color:red">** This filed is required : Phone number 10 char..</span>'
              },
              department_id:{
                required:'<span id="sp" style="color:red">** This filed is required : Select onec..</span>'
              }
              
              
            },
                errorPlacement: function (error,element) {
                    
                    error.insertAfter(element.closest("div"));
                }
          });
        });
      </script> 

<!-- end -->

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