<!doctype html>
<html lang="en">
   
<head>
      
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Journal</title>
      <link rel="shortcut icon" href="images/logo gawharshad.png" />
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
			<a href="index"><img src="images/lib.png" alt="" style="height:40px; margin-left:-10px;"></a>
		</div>

		<nav id="nav-menu-container">
			<ul class="nav-menu">
				<li><a href="index">Home</a></li>
				<li><a href="news">news</a></li>
				<li class="menu-active"><a href="Journal.php">journal</a></li>
				<li><a href="gallery">Gallery</a></li>
          <li><a href="contact">Contact us</a></li>
          <li><a href="about_us">About us</a></li>
          <li><a href="dark_blue">Dark Blue</a></li>
          <li><a href="login">SIGN IN</a></li>
			</ul>
		</nav>
	</div>
</header>


                  <div class="col-lg-12" style="padding-top:100px;">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                           <div class="iq-header-title">
                              <h4 class="card-title mb-0"> Browse Journals</h4>
                           </div>
                        </div> 
                        <div class="iq-card-body">  
                              
                              
                              
                           <div class="row">
                                 <?php
                                 include 'connection_DB.php';
								
                                 $sql = "SELECT * FROM journal";
                                 $query =mysqli_query($con,$sql);
                                 while($data = mysqli_fetch_array($query)){?>
                              <div class="col-sm-6 col-md-4 col-lg-3">
                                 <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                    <div class="iq-card-body p-0">
                                       <div class="d-flex align-items-center">
                                          <div class="col-6 p-0 position-relative image-overlap-shadow">
                                             <a href="javascript:void();"><img class="img-fluid rounded w-100" src="<?php echo "journal/".$data['photo'];?>" alt=""></a>
                                             <div class="view-book">
                                                <a href="Journal-page?j_id=<?php echo $data['j_id'];?>" class="btn btn-sm btn-white">View Journal</a>
                                             </div>
                                          </div>
                                          <div class="col-6">
                                             <div class="mb-2">
                                                <h6 class="mb-1"><?php echo $data['title'];?></h6>
                                                <p class="font-size-13 line-height mb-1"><?php echo $data['author'];?></p>
                                                <div class="d-block line-height">
                                                   <span class="font-size-11 text-warning">
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                   </span>                                             
                                                </div>
                                             </div>                                    
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <?php }?>
                           </div>
                        </div>
                     </div>
                  </div>
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="vendors/assets/js/jquery.min.js"></script>
      <script src="vendors/assets/js/popper.min.js"></script>
      <script src="vendors/assets/js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="vendors/assets/js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="vendors/assets/js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="vendors/assets/js/waypoints.min.js"></script>
      <script src="vendors/assets/js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="vendors/assets/js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="vendors/assets/js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="vendors/assets/js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="vendors/assets/js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="vendors/assets/js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="vendors/assets/js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="vendors/assets/js/smooth-scrollbar.js"></script>
      <!-- lottie JavaScript -->
      <script src="vendors/assets/js/lottie.js"></script>
      <!-- am core JavaScript -->
      <script src="vendors/assets/js/core.js"></script>
      <!-- am charts JavaScript -->
      <script src="vendors/assets/js/charts.js"></script>
      <!-- am animated JavaScript -->
      <script src="vendors/assets/js/animated.js"></script>
      <!-- am kelly JavaScript -->
      <script src="vendors/assets/js/kelly.js"></script>
      <!-- am maps JavaScript -->
      <script src="vendors/assets/js/maps.js"></script>
      <!-- am worldLow JavaScript -->
      <script src="vendors/assets/js/worldLow.js"></script>
      <!-- Raphael-min JavaScript -->
      <script src="vendors/assets/js/raphael-min.js"></script>
      <!-- Morris JavaScript -->
      <script src="vendors/assets/js/morris.js"></script>
      <!-- Morris min JavaScript -->
      <script src="vendors/assets/js/morris.min.js"></script>
      <!-- Flatpicker Js -->
      <script src="vendors/assets/js/flatpickr.js"></script>
      <!-- Style Customizer -->
      <script src="vendors/assets/js/style-customizer.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="vendors/assets/js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
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

<script>
  // code az responsive Mobile Navigation
  if ($('#nav-menu-container').length) {
    var $mobile_nav = $('#nav-menu-container').clone().prop({
      id: 'mobile-nav'
    });
    $mobile_nav.find('> ul').attr({
      'class': '',
      'id': ''
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>');
    $('body').append('<div id="mobile-body-overly"></div>');
    $('#mobile-nav').find('.menu-has-children').prepend('<i class="fa fa-chevron-down"></i>');

    $(document).on('click', '.menu-has-children i', function(e) {
      $(this).next().toggleClass('menu-item-active');
      $(this).nextAll('ul').eq(0).slideToggle();
      $(this).toggleClass("fa-chevron-up fa-chevron-down");
    });

    $(document).on('click', '#mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
      $('#mobile-body-overly').toggle();
    });

    $(document).click(function(e) {
      var container = $("#mobile-nav, #mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
      }
    });
  } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
    $("#mobile-nav, #mobile-nav-toggle").hide();
  }
  // Smooth scroll for the navigation menu and links with .scrollto classes
  var scrolltoOffset = $('#header').outerHeight() - 21;
  $(document).on('click', '.nav-menu a, #mobile-nav a, .scrollto', function(e) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        e.preventDefault();

        var scrollto = target.offset().top - scrolltoOffset;

        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.nav-menu').length) {
          $('.nav-menu .menu-active').removeClass('menu-active');
          $(this).closest('li').addClass('menu-active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
        return false;
      }
    }
  });
</script>

</html>

<?php
include 'footer.php';
?>