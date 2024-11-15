<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GU-LIB</title>
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
<!-- end row -->

<div class="row col-12 d-flex align-items-center justify-content-between" style="margin-top:20px;">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Recent Search Result</h4><br>
               
                <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br>
                    <div id="main-content">
                        <div class="container-fluid ">
                            <div class="block-header">
               
                            </div>
            

                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="">
                                        <br><br>
                                        <div class="body">
                                            <div class="">
                               

                                    

                                            <?php 

include 'connection_DB.php';
if (isset($_POST['submit'])) {
    # code...
    $str = mysqli_real_escape_string($con, $_POST['str']);
    $sql = "SELECT book_id, book_title, author,'book' FROM book WHERE book_title LIKE '%$str%' OR author LIKE '%$str%'
    UNION
    SELECT general_book_id, book_title as book_title, author,'general_book' FROM general_book WHERE book_title LIKE '%$str%' OR author LIKE '%$str%'
    UNION
    SELECT mo_id, m_title , Author,'monograph' FROM monograph WHERE m_title LIKE '%$str%' OR Author LIKE '%$str%'
    UNION
    SELECT fasilnama_id, fasilnama_title as book_title, author,'fasilnama' FROM fasilnama WHERE fasilnama_title LIKE '%$str%' OR author LIKE '%$str%'
    UNION
    SELECT r_id, book_title as book_title, Author,'rule_book' FROM rule_book WHERE book_title LIKE '%$str%' OR Author LIKE '%$str%'
    UNION
    SELECT hs_id, book_title as book_title, Author,'history_book' FROM history_book WHERE book_title LIKE '%$str%' OR Author LIKE '%$str%'
    UNION
    SELECT cd_id, cd_title as book_title, Author,'cd' FROM cd WHERE cd_title LIKE '%$str%' OR Author LIKE '%$str%'
    ";

    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res)>0) {
        while ($row = mysqli_fetch_assoc($res)) {
            // echo '<pre>';
            // print_r($row);?>
             <table class="table table-responsive table-bordered table-hover js-basic-example dataTable table-custom">
                                    <thead>
                                        <?php
                                        
                                        echo '<h5 class="text-muted">Search record '.$str. ' result</h5>'; ?>
                                    </thead>
                                    <tbody>
                                        
                                            
            <?php
           echo "<h4><a href ='search_page2.php?id=".$row['book_id']."&t=".$row['book']."'>".$row['book_title']."</h4></a>";
            echo "<br/>"; ?>
         
                                        
                                    </tbody>
                                </table>
              
             
                                     
    <?php
        }
    } else {
        echo "<div class='alert alert-success alert-dismissible text-center'>";
        echo '<h4>Did you mean! '.$str. ' No Record Found</h4>';
        echo "</div>";
        // echo "no data found";

       
    }
}
        
    
    ?>
    


                                               
                                    
                                </div>
 

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</div>





<!-- end row -->


<!-- alert auto dismiss code -->
<script src="js/jquery-3.4.1.js" charset="utf-8"></script>
<script>
    $(document).ready(function(){
        setTimeout(function() {
            $('.auto-close').fadeOut('slow');
            }, 2000);
    });
</script>

<!-- alert auto dismiss code -->
<script src="js/jquery-3.4.1.js" charset="utf-8"></script>


<!-- Javascript -->
<script src="vendors/table/bundles/libscripts.bundle.js"></script>    
<script src="vendors/table/bundles/vendorscripts.bundle.js"></script>

<script src="vendors/table/bundles/datatablescripts.bundle.js"></script>
 

<script src="vendors/table/bundles/mainscripts.bundle.js"></script>
<script src="vendors/table/js/pages/tables/jquery-datatable.js"></script>
<script src="vendors/table/js/pages/ui/dialogs.js"></script>
<!-- alert auto dismiss code -->
<script src="js/jquery-3.4.1.js" charset="utf-8"></script>
<script>
    $(document).ready(function(){
        setTimeout(function() {
            $('.auto-close').fadeOut('slow');
            }, 2000);
    });
</script>

<!-- alert auto dismiss code -->
<script src="js/jquery-3.4.1.js" charset="utf-8"></script>


<!-- Javascript -->
<script src="vendors/table/bundles/libscripts.bundle.js"></script>    
<script src="vendors/table/bundles/vendorscripts.bundle.js"></script>

<script src="vendors/table/bundles/datatablescripts.bundle.js"></script>
 

<script src="vendors/table/bundles/mainscripts.bundle.js"></script>
<script src="vendors/table/js/pages/tables/jquery-datatable.js"></script>
<script src="vendors/table/js/pages/ui/dialogs.js"></script>

