<?php
ob_start();
include 'connection_DB.php';
session_start();
?>
<head>

<style>


.page-wrapper > .content {
    padding: 1.875rem 1.875rem 0;
}

body {
    background-color: #fff;
    color: #333;
    font-family: 'poppins' san-serif;
    font-size: 1.3rem;
    height: 100%;
    line-height: 1.5;
    overflow-x: hidden;
}
.card-body {
    padding: 1.5rem;
}
.profile-tab-cont {
    padding-top: 1.875rem;
}

.profile-header {
    background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
    border: 1px solid #efefef;
    padding: 1.5rem;
}
.profile-header{

	margin-bottom:20px;
}
.btn-primary {
    background-color: #FFBC53;
    border: 1px solid #FFBC53;
}

.profile-menu {
    background-color: #fff;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
    padding: 0.9375rem 1.5rem;
}

.nav-tabs.nav-tabs-solid > li > a.active, .nav-tabs.nav-tabs-solid > li > a.active:hover, .nav-tabs.nav-tabs-solid > li > a.active:focus {
    background-color: #FFBC53;
    border-color: #FFBC53;
    color: #fff;
	font-size: 1rem;
}
.nav-tabs.nav-tabs-solid > li > a:hover, .nav-tabs.nav-tabs-solid > li > a:focus {
    background-color: #f5f5f5;
}

.nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
    background-color: #eee;
    border-color: transparent;
    color: #333;
	font-size: 1rem;
}

.nav-pills .nav-item .nav-link, .nav-tabs .nav-item .nav-link {
    font-family: "Muli", sans-serif;
    line-height: 1;
    font-size: 16px;
    color: #000;
    text-align: center;
    display: -webkit-flex;
    display: flex;
}

.nav-tabs .nav-link {
    border-radius: 0;
}
.nav-tabs {
    border-bottom:none;
}

.edit-link {
    color: #66676b;
    font-size: 16px;
    margin-top: 4px;
}

.btn-success {
    background-color: #7bb13c;
    border: 1px solid #7bb13c;
}

.skill-tags span {
    background-color: #f4f4f5;
    border-radius: 4px;
    color: #66676b;
    display: inline-block;
    font-size: 15px;
    line-height: 22px;
    margin: 2px 0;
    padding: 5px 15px;
}

.breadcrumb {
    border: none;
}
.breadcrumb .breadcrumb-item {
    font-size: 1rem;
}

p {
    font-size: 1.1rem;
}
.btn btn-success{
	margin-left:200px;
}


</style>

</head>
<div class="content container-fluid">
					<?php
					$id = $_GET['id'];
	$sql = "SELECT * FROM news WHERE id='$id'";
	$query =mysqli_query($con,$sql);
	while($data = mysqli_fetch_array($query)){?>
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">News Page</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="system">Home</a></li>
									<li class="breadcrumb-item active"><?php echo $data['name'];?> News</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
	
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header mb-0">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
											<?php 
												if ($data['news_img'] =='') {
													# code...
											?>
											<img class="rounded-circle img-lg" alt="User Image" src="images/responsive.png">
											<?php
												}else {
													# code...
											?>
											<img class="rounded-circle img-lg" alt="User Image" src="images/<?php echo $data['news_img'];?>">
											<?php }?>
									</div>
									
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"><?php echo $data['name'];?></h4>
										<h6 class="text-muted text-success"><?php echo $data['dis'];?></h6><br>
										<h6 class="text-muted"><?php echo $data['info'];?></h6>
										
									</div>
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab">News Details</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card mt-0">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span></span> 
														
													</h5>
													
													<!-- Account Status -->
													<table class="table table-borderless w-100 mt-4 ">
                                					<tr>
                                                		<td>
                                  							<strong>News Title :</strong> <?php echo $data['name'];?>
														</td>
														
														<td>
                                  							<strong>News Discraption :</strong> <?php echo $data['dis'];?>
														</td>
                                					
                                  						
                                  						
                                              		</tr>
													  
                                              		<tr>
                                                		
                                                		
                                
                              						
													  
													  	
													  </tr>
                              
                              					</table>
									
												
													
												</div>
											</div>
											<!-- /Account Status -->
									<!-- /Personal Details -->

								</div>
												</div>
											</div>
											
										</div>
										
										
 <?php }?>
										
									</div>
									
								<!-- /Personal Details Tab -->
								
								
								
							</div>
						</div>
				
				
				


<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>