

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gallery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="images/logo gawharshad.png" />
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="vendors/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/assets/css/magnific-popup.css">
  <link rel="stylesheet" href="vendors/assets/css/jquery-ui.css">
  <link rel="stylesheet" href="vendors/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="vendors/assets/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="vendors/assets/css/lightgallery.min.css">    

  <link rel="stylesheet" href="vendors/assets/css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="vendors/assets/fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="vendors/assets/css/swiper.css">

  <link rel="stylesheet" href="vendors/assets/css/aos.css">

  <link rel="stylesheet" href="vendors/assets/css/style.css">

  <link rel="stylesheet" href="vendors/assets/css/stylee.css">

  <style>
  
      body{
         background: black;
         background-size:cover;
         
      }

      .mb-1{
         /* for giving abit space between the Journal and title */
         margin-left:10px;
      }
      .text-warning{
         /* space between the journal image and stars */
         margin-left:10px;
      }
      
    </style>
</head>
<body>
<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>
<header id="header" class="header-transparent">
	<div class="container d-flex justify-content-between">

		<div id="logo">
			<a href="index.php"><img src="images/lib.png" alt="" style="height:40px; margin-left:-10px;"></a>
		</div>

		<nav id="nav-menu-container">
			<ul class="nav-menu">
            <li><a href="index">Home</a></li>
          <li><a href="news">news</a></li>
          <li><a href="Journal.php">journal</a></li>
          <li class="menu-active"><a href="gallery">gallery</a></li>
          <li><a href="contact">contact us</a></li>
          <li><a href="about_us">about us</a></li>
          <li><a href="dark_blue">Dark Blue</a></li>
          <li><a href="login">Sign In</a></li>
			</ul>
		</nav>
	</div>
</header>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <div class="site-section"  data-aos="fade">
      <div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-md-7">
            <div class="row mb-5">
              <div class="col-12 ">
                <h2 class="site-section-heading text-center">Library Gallery</h2>
              </div>
            </div>
          </div>

        </div>
        <?php
				include 'connection_DB.php';
				$g_id = $_GET['g_id'];
				$q = "SELECT * FROM gallary WHERE g_id = '$g_id'";
				$query = mysqli_query($con,$q);
				$ResultSet = mysqli_fetch_array($query);
			
      ?>
        <center>
        <div class="row" id="lightgallery">
          <div class="col-sm-6 col-md-4 col-lg-4 col-xl-12 item" data-aos="fade" data-src="<?php echo "gallary/".$ResultSet['photo'];?>" data-sub-html="<h4><?php echo $ResultSet ['title'];?></h4><p>from</p><p><?php echo $ResultSet['author'];?></p>">
            <a href="#"><img src="<?php echo "gallary/".$ResultSet['photo'];?>" alt="IMage" class="img-fluid" style=" width: 500px;height: 408px;"></a><br><br>
            <h4><?php echo $ResultSet ['title'];?></h4>
            <h4><?php echo $ResultSet ['author'];?></h4>
          </div>

        </div>
        </center>




        
        
      </div>
    </div>
  </div>

  <script src="vendors/assets/js/jquery-3.3.1.min.js"></script>
  <script src="vendors/assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="vendors/assets/js/jquery-ui.js"></script>
  <script src="vendors/assets/js/popper.min.js"></script>
  <script src="vendors/assets/js/bootstrap.min.js"></script>
  <script src="vendors/assets/js/owl.carousel.min.js"></script>
  <script src="vendors/assets/js/jquery.stellar.min.js"></script>
  <script src="vendors/assets/js/jquery.countdown.min.js"></script>
  <script src="vendors/assets/js/jquery.magnific-popup.min.js"></script>
  <script src="vendors/assets/js/bootstrap-datepicker.min.js"></script>
  <script src="vendors/assets/js/swiper.min.js"></script>
  <script src="vendors/assets/js/aos.js"></script>

  <script src="vendors/assets/js/picturefill.min.js"></script>
  <script src="vendors/assets/js/lightgallery-all.min.js"></script>
  <script src="vendors/assets/js/jquery.mousewheel.min.js"></script>

  <script src="vendors/assets/js/main.js"></script>
  
  <script>
    $(document).ready(function(){
      $('#lightgallery').lightGallery();
    });
  </script>

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

</body>
</html>

<?php
include 'footer.php';
?>