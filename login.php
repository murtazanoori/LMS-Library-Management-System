<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GU-LIB login</title>
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

<body>
<!-- container-scroller -->
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
      <div class="col-lg-5 mx-auto">
            <div class="auto-form-wrapper">
            <!-- start form -->
              <form action="login_code.php" method="post" enctype="multipart/form-data">
                 <div class="row">
                  <div class="col-md-12 mb-3">
                  <a href="index">
                  <img src="images/1609057472732.png" style="justify-content: right;" width="60px" hight="60px" alt="">
                  </a>
                  <h2 class="text-center mb-4 font-weight-bold">Sign In</h2>
                  <br>
                  
                  <?php
                                if (@$_GET['Empty']==true) {
                                    # code...
                                    ?>
                                        <div class="alert-danger text-danger text-center py-2"><?php echo $_GET['Empty'] ?></div>   
                                <?php
                                }
                                
                                
                            ?>

                            <?php
                                if (@$_GET['Invalid']==true) {
                                    # code...
                                    ?>
                                        <div class="alert-danger text-danger text-center py-2"><?php echo $_GET['Invalid'] ?></div>   
                                <?php
                                }
                                
                                
                            ?>
              <label class="label">Username</label>
                  <div class="input-group">
                         <div class="input-group-prepend">
                            <span class="menu-icon icon-user input-group-text" style="background-color:#eee"></span>
                        </div>
                             <input type="text" name="username" class="form-control" placeholder="Type username here." style="height:40px;">                 
                         </div>
                     </div>

                     <div class="col-md-12 mb-4">
              <label class="label">Password</label>
                  <div class="input-group">
                         <div class="input-group-prepend">
                            <span class="input-group-text menu-icon icon-lock" style="background-color:#eee"></span>
                        </div>
                             <input type="password" name="password" class="form-control" placeholder="*****" style="height:40px;">                 
                         </div>
                     </div>

                 <div class="input-group">
                         <button class="btn btn-primary offset-4 col-md-4 submit-btn btn-block" name="login">Sign in</button>
                 </div>
                 
                <div class="input-group mt-4">
                  <button class="btn btn-block g-login" name="login-with-google">
                   <a href="https://gawharshad.edu.af/prs/"><img class="mr-3" src="images/logo Gawharshad.png" width="30px" alt="">Visit Gawharshad University Site</a></button>
                </div>
                <div class="col-md-12 mb-4 p-4">
                <center><span class="text-small font-weight-semibold" >© 2021 All Right Reserved GU Powered By.</span>
                  <a href="dark_blue" class="text-black text-small text-primary">Dark Blue</a></center>
                  </div>
                     </div>

                </div>
             </form>
             <!-- end of form -->
             </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>
</html>