<?php 
session_start();
  
if(isset($_SESSION['welcome'])){
    
include 'connection_DB.php';
$user_name = $_SESSION['welcome'];

	$sql = "SELECT * FROM users WHERE username='$user_name'";
	$query =mysqli_query($con,$sql);
	$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
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

<body>
  
  <div class="container-scroller">
    
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="system">
          <img src="images/1609057472732.png" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="system">
          <img src="images/logo Gawharshad.png" alt="logo" style="width: 3rem; height: 3rem;" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        
        <ul class="navbar-nav navbar-nav-right">
         
          <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="dropdown-toggle-wrapper">
                <?php
                if ($data['photo'] =='') {
                  # code...
                ?>
                <div class="inner">
                  
                  <img class="img-xs rounded-circle" src="images/FILE223.PNG" alt="Profile image">
                </div>
                <?php
                  }else {
                    # code...
                  
                ?>
                <div class="inner">
                  
                  <img class="img-xs rounded-circle" src="user_image/<?php echo $data['photo']; ?>" alt="Profile image">
                </div>
                <?php }?>
                <div class="inner">
                  <div class="inner">
                    <span class="profile-text font-weight-bold"><?php echo $data['name'];?> <?php echo $data['lastname']; ?></span>
                    <small class="profile-text small"><?php if ($data['role']==0)
	                echo"Admin";
	                elseif($data['role']==1)
		            echo"Librarian"; ?></small>
                  </div>
                  <div class="inner">
                    <div class="icon-wrapper">
                      <i class="mdi mdi-chevron-down"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-5 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-5 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a class="dropdown-item" href="user_profile?user_id=<?php echo $data['user_id'];?>"><i class="menu-icon icon-user text-primary"></i>
                 Profile
                </a>
                <a class="dropdown-item" href="edit_users_page?user_id=<?php echo $data['user_id'];?>"><i class=" icon-pencil text-primary"></i>
                 Edit Profile
                </a>
              <?php if($_SESSION['role'] == 0){?>
                <a class="dropdown-item mt-2" href="manage_user"><i class="menu-icon  icon-list text-primary"></i>
                  Manage Accounts
                </a>
                <a class="dropdown-item mt-2" href="view_users_page"><i class="menu-icon  icon-refresh text-primary"></i>
                  View All Users
                </a>
                <?php }?>
                <a class="dropdown-item" href="logout"><i class="menu-icon icon-logout text-primary"></i>
                  Sign Out
                </a>
              
            </div>
          </li>
          
          
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.php -->
      <div class="theme-setting-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <div class="d-flex align-items-center justify-content-between border-bottom">
            <p class="settings-heading font-weight-bold border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Template Skins</p>
          </div>
          <div class="sidebar-bg-options" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options selected" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading font-weight-bold mt-2">Header Skins</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles pink"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas sidebar-dark" id="sidebar">
      <ul class="nav">
           
          <li class="nav-item nav-profile">
            <img src="images/logo Gawharshad.png" alt="Uiversity Logo">
            <p class="text-center font-weight-medium">Gawharshad University</p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="system">
              <i class="menu-icon icon-home"></i>
              <span class="menu-title">HOME</span>
              <div class="badge badge-success"></div>
            </a>
          </li>
          <li class="nav-item d-none d-md-block">
            <a class="nav-link" data-toggle="collapse" href="#Members" aria-expanded="false" aria-controls="page-layouts">
              <i class="menu-icon icon-people"></i>
              <span class="menu-title">Members</span>
            </a>
            <div class="collapse" id="Members">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="Enroll_Student">Enroll Student</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_student">Manage Student</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="enroll_teacher">Enroll Teacher</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_teacher">Manage Teacher</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="enroll_employees">Enroll Employees</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_employees">Manage Employees</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#faculty" aria-expanded="false" aria-controls="apps-dropdown">
              <i class="menu-icon icon-graduation"></i>
              <span class="menu-title">Faculty</span>
              
            </a>
            <div class="collapse" id="faculty">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="add_faculty">Add Faculty</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="faculty_list"> Manage Faculty</a>
                </li>
              </ul>
            </div>
          </li>
         
          <li class="nav-item d-none d-md-block">
            <a class="nav-link" data-toggle="collapse" href="#department" aria-expanded="false" aria-controls="sidebar-layouts">
              <i class="menu-icon icon-drawer"></i>
              <span class="menu-title">Department</span>
            </a>
            <div class="collapse" id="department">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="add_department">Add Department</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="department_list"> Manage Department</a>
                </li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#position" aria-expanded="false" aria-controls="position">
              <i class="menu-icon icon-badge"></i>
              <span class="menu-title">Position</span>
              
            </a>
            <div class="collapse" id="position">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="add_position">Add Position</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="position_list">Position List</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Book" aria-expanded="false" aria-controls="Book">
              <i class="menu-icon icon-book-open"></i>
              <span class="menu-title">Book</span>
            </a>
            <div class="collapse" id="Book">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="add_book">Add Book</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="book_list">Manage Faculty Book</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_monograph">Manage Monograph</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_fasilnama">Manage Fasilnama Book</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_general">Manage General Book</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_history">Manage History Book</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_rule">Manage Rule Book</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_cd">Manage Cd File</a>
                </li>
                
              </ul>
            </div>
          </li>
          
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#BOOKCASE" aria-expanded="false" aria-controls="BOOKCASE">
              <i class="menu-icon  icon-pie-chart"></i>
              <span class="menu-title">Book Case</span>
            </a>
            <div class="collapse" id="BOOKCASE">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="add_book_case">Add</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="book_case_list">List</a>
                </li>
                
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#LONBOOKRETURNBOOK" aria-expanded="false" aria-controls="LONBOOKRETURNBOOK">
              <i class="menu-icon icon-credit-card"></i>
              <span class="menu-title">Borrow Book</span>
              
            </a>
            <div class="collapse" id="LONBOOKRETURNBOOK">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item">
                  <a class="nav-link" href="add_lon_return_book"> Student Loan </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="add_lon_teacher"> Teacher Loan </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="add_lon_employee"> Employee Loan </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="lon_return_book_list">Return & Report </a>
                </li>
                
              </ul>
            </div>
          </li>
          
          <?php if($_SESSION['role'] ==0){?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#USERS" aria-expanded="false" aria-controls="USERS">
              <i class="menu-icon icon-user"></i>
              <span class="menu-title">Users</span>
            </a>
            <div class="collapse" id="USERS">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="insert_user"> Insert User </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="manage_user"> Manage User </a>
                </li>
                
                
              </ul>
            </div>
          </li>
          <?php }?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#news" aria-expanded="false" aria-controls="USERS">
                <i class="menu-icon icon-loop"></i>
                <span class="menu-title">News</span>
              </a>
               <div class="collapse" id="news">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="news_page">News Page </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="news_manage">News Manage</a>
                </li>
                
                
              </ul>
            </div>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#gallary" aria-expanded="false" aria-controls="USERS">
                <i class="menu-icon  icon-picture"></i>
                <span class="menu-title">Gallary</span>
              </a>
               <div class="collapse" id="gallary">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="insert_gallary">Insert </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="list_gallary">List Section</a>
                </li>
                
                
              </ul>
            </div>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#Journal" aria-expanded="false" aria-controls="Journal">
                <i class="menu-icon icon-calendar"></i>
                <span class="menu-title">Journal</span>
              </a>
               <div class="collapse" id="Journal">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="add_journal">Insert </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="journal_list">List Section</a>
                </li>
                
                
              </ul>
            </div>
                  
            
          </li>
        </ul>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-4">
          
            <div class="col-12 d-flex align-items-center justify-content-between">
            
              <h4 class="page-title   mdi mdi-laptop-chromebook text-dark" style="font-size:1.3rem;">
                    <?php if ($data['role']==0)
	                echo"Admin";
	                elseif($data['role']==1)
		            echo"Librarian"; ?> Dashboard</h4>
              
              <div class="d-flex align-items-center">
                
                <!-- <div class="wrapper mr-4 d-none d-sm-block">
                  <p class="mb-0">Summary for
                    <b class="mb-0">September 2017</b>
                  </p>
                </div> -->
                <div class="wrapper">
                  <a href="https://gawharshad.edu.af/prs/" class="btn btn-link btn-sm font-weight-bold">
                    Visit Gawharshad University Site</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 card-statistics">
              <div class="row">
                <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card card-tile">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h6 class="text-primary">Student Section</h6>
                        <i class=" mdi mdi-library text-primary"style="font-size:3rem;"></i>
                      </div>
                      <div class="d-flex justify-content-between">
                        <?php
                        include 'connection_DB.php';
                          $query="SELECT stu_id FROM student ORDER BY stu_id";
                          $query_run = mysqli_query($con,$query);
                          $ResultSet = mysqli_num_rows($query_run);
                          // echo'<h4> Total of Student : '.$ResultSet.'</h4>';
                        ?>
                        <h5 class="text-muted">Total: <?php echo $ResultSet;?></h5>
                        <p class="badge badge-success text-white">Demo</p>
                      </div>
                      <!-- <div class="d-block" style="height:2px; background-color:#564a4a26"></div>
                       -->
                       <div class="from-group" id="process">
                      <div class="progress">
                      <div class="progress-bar progress-bar-success active" role="progressbar" aria-valuemin="0"
                       aria-valuemax="100" style="color:#228B22; background-color:#228B22"><?php
                       for($i=0; $i<=$ResultSet; $i++){
                         echo "$i";
                       }
                       ?></div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card card-tile">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5 class="text-warning">Teacher Section</h5>
                        
                        <i class="mdi mdi-human-greeting text-primary"style="font-size:3rem;"></i>
                      </div>
                      
                      <div class="d-flex justify-content-between">
                      <?php
                        include 'connection_DB.php';
                          $query="SELECT teacher_id FROM teacher ORDER BY teacher_id";
                          $query_run = mysqli_query($con,$query);
                          $ResultSet = mysqli_num_rows($query_run);
                          // echo'<h4>'.$ResultSet.'</h4>';
                        ?>
                        <h5 class="text-muted">Total: <?php echo $ResultSet;?></h5>
                        <p class="badge badge-primary text-white">Demo</p>
                      </div>
                      <!-- <div class="d-block" style="height:2px; background-color:#564a4a26"></div>
                       -->
                       <div class="from-group" id="process">
                      <div class="progress">
                      <div class="progress-bar progress-bar-success active" role="progressbar" aria-valuemin="0"
                       aria-valuemax="100" style="color:#4C00FF; background-color:#4C00FF"><?php
                       for($i=0; $i<=$ResultSet; $i++){
                         echo "$i";
                       }
                       ?></div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card card-tile">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5 class="text-body">Employee Section</h5>
                        <i class="mdi mdi-folder-account text-primary"style="font-size:3rem;"></i>
                      </div>
                      <div class="d-flex justify-content-between">
                      <?php
                        include 'connection_DB.php';
                          $query="SELECT e_id FROM employee ORDER BY e_id";
                          $query_run = mysqli_query($con,$query);
                          $ResultSet = mysqli_num_rows($query_run);
                          // echo'<h4>'.$ResultSet.'</h4>';
                        ?>
                         <h5 class="text-muted">Total: <?php echo $ResultSet;?></h5>
                        <p class="badge badge-info text-white">Demo</p>
                      </div>
                      <!-- <div class="d-block" style="height:2px; background-color:#564a4a26"></div> -->
                      <div class="from-group" id="process">
                      <div class="progress">
                      <div class="progress-bar progress-bar-success active" role="progressbar" aria-valuemin="0"
                       aria-valuemax="100" style="color:#FFA500; background-color:#FFA500"><?php
                       for($i=0; $i<=$ResultSet; $i++){
                         echo "$i";
                       }
                       ?></div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card card-tile">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="d-flex justify-content-between pb-2">
                        <h5 class="text-danger">Users Section</h5>
                        <i class="mdi mdi-contacts text-primary"style="font-size:3rem;"></i>
                      </div>
                      <div class="d-flex justify-content-between">
                      <?php
                        include 'connection_DB.php';
                          $query="SELECT user_id FROM users ORDER BY user_id";
                          $query_run = mysqli_query($con,$query);
                          $ResultSet = mysqli_num_rows($query_run);
                          // echo'<h4>'.$ResultSet.'</h4>';
                        ?>
                         <h5 class="text-muted">Total: <?php echo $ResultSet;?></h5>
                        <p class="badge badge-warning text-white">Demo</p>
                      </div>
                      <!-- <div class="d-block" style="height:2px; background-color:#564a4a26"></div> -->
                      <div class="from-group" id="process">
                      <div class="progress">
                      <div class="progress-bar progress-bar-success active" role="progressbar" aria-valuemin="0"
                       aria-valuemax="100" style="color:#FF2500; background-color:#FF2500"><?php
                       for($i=0; $i<=$ResultSet; $i++){
                         echo "$i";
                       }
                       ?></div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
           
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <?php
                          include 'connection_DB.php';
                            $query="SELECT book_id FROM book ORDER BY book_id";
                            $query_run = mysqli_query($con,$query);
                            $ResultSet = mysqli_num_rows($query_run);
                            // echo'<h4>'.$ResultSet.'</h4>';
                  ?>
                  <div class="d-flex align-items-center justify-content-between pb-4">
                    <h4 class="card-title mb-0">Summary All Book On System</h4>
                    <p class="mb-0">View Section
                      <i class="mdi mdi-chevron-down"></i>
                    </p>
                  </div>
                  <div class="row">
                    <div class="col-sm-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <i class="mdi mdi-book-open-page-variant text-primary"style="font-size:3rem;"></i>
                          <div class="d-flex">
                            <div class="inner flex-grow">
                              <p class="mb-0">Faculty Books</p>
                              <h4 class="font-weight-bold"><?php echo $ResultSet;?></h4>
                            </div>
                            <div class="inner d-flex align-items-center">
                              <h1 class="badge badge-success text-white font-weight-bold">Demo</h1>
                            </div>
                          </div>
                          <div class="d-block" style="height:2px; background-color:#564a4a26"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                        <?php
                          include 'connection_DB.php';
                            $query="SELECT mo_id FROM monograph ORDER BY mo_id";
                            $query_run = mysqli_query($con,$query);
                            $ResultSet = mysqli_num_rows($query_run);
                            // echo'<h4>'.$ResultSet.'</h4>';
                          ?>
                          <i class="mdi mdi-library-books text-primary"style="font-size:3rem;"></i>
                          <div class="d-flex">
                            <div class="inner flex-grow">
                              <p class="mb-0">Monographs</p>
                              <h4 class="font-weight-bold"><?php echo $ResultSet;?></h4>
                            </div>
                            <div class="inner d-flex align-items-center">
                            <h1 class="badge badge-primary text-white font-weight-bold">Demo</h1>
                            </div>
                          </div>
                          <div class="d-block" style="height:2px; background-color:#564a4a26"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 grid-margin-sm-down stretch-card">
                      <div class="card">
                        <div class="card-body">
                        <?php
                          include 'connection_DB.php';
                            $query="SELECT fasilnama_id FROM fasilnama ORDER BY fasilnama_id";
                            $query_run = mysqli_query($con,$query);
                            $ResultSet = mysqli_num_rows($query_run);
                            // echo'<h4>'.$ResultSet.'</h4>';
                          ?>
                          <i class="mdi mdi-book-open text-primary"style="font-size:3rem;"></i>
                          <div class="d-flex">
                            <div class="inner flex-grow">
                              <p class="mb-0">Fasilnama Book</p>
                              <h4 class="font-weight-bold"><?php echo $ResultSet;?></h4>
                            </div>
                            <div class="inner d-flex align-items-center">
                            <h1 class="badge badge-info text-white font-weight-bold">Demo</h1>
                            </div>
                          </div>
                          <div class="d-block" style="height:2px; background-color:#564a4a26"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 grid-margin-sm-down stretch-card">
                      <div class="card">
                        <div class="card-body">
                        <?php
                          include 'connection_DB.php';
                            $query="SELECT general_book_id FROM general_book ORDER BY general_book_id";
                            $query_run = mysqli_query($con,$query);
                            $ResultSet = mysqli_num_rows($query_run);
                            // echo'<h4>'.$ResultSet.'</h4>';
                          ?>
                          <i class="mdi mdi-book-variant text-primary"style="font-size:3rem;"></i>
                          <div class="d-flex">
                            <div class="inner flex-grow">
                              <p class="mb-0">General Book</p>
                              <h4 class="font-weight-bold"><?php echo $ResultSet;?></h4>
                            </div>
                            <div class="inner d-flex align-items-center">
                            <h1 class="badge badge-warning text-white font-weight-bold">Demo</h1>
                            </div>
                          </div>
                          <div class="d-block" style="height:2px; background-color:#564a4a26"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 grid-margin-sm-down stretch-card mt-3">
                      <div class="card">
                        <div class="card-body">
                        <?php
                          include 'connection_DB.php';
                            $query="SELECT hs_id FROM history_book ORDER BY hs_id";
                            $query_run = mysqli_query($con,$query);
                            $ResultSet = mysqli_num_rows($query_run);
                            // echo'<h4>'.$ResultSet.'</h4>';
                          ?>
                          <i class="mdi mdi-notebook text-primary"style="font-size:3rem;"></i>
                          <div class="d-flex">
                            <div class="inner flex-grow">
                              <p class="mb-0">History Book</p>
                              <h4 class="font-weight-bold"><?php echo $ResultSet;?></h4>
                            </div>
                            <div class="inner d-flex align-items-center">
                            <h1 class="badge badge-danger text-white font-weight-bold">Demo</h1>
                            </div>
                          </div>
                          <div class="d-block" style="height:2px; background-color:#564a4a26"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 grid-margin-sm-down stretch-card mt-3">
                      <div class="card">
                        <div class="card-body">
                        <?php
                          include 'connection_DB.php';
                            $query="SELECT r_id FROM rule_book ORDER BY r_id";
                            $query_run = mysqli_query($con,$query);
                            $ResultSet = mysqli_num_rows($query_run);
                            // echo'<h4>'.$ResultSet.'</h4>';
                          ?>
                          <i class="mdi mdi-book-open-variant text-primary"style="font-size:3rem;"></i>
                          <div class="d-flex">
                          
                            <div class="inner flex-grow">
                            
                              <p class="mb-0">Rule Book</p>
                              <h4 class="font-weight-bold"><?php echo $ResultSet;?></h4>
                            </div>
                            <div class="inner d-flex align-items-center">
                            <h1 class="badge badge-secondary text-white font-weight-bold">Demo</h1>
                            
                            </div>
                            
                          </div>
                          <div class="d-block" style="height:2px; background-color:#564a4a26"></div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-12 grid-margin-sm-down stretch-card mt-3">
                      <div class="card">
                        <div class="card-body">
                        <?php
                          include 'connection_DB.php';
                            $query="SELECT j_id FROM journal ORDER BY j_id";
                            $query_run = mysqli_query($con,$query);
                            $ResultSet = mysqli_num_rows($query_run);
                            // echo'<h4>'.$ResultSet.'</h4>';
                          ?>
                          <i class=" mdi mdi-file-document-box text-primary" style="font-size:3rem;"></i>
                          <div class="d-flex">
                          
                            <div class="inner flex-grow">
                            
                              <p class="mb-0">Journal</p>
                              <h4 class="font-weight-bold"><?php echo $ResultSet;?></h4>
                            </div>
                            <div class="inner d-flex align-items-center">
                            <h1 class="badge badge-secondary text-white font-weight-bold">Demo</h1>
                            
                            </div>
                            
                          </div>
                          <div class="d-block" style="height:2px; background-color:#564a4a26"></div>
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
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">© 2021 All Right Reserved GU.Powered By
              <a href="system.php" target="_blank">Dark Blue</a></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Feel The Power of Programming With us
              <i class=" icon-social-google text-primary"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php
  }
  else{
      header("location:login?login=required");
  }

?>

  <!-- plugins:js -->
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
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
 
</body>
</html>