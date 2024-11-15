<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gallery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/logo gawharshad.png" />
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="vendors/gallery/fonts/icomoon/style.css">

    <link rel="stylesheet" href="vendors/gallery/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/gallery/css/magnific-popup.css">
    <link rel="stylesheet" href="vendors/gallery/css/jquery-ui.css">
    <link rel="stylesheet" href="vendors/gallery/css/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/gallery/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="vendors/gallery/css/lightgallery.min.css">

    <link rel="stylesheet" href="vendors/gallery/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="vendors/gallery/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="vendors/gallery/css/swiper.css">

    <link rel="stylesheet" href="gallery/css/aos.css">
    <link rel="stylesheet" href="vendors/gallery/css/stylee.css">
    <link rel="stylesheet" href="vendors/gallery/css/style.css">

    <style>
    body {
        padding-top: 110px;
        background-color: black;
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


<div class="row justify-content-center">

    <div class="col-md-7">
        <div class="row mb-5">
            <div class="col-12 ">
                <h2 class="site-section-heading text-center">Welcome to Gallery</h2>
            </div>
        </div>
    </div>

</div>

<div class="container-fluid" data-aos="fade" data-aos-delay="500">

    <div class="row">
    <?php
  include 'connection_DB.php';
        
$sql = "SELECT * FROM gallary";
$query =mysqli_query($con,$sql);
while($data = mysqli_fetch_array($query)){?>
        <div class="col-lg-4">

            <div class="image-wrap-2">
                <div class="image-info">
                    <h2 class="mb-3"><?php echo $data['title'];?></h2>
                    <a href="single?g_id=<?php echo $data['g_id'];?>" class="btn btn-outline-white py-2 px-4">Download</a>
                </div>
                <img src="<?php echo "gallary/".$data['photo']; ?>" alt="Image" class="img-fluid" style=" width: 500px;height: 408px;">
            </div>

        </div>
        
        
        <?php }?>
    </div>
   
</div>

</div>

    <script src="vendors/gallery/jss/jquery-3.3.1.min.js"></script>
    <script src="vendors/gallery/jss/jquery-migrate-3.0.1.min.js"></script>
    <script src="vendors/gallery/jss/jquery-ui.js"></script>
    <script src="vendors/gallery/jss/popper.min.js"></script>
    <script src="vendors/gallery/jss/bootstrap.min.js"></script>
    <script src="vendors/gallery/jss/owl.carousel.min.js"></script>
    <script src="vendors/gallery/jss/jquery.stellar.min.js"></script>
    <script src="vendors/gallery/jss/jquery.countdown.min.js"></script>
    <script src="vendors/gallery/jss/jquery.magnific-popup.min.js"></script>
    <script src="vendors/gallery/jss/bootstrap-datepicker.min.js"></script>
    <script src="vendors/gallery/jss/swiper.min.js"></script>
    <script src="vendors/gallery/jss/aos.js"></script>

    <script src="vendors/gallery/jss/picturefill.min.js"></script>
    <script src="vendors/gallery/jss/lightgallery-all.min.js"></script>
    <script src="vendors/gallery/jss/jquery.mousewheel.min.js"></script>

    <script src="gallery/jss/main.js"></script>

    <script>
    $(document).ready(function() {
        $('#lightgallery').lightGallery();
    });
    </script>

    <!-- hiding navbar menu when scrolling down -->

  <script src="vendors/assets/js/main.js"></script>

<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
if (prevScrollpos > currentScrollPos) {
  document.getElementById("header").style.top = "0";
} else {
  document.getElementById("header").style.top = "-70px";
}
prevScrollpos = currentScrollPos;
}
</script>

</body>

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