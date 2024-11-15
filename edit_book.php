
<?php 
ob_start();
session_start();
  ?>
  <div class="col-12 d-flex align-items-center justify-content-between">
    <h4 class="page-title">
    </h4>
    <div class="d-flex align-items-center">
        <div class="wrapper mr-4 d-none d-sm-block">
            <p class="mb-0">Edit
                <b class="mb-0">Section</b>
            </p>
        </div>
        
        <div class="wrapper">
            <a href="system" class="btn btn-link btn-sm font-weight-bold">
                <i class="icon-home"></i>Home</a>

        </div>
        
    </div>
   
</div>
<div class="card col-12" style="margin-top:40px;">
    <div class="card-header bg-info text-white">
        Resent Edit Book
    </div>
    <div class="card-body">

        <!-- form -->
        <?php
                        
            include 'connection_DB.php';
            $book_id = $_GET['book_id'];
            $q = "SELECT * FROM `book` WHERE book_id = '$book_id'";
            $run_query = mysqli_query($con,$q);

            if (mysqli_num_rows($run_query)>0) {
            # code...
            foreach ($run_query as $row) {
            # code...
            //echo $row['book_id'];
        ?>
        <form action="add_book_insert_code" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="book_id" value="<?php echo $row['book_id'];?>" class="form-control" placeholder=" Loading..." style="height:40px;">
            <div class="row">
                
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Title</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon  icon-social-tumblr" style="background-color:#eee;"></span>
                        </div>
                        <input type="text" name="book_title" value="<?php echo $row['book_title'];?>" class="form-control" placeholder=" Loading..." style="height:40px;">
                    </div>
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Author</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text  menu-icon  icon-user" style="background-color:#eee;"></span>
                        </div>
                        <input type="text" name="author" class="form-control" placeholder="Loading..." value="<?php echo $row['author'];?>" style="height:40px;">
                    </div>
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Translator</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon icon-people" style="background-color:#eee;"></span>
                        </div>
                        <input type="text" name="translator" value="<?php echo $row['translator'];?>" class="form-control" placeholder="Loading..." style="height:40px;">
                    </div>
                </div>

                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Publish Place</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon  icon-home" style="background-color:#eee;"></span>
                        </div>
                        <input type="text" name="publish_place" value="<?php echo $row['publish_place'];?>" class="form-control" placeholder="Loading..." style="height:40px;">
                    </div>
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Publisher</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon icon-user-follow" style="background-color:#eee;"></span>
                        </div>
                        <input type="text" name="publisher" value="<?php echo $row['publisher'];?>" class="form-control" placeholder="Loading..." style="height:40px;">
                    </div>
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Publish Year</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon icon-calendar" style="background-color:#eee;"></span>
                        </div>
                        <input type="date" name="publish_year" value="<?php echo $row['publish_year'];?>" class="form-control" placeholder="Loading..." style="height:40px;">
                    </div>
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Volume</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon  icon-social-dropbox" style="background-color:#eee;"></span>
                        </div>
                        <input type="text" name="volume" value="<?php echo $row['volume'];?>" class="form-control" placeholder="Loading..." style="height:40px;">
                    </div>
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Book Edition</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon  icon-docs" style="background-color:#eee;"></span>
                        </div>
                        <input type="text" name="book_edition" value="<?php echo $row['book_edition'];?>" class="form-control" placeholder="Loading..." style="height:40px;">
                    </div>
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Page</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon  icon-doc" style="background-color:#eee;"></span>
                        </div>
                        <input type="number" name="number_page" value="<?php echo $row['number_page'];?>" class="form-control" placeholder="Loading..." style="height:40px;">
                    </div>
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Language</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon  icon-equalizer" style="background-color:#eee;"></span>
                        </div>
                        <input type="text" name="book_language" value="<?php echo $row['book_language'];?>" class="form-control" placeholder="Loading..." style="height:40px;">
                    </div>
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Copy</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text menu-icon   icon-crop" style="background-color:#eee;"></span>
                        </div>
                        <select data-plugin="customselect" class="form-control" name="copy" style="height:40px;">
                            <option value="1" <?php if($row['copy'] == "1"){ ?> selected <?php } ?>>1</option>
                            <option value="2" <?php if($row['copy'] == "2"){ ?> selected <?php } ?>>2</option>
                            <option value="3" <?php if($row['copy'] == "3"){ ?> selected <?php } ?>>3</option>
                            <option value="4" <?php if($row['copy'] == "4"){ ?> selected <?php } ?>>4</option>
                            <option value="5" <?php if($row['copy'] == "5"){ ?> selected <?php } ?>>5</option>
                            <option value="6" <?php if($row['copy'] == "6"){ ?> selected <?php } ?>>6</option>
                            <option value="7" <?php if($row['copy'] == "7"){ ?> selected <?php } ?>>7</option>
                            <option value="8" <?php if($row['copy'] == "8"){ ?> selected <?php } ?>>8</option>
                            <option value="9" <?php if($row['copy'] == "9"){ ?> selected <?php } ?>>9</option>
                            <option value="10"<?php if($row['copy'] == "10"){?> selected <?php } ?>>10</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 form-group mb-3">
                    <label for="validationCustomUsername">Book Case</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text mdi mdi-server" style="background-color:#eee;"></span>
                        </div>
                        <?php 
                            $Q = "SELECT * FROM `book_case`";
                            $query=mysqli_query($con,$Q);
                            $account=mysqli_num_rows($query);
                       ?>
                        <select class="form-control" name="b_c_id" style="height:40px;">
                            <option selected hidden>Select Case</option>
                            <?php 
                      for($i=1; $i<=$account; $i++){
                          $row8=mysqli_fetch_array($query);
                          ?>
                            <option value="<?php echo $row8["b_c_id"]; ?>" <?php if($row8['b_c_id'] == $row['b_c_id']){?> selected <?php } ?> ><?php echo $row8["book_case_id"]; ?><?php echo $row8["c_row"]; ?><?php echo $row8["c_column"]; ?></option>
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
            </div>

            <button type="submit" class="btn btn-warning" name="book_update">Edit</button>
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