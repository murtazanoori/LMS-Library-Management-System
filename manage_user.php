<?php 
ob_start();
session_start();
  ?>





<!--Title-->
<?php if ($_SESSION['role'] == 0) {
    # code...
?>
<div class="col-12 d-flex align-items-center justify-content-between">
    <h4 class="page-title">
        <a  href="view_users_page" name="view_users" class="col-md-12 offset-0 btn btn-warning  text-white">View All users</a>
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
                <h4 class="header-title">Recent Manage User</h4><br>
                <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br>
                
                <div class="table-responsive mt-3">
                    <?php 
                include 'edit_user_code.php';
                
                if (isset($_SESSION['response'])) { ?>
                    <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center auto-close">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <b class=""><?= $_SESSION['response'];?></b>
                    </div>
                    <?php } unset($_SESSION['response']);?>
                    
                    <div class="col-md-12">
                    <form action="manage_user" method="post">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="validationCustomUsername">Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search by name" name="name" style="height:40px;" onkeydown="search();">
                                    </div>
								</div>
                               <div class="col-md-6 form-group">
                                    <label for="validationCustomUsername">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search by username" name="username" style="height:40px;" onkeydown="search();">
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
                                <div class="col-md-6"></div>
                                <div class="col-md-6 form-group">
                                    <button type="submit" name="search" class="col-md-6 offset-6 btn btn-primary mdi mdi-magnify mt-3">&nbsp;&nbsp;Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                                            
                    <?php
                        if(isset($_POST['search'])){  
                            $name = $_POST['name'];
                            $username = $_POST['username'];
                            $user_role = $_POST['user_role'];

                        $q = "SELECT * FROM `users` WHERE users.name LIKE '".$name."' OR users.username LIKE '".$username."' OR users.role LIKE '".$user_role."'";
                            $query = mysqli_query($con,$q);
                            if (mysqli_num_rows($query) > 0) {     
                    ?>
                    <div class="col-12 table-responsive">
                    <table class="table table-hover table-centered mb-0" id="order-listing">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                    while($res = mysqli_fetch_array($query)){
                                ?>
                            <tr>
                                        <?php
                                        
                                            if ($res['photo'] =='') {
                                                # code...
                                        ?>
                                        <th scope="row">
                                   
                                        <img src="images/FILE223.PNG" alt="image" />
                                    
                                    </th>
                                    <?php 
                                            }else {
                                                # code..    
                                    ?>
                                <th scope="row">
                                   
                                   <img src="user_image/<?php echo $res['photo']; ?>" alt="image" />
                                
                                </th>
                                <?php
                                            }
                                
                                ?>
                                <td>
                                    <?php echo $res['name'];?>
                                </td>

                                <td>
                                    <?php echo $res['lastname'];?>
                                </td>

                                <td>
                                    <?php echo $res['username'];?>
                                </td>

                                <td>
                                    <?php echo $res['password'];?>
                                </td>
                                <td>
                                    <?php 
                                        if($res['role']==0){
                                            //echo"Admin";
                                            ?>
                                            <label class="badge badge-success"><?php echo "Admin";?></lable>
                                        <?php
                                        }
                                        elseif($res['role']==1){
                                            //echo"Librarian";      
                                    ?>
                                    <label class="badge badge-warning"><?php echo"Librarian";?></lable>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="edit_users_page?user_id=<?php echo $res['user_id'];?>"><i class="mdi mdi-pencil mr-1 text-muted"></i>Edit</a>
                                            <?php if($_SESSION['role'] == 0){?>
                                            <input type="hidden" name="" class="delete_id_value" value="<?php echo $res['user_id'];?>">
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
                        }else{?>
                            
                                <div class="alert alert-success alert-dismissible text-center">
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
                        url:  "edit_user_code.php",
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

<?php }elseif ($_SESSION['role'] == 1) {
    # code...
    header("location:system?Data_Updated");
}?>
<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>
