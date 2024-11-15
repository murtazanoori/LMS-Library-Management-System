<?php
ob_start();
session_start();
?>
<link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">

<!-- partial -->
<div class="main-panel col-12">
        <div class="content-wrapper">
          <div class="row profile-page">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
				<?php
						include 'connection_DB.php';
						// $file_img = "upload/";
						$student_id = $_GET['student_id'];
						$q = "SELECT * FROM `student` JOIN faculty ON student.faculty_id = faculty.faculty_id JOIN department ON 
						student.department_id = department.department_id WHERE stu_id='$student_id'";
						$query = mysqli_query($con,$q);
						$res = mysqli_fetch_array($query);
													
					?>	
                  <div class="profile-header text-white d-none d-md-block">
                    <div class="d-flex justify-content-around">
                      <?php if ($res['photo'] =='') {
                        # code...
                      ?>
                        <div class="profile-info d-flex justify-content-center align-items-md-center">
                        <img class="rounded-circle img-lg" src="images/FILE223.PNG" alt="profile image">
                        
                        <?php }else {
                          # code...
                        ?>

                      <div class="profile-info d-flex justify-content-center align-items-md-center">
                        <img class="rounded-circle img-lg" src="upload/<?php echo $res['photo'];?>" alt="profile image">
                        <?php }?>
                      <div class="wrapper pl-4">
							  <p class="profile-user-name" style="font-size:1rem;"><b><?php echo $res['name'];?> <?php echo $res['lastname'];?></b></p>
							  <p class="profile-user-designation"  style="font-size:1rem;"><b>ID: <?php echo $res['stu_id'];?></b></p>
                          <div class="wrapper d-flex align-items-center">
						  
						  <p class="profile-user-designation"  style="font-size:1rem;"><b>Status: <label class="profile-user-designation badge badge-success"> <?php echo $res['status'];?></lable></b></p>
                            
                            <select id="example-css" name="rating" autocomplete="off">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="details">
                        <div class="detail-col ">
                          <p>Gawharshad</p>
                          <p>Student</p>
                        </div>
                        <div class="detail-col ">
                          <p>University</p>
                          <p>Profile</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-body pt-0 pt-sm-4">
                    <ul class="nav tab-switch " role="tablist ">
                      <li class="nav-item ">
                        <a class="nav-link active " id="user-profile-info-tab " data-toggle="pill " href="#user-profile-info
                        " role="tab " aria-controls="user-profile-info " aria-selected="true ">Profile</a>
                      </li>
                      
                    </ul>
                    <div class="row ">
                                    
                      <div class="col-12 col-md-9">
                        <div class="tab-content tab-body " id="profile-log-switch ">
                          <div class="tab-pane fade show active pr-3 " id="user-profile-info " role="tabpanel" aria-labelledby="user-profile-info-tab ">
                            <div class="table-responsive">
                              <table class="table table-borderless w-100 mt-4 ">
                                <tr>
                                  <td>
                                  <strong>ID :</strong> <?php echo $res['stu_id'];?></td>
                                                <td>
                                  <strong>Full Name :</strong> <?php echo $res['name'];?>  <?php echo $res['lastname'];?> </td>
                                    
                                </tr>
                                <tr>
                                  <td>
								                  <strong>Father Name :</strong> <?php echo $res['father_name'];?></td>
                                  <td>
                                <strong>Faculty :</strong> <?php echo $res['faculty_name'];?></td>
                                              </tr>
                                              <tr>
                                                <td>
                                <strong>Department :</strong> <?php echo $res['department_name'];?></td>
                                                <td>
                                <strong>Shift :</strong> <?php echo $res['shift'];?></td>
                              </tr>
                              <tr>
                                                <td>
                                <strong>Phone :</strong> <?php echo $res['phone'];?></td>
                                                <td>
                                <strong>Status :</strong> <?php echo $res['status'];?></td>
                                </tr>
                              </table>
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
		<!-- content-wrapper ends -->
	

		<script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/form-addons.js"></script>
  <!-- End custom js for this page-->


<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>