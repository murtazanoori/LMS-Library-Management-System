<?php 

ob_start();

?>

        <!--Title-->
        <div class="col-12 d-flex align-items-center justify-content-between">
                <h4 class="page-title">Barow Dashboard</h4>
              <div class="d-flex align-items-center">
                <div class="wrapper mr-4 d-none d-sm-block">
                  <p class="mb-0"> View
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

        <h1>Welcome to Barow & Return Book View</h1>

<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>