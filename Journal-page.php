<!doctype html>
<html lang="en">
   

<head>
      
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Journal</title>
      <link rel="shortcut icon" href="vendors/assets/img/logo gawharshad.png" />
      <link rel="stylesheet" href="vendors/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="vendors/assets/css/typography.css">
      <link rel="stylesheet" href="vendors/assets/css/styling.css">
      <link rel="stylesheet" href="vendors/assets/css/responsive.css">
      <link href="vendors/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="vendors/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <link href="vendors/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="vendors/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="vendors/assets/vendor/venobox/venobox.css" rel="stylesheet">
      <link href="vendors/assets/vendor/aos/aos.css" rel="stylesheet">
      <link href="vendors/assets/css/style.css" rel="stylesheet">
      <style>
      body{
         background: black;
         background-size:cover;
         
      }
      </style>
   </head>
   <body>


	<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>

<header id="header" class="header-transparent">
	<div class="container d-flex justify-content-between">

		<div id="logo">
			<a href="index.php"><img src="vendors/assets/img/lib.png" alt="" style="height:40px; margin-left:-10px;"></a>
		</div>

		<nav id="nav-menu-container">
			<ul class="nav-menu" style="margin-right:-95px;">
				<li><a href="index">Home</a></li>
				<li><a href="news">news</a></li>
				<li class="menu-active"><a href="Journal.php">journal</a></li>
				<li><a href="gallery.php">Gallery</a></li>
          <li><a href="contact">Contact us</a></li>
          <li><a href="about_us">About us</a></li>
          <li><a href="dark_blue">Dark Blue</a></li>
          <li><a href="login">SIGN IN</a></li>
			</ul>
		</nav>
	</div>
</header>

     
         <div id="content-page" class="content-page" style="margin-left:-5px;">
            <div class="container-fluid"></div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center">
                           <h4 class="card-title mb-0">Journal Description</h4>
                        </div>
                        <div class="iq-card-body pb-0">
                           <div class="description-contens align-items-top row">
                              <div class="col-md-6">
                                 <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body p-0">
                                       <div class="row align-items-center">
                                       <?php
                                          include 'connection_DB.php';
                                          $j_id = $_GET['j_id'];
                                          $q = "SELECT * FROM journal WHERE j_id = '$j_id'";
                                          $query = mysqli_query($con,$q);
                                          $ResultSet = mysqli_fetch_array($query);
                                       
                                       ?>
                                          <div class="col-9">
                                             <ul id="description-slider" class="list-inline p-0 m-0  d-flex align-items-center">
                                                <li>
                                                   <a href="javascript:void(0);">
                                                   <img src="<?php echo "journal/".$ResultSet['photo'];?>" class="img-fluid w-100 rounded" alt="">
                                                   </a>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body p-0">
                                       <h3 class="mb-3"><?php echo $ResultSet['title'];?></h3>
                                       <div class="mb-3 d-block">
                                          <span class="font-size-20 text-warning">
                                          <i class="fa fa-star mr-1"></i>
                                          <i class="fa fa-star mr-1"></i>
                                          <i class="fa fa-star mr-1"></i>
                                          <i class="fa fa-star mr-1"></i>
                                          <i class="fa fa-star"></i>
                                          </span>
                                       </div>
                                       <span class="text-dark mb-4 pb-4 iq-border-bottom d-block"><?php echo $ResultSet['info'];?></span>
                                       <div class="text-primary mb-4">Author: <span class="text-body"><?php echo $ResultSet['author'];?></span></div>
                                       <div class="text-primary mb-4">Publish Year: <span class="text-body"><?php echo $ResultSet['publish_year'];?></span></div>
                                       <div class="text-primary mb-4">Pages: <span class="text-body"><?php echo $ResultSet['pages'];?></span></div>
                                       <div class="text-primary mb-4">Avalibality: 
                                       <?php 
                                        if($ResultSet['avalibality']=='Avalible'){ ?>
                                       <span class="text-body badge badge-success"><?php echo "Avalible";?></span></div>
                                          <?php }else{?>
                                       <span class="text-body badge badge-warning"><?php echo "Coming Soon";?></span></div>
                                      <?php }?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

   <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        <strong>© 2021 All Right Reserved GU Powered By.</strong> <a href="dark_blue">Dark Blue</a>
      </div>
      <!-- <div class="credits">
       
      </div> -->
    </div>
  </footer>
  
      <script src="vendors/assets/js/jquery.min.js"></script>
      <script src="vendors/assets/js/popper.min.js"></script>
      <script src="vendors/assets/js/bootstrap.min.js"></script>
      <script src="vendors/assets/js/jquery.appear.js"></script>
      <script src="vendors/assets/js/countdown.min.js"></script>
      <script src="vendors/assets/js/waypoints.min.js"></script>
      <script src="vendors/assets/js/jquery.counterup.min.js"></script>
      <script src="vendors/assets/js/wow.min.js"></script>
      <script src="vendors/assets/js/apexcharts.js"></script>
      <script src="vendors/assets/js/slick.min.js"></script>
      <script src="vendors/assets/js/select2.min.js"></script>
      <script src="vendors/assets/js/owl.carousel.min.js"></script>
      <script src="vendors/assets/js/jquery.magnific-popup.min.js"></script>
      <script src="vendors/assets/js/smooth-scrollbar.js"></script>
      <script src="vendors/assets/js/lottie.js"></script>
      <script src="vendors/assets/js/core.js"></script>
      <script src="vendors/assets/js/charts.js"></script>
      <script src="vendors/assets/js/animated.js"></script>
      <script src="vendors/assets/js/kelly.js"></script>
      <script src="vendors/assets/js/maps.js"></script>
      <script src="vendors/assets/js/worldLow.js"></script>
      <script src="vendors/assets/js/raphael-min.js"></script>
      <script src="vendors/assets/js/morris.js"></script>
      <script src="vendors/assets/js/morris.min.js"></script>
      <script src="vendors/assets/js/flatpickr.js"></script>
      <script src="vendors/assets/js/style-customizer.js"></script>
      <script src="vendors/assets/js/chart-custom.js"></script>
      <script src="vendors/assets/js/custom.js"></script>
   </body>

   <script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("header").style.top = "0";
  } else {
    document.getElementById("header").style.top = "-90px";
  }
  prevScrollpos = currentScrollPos;
}
</script>
</html>


