
<?php 
ob_start();
session_start();
  ?>
<div class="card col-12" style="margin-top:40px;">
    <div class="card-header bg-info text-white">
        Resent Edit Profil
    </div>
    <div class="card-body">

        <!-- form -->
        <?php
                        
                        include 'connection_DB.php';
                        $stu_id = $_GET['stu_id'];
                        $q = "SELECT * FROM `student` WHERE stu_id = '$stu_id'";
                        $run_query = mysqli_query($con,$q);

                        if (mysqli_num_rows($run_query)>0) {
                            # code...
                            foreach ($run_query as $row) {
                                # code...
                                //echo $row['phone'];
                                ?>
        <form action="enroll_student_insert_code.php" method="POST" enctype="multipart/form-data">

            <div class="row">

                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Student ID</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon icon-key" style="background-color:#eee;"></span>
                        </div>
                        <input type="number" name="stu_id" value="<?php echo $row['stu_id'];?>" class="form-control" placeholder=" 96290015" style="height:40px;">
                    </div>

                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text  menu-icon  icon-user" style="background-color:#eee;"></span>
                        </div>
                        <input type="text" name="name" class="form-control" placeholder="Type name here.." value="<?php echo $row['name'];?>" style="height:40px;">
                    </div>
                </div>


                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Father Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                        </div>
                        <input type="text" name="father_name" value="<?php echo $row['father_name'];?>" class="form-control" placeholder="Type fathername here.." name="father_name" style="height:40px;">
                    </div>
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Last Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon icon-user" style="background-color:#eee;"></span>
                        </div>
                        <input type="text" name="lastname" value="<?php echo $row['lastname'];?>" class="form-control" placeholder="Type your last name here.." style="height:40px;">
                    </div>
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Shift</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon  icon-clock" style="background-color:#eee;"></span>
                        </div>
                        <select data-plugin="customselect" class="form-control" name="shift" style="height:40px;">
                            <option value="Morning" <?php if($row['shift'] == "Morning"){ ?> selected <?php } ?>>Morning</option>
                            <option value="After noon" <?php if($row['shift'] == "After noon"){ ?> selected <?php } ?>>After noon</option>
                            <option value="Evening" <?php if($row['shift'] == "Evening"){ ?> selected <?php } ?>>Evening</option>
                            <option value="FullTime" <?php if($row['shift'] == "Full Time"){ ?> selected <?php } ?>>Full Time</option>
                        </select>
                    </div>
                </div>
                <!-- status  -->

                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Status</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon icon-star" style="background-color:#eee;"></span>
                        </div>
                        <select data-plugin="customselect" class="form-control" name="status" style="height:40px;">
                            <option value="Active" <?php if($row['status'] == "Active"){ ?> selected <?php } ?>>Active</option>
                            <option value="De-Active" <?php if($row['status'] == "De-Active"){ ?> selected <?php } ?>>De-Active</option>
                        </select>
                    </div>

                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Phone</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon  icon-phone" style="background-color:#eee;"></span>
                        </div>
                        <input type="text" name="phone" class="form-control" style="height:40px;" value="<?php echo $row['phone'] ?>">
                    </div>
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Picture</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon  icon-picture" style="background-color:#eee;"></span>
                        </div>
                        <input type="file" name="photo" class="form-control" name="photo" style="height:40px;">
                        <input type="hidden" name="stud_image_old" class="form-control" style="height:40px;">

                    </div>
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Faculty</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon  icon-graduation" style="background-color:#eee;"></span>
                        </div>
                        <?php 
                            $Q = "SELECT * FROM `faculty`";
                       $query=mysqli_query($con,$Q);
                       $account=mysqli_num_rows($query);
                       ?>
                        <select class="form-control" name="faculty_id" style="height:40px;">
                            <option selected hidden>Select Faculty</option>
                            <?php 
                      for($i=1; $i<=$account; $i++){
                          $row2=mysqli_fetch_array($query);
                          ?>
                            <option value="<?php echo $row2["faculty_id"]; ?>" <?php if($row2['faculty_id'] == $row['faculty_id']){?> selected <?php } ?>><?php echo $row2["faculty_name"]; ?></option>
                            <?php
                      }
                      ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Departmenet</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon  icon-drawer" style="background-color:#eee;"></span>
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
                          $row3=mysqli_fetch_array($query);
                          ?>
                            <option value="<?php echo $row3["department_id"]; ?>" <?php if($row3['department_id'] == $row['department_id']){?> selected <?php } ?> ><?php echo $row3["department_name"]; ?></option>
                            <?php
                      }
                      ?>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-warning" name="student_update">Edit</button>
        </form>
        <!-- end form -->

        <?php
                            }
                        }else {
                            # code...
                            echo "No Record Available";
                        }
                
                    ?>
    </div>
    <!-- <div class="card-header bg-info text-white">
    </div> -->
</div>





<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>