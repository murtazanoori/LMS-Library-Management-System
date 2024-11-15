<?php 
ob_start();
session_start();
include 'connection_DB.php';

?>

        <!--Title-->
        <div class="col-12 d-flex align-items-center justify-content-between">
                <h4 class="page-title"></h4>
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
      
            <div class="bg-white d-block p-4" style="width:100%; margin-bottom:70px; margin-top:20px; border:1px solid #eee; border-radius:6px;" id="b">
    <div class="d-block p-4" style="border-radius:6px; background-color:#f9fbfd">
    <p class="menu-icon icon-calendar" style="font-size:1.2rem;"> View All Journal</p>
        <div class="d-block" style="height:2px; background-color:#564a4a26"></div><br><br>
        <div style="margin-top:20px">
           <div class="row mt-3 ml-1 container" >
			   <?php
    
              $q = "SELECT * FROM `journal`";
               $query = mysqli_query($con,$q);
               while($res = mysqli_fetch_array($query)){
				   ?>
                                        
                              
            <div class="col-12 col-md-12 grid-margin stretch-card">
              <div class="card col-xl">
				   <a href="det_journal?j_id=<?php echo $res['j_id'];?>" class="text-decoration-none"> 
                <div class="card-body col-6">
                  <div class="d-flex flex-row">
                    <?php
                      if ($res['photo'] =='') {
                        # code...
                    ?>
                    <img src="images/FILE223.PNG" class="img-lg rounded" alt="profile image" />
                    <?php
                      }else {
                        # code...
                    ?>
                    <img src="journal/<?php echo $res['photo'];?>" class="img-lg rounded" alt="profile image" />
                    <?php }?>
                    <div class="ml-3">
                      <h6><?php echo $res['title'];?></h6>
                      <p class="text-muted"><?php echo $res['author'];?></p>
                      <p class="text-muted">
                      <?php 
                                        if($res['avalibality']=='Avalible'){ ?>
                                       <span class="badge badge-success text-white"><?php echo "Avalible";?></span>
                                          <?php }else{?>
                                       <span class="text-white badge badge-warning"><?php echo "Coming Soon";?></span>
                                      <?php }?>
                      </p>
                      
                      
                      
                    </div>
                    
                  </div>
                </div>
					   
						</a>
				  
              </div>
				
            </div>
			   <?php } ?>
          </div>
		</div>
				</div>
</div>


<?php
    $section = ob_get_contents();
    ob_end_clean();
    include_once("master_page.php");
?>