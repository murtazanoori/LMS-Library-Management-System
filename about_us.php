<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>About us</title>
    <link rel="shortcut icon" href="images/logo gawharshad.png" />
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="images/logo Gawharshad.png" rel="icon">
    <link href="images/logo Gawharshad.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
        rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendors/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendors/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="vendors/venobox/venobox.css" rel="stylesheet">
    <link href="vendors/aos/aos.css" rel="stylesheet">
    <link href="vendors/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="vendors/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" href="vendors/assets/css/responsive.css">
    <style>
    .about-us {
        background-color: white;
    }

    .about-us h1 {
        color: PURPLE;
        font-size: 50px;
        margin-top: 14%;
    }

    .about-us-p {
        font-size: 20px;
        color: black;
        margin-left: 12%;
        margin-right: 12%;
        margin-top: 7%;
        margin-bottom: 10%;
    }

    .descript {
        margin-bottom: 15%;
    }

    </style>
</head>


<header id="header" class="header-transparent" style="background:black;">
    <div class="container d-flex justify-content-between">

    <div id="logo">
        <a href="index"><img src="images/lib.png" alt="" style="height:40px; margin-left:-10px;"></a>
        
      </div>
        
	  <nav id="nav-menu-container">
        <ul class="nav-menu" style="float:right;">
          <li><a href="index">Home</a></li>
          <li><a href="news">news</a></li>
          <li><a href="Journal.php">journal</a></li>
          <li><a href="gallery">gallery</a></li>
          <li><a href="contact">contact us</a></li>
          <li class="menu-active"><a href="about_us">about us</a></li>
          <li><a href="dark_blue">Dark Blue</a></li>
          <li><a href="login">Sign In</a></li>
        </ul>
      </nav>
    </div>
  </header>





<div class="about-us" id="startchange">
    <a name="about"></a>
    <div class="container-fluid">
        <div class="row text-center">
            <div class="descript col-xs-12 col-sm-12 col-md-12">
                <h1>ABOUT GAWHARSHAD LIBRARY</h1>
                <p class="about-us-p">Gawharshad University Library was established in 2010. There are more than 14,000
                    volumes of books on various topics in Dari and English. The library is open every day except public
                    holidays from 8 am to 8 pm. Professors and students can use the resources available in this library.
                </p><br>
                <h3 style="color:purple; float:left; margin-left:17rem;">OUR GOALS</h3><br>
                <ul
                    style="list-style-type: square; float:left; margin-top:4rem; margin-left:-150px; text-align:justify; color:black;">
                    <li>Recognize the resources needed by students and purchase them</li>
                    <li>Accelerate educational and research processes by making the necessary resources and information
                        available
                    </li>
                    <li>Develop a culture of study and help increase students' knowledge
                    </li>
                    <li>Encouraging a culture of reading and reading among students
                    </li>
                    <li>Provide suitable conditions and facilities for studying and Peugeot hash.
                        .&nbsp;</li>
                </ul>
            </div>
        </div>
    </div>
</div>



<!-- hiding navbar menu when scrolling down -->

<script src="vendors/assets/js/main.js"></script>

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




<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/superfish/superfish.min.js"></script>
<script src="assets/vendor/hoverIntent/hoverIntent.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/js/main.js"></script>
<?php
include 'footer.php';
?>