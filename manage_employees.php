<?php 

ob_start();

?>
<!--Title-->
<div class="col-12 d-flex align-items-center justify-content-between">
    <h4 class="page-title">
    
    <form class="form-horizontal" action="enroll_employee_insert_code.php" method="post" name="upload_excel"   
enctype="multipart/form-data">
<div class="form-group">
          <button name="Export" class="bti" value="Export To Excel"><i class="icon-share-alt"></i> Export To CSV</button>
     
</div>                    
</form>
    
    </h4>
    <!-- file style -->

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

    <!-- end style -->

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

<div class="row col-12 d-flex align-items-center justify-content-between" style="margin-top:20px;">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Recent Manage Employee</h4><br>
                <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br>
                <div class="table-responsive mt-3">
                    <?php 
                include 'enroll_employee_insert_code.php';
                
                if (isset($_SESSION['response'])) { ?>
                    <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center auto-close">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <b class=""><?= $_SESSION['response'];?></b>
                    </div>
                    <?php } unset($_SESSION['response']);?>

                    <div class="col-md-12">
                        <form action="manage_employees" method="post">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="validationCustomUsername">Employee ID</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="background-color:#eee;">#</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Search by id.." name="employee_id" style="height:40px;">
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustomUsername">Employee Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search by name.." name="fname" style="height:40px;">
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustomUsername">Last Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search by last name.." name="lname" style="height:40px;">
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustomUsername">Position</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text menu-icon  icon-badge" style="background-color:#eee;"></span>
                                        </div>
                                        <?php 
                                            include('connection_DB.php');
                                            $Q = "SELECT * FROM `position`";
                                           $query=mysqli_query($con,$Q);
                                           $account=mysqli_num_rows($query);
                                       ?>
                                        <select class="form-control" name="position" style="height:40px;">
                                            <option selected hidden value="none">Select Position</option>
                                            <?php 
                                              for($i=1; $i<=$account; $i++){
                                                  $row=mysqli_fetch_array($query);
                                                  ?>
                                            <option value="<?php echo $row["position_id"]; ?>"><?php echo $row["position_name"]; ?></option>
                                            <?php
                                              }
                                              ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6 form-group">
                                    <button type="submit" name="search" class="col-md-6 offset-6 btn btn-primary mdi mdi-magnify mt-3">&nbsp;&nbsp;Search</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php
                        if(isset($_POST['search'])){ 
                            $id = $_POST['employee_id'];
                            $fname = $_POST['fname'];
                            $last_name = $_POST['lname'];
                            $position = $_POST['position'];

                            $q = 'SELECT * FROM `employee` JOIN position ON employee.position_id = position.position_id WHERE employee.e_id = "'.$id.'" OR employee.name ="'.$fname.'" OR employee.lastname = "'.$last_name.'" OR employee.position_id = "'.$position.'"';
                            $query = mysqli_query($con,$q);  
                            if (mysqli_num_rows($query) > 0) {
                                # code...
                            
                    ?>
                    <div class="col-12 table-responsive">
                    <table class="table table-hover table-centered mb-0">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Email Adress</th>
                                <th>Position Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                               
                                while($res = mysqli_fetch_array($query)){
                                        
                                ?>

                            <tr>
                                <th scope="row"><?php echo $res['e_id'];?></th>
                                <td>
                                    <?php echo $res['name'];?>
                                </td>

                                <td>
                                    <?php echo $res['lastname'];?>
                                </td>
                                <td>
                                    <?php echo $res['email'];?>
                                </td>
                                <td>
                                    <?php echo $res['position_name'];?>
                                </td>

                                <td>
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="edit_employee?e_id=<?php echo $res['e_id'];?>"><i class="mdi mdi-pencil mr-1 text-muted"></i>Edit</a>
                                            <?php if($_SESSION['role'] == 0){?>
                                            <input type="hidden" name="" class="delete_id_value" value="<?php echo $res['e_id'];?>">
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
                    </div>
                    <?php
                        }else {  
                    ?>
                            <div class="alert alert-success alert-dismissible text-center mt-4">
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

<!-- delete data by ajax -->
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
                        url:  "enroll_employee_insert_code.php",
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
<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>