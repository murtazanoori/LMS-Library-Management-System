<?php 

include 'connection_DB.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gawharshad Library</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="images/logo gawharshad.png" rel="icon">
  <link href="images/logo gawharshad.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendors/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendors/assets/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
  <link href="vendors/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendors/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="vendors/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="vendors/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="vendors/assets/css/style.css" rel="stylesheet">
  <style>
  .modal {
  text-align: center;
}

@media screen and (min-width: 768px) { 
  .modal:before {
    display: inline-block;
    vertical-align: middle;
    content: " ";
    height: 100%;
  }
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
  
  </style>
</head>

<body>

  
  <header id="header" class="header-transparent">
    <div class="container d-flex justify-content-between">

    <div id="logo">
        <a href="index"><img src="images/lib.png" alt="" style="height:40px; margin-left:-10px;"></a>
        
      </div>
        
      <nav id="nav-menu-container">
        <ul class="nav-menu" style="margin-right:-55px;">
          <li class="menu-active"><a href="index">Home</a></li>
          <li><a href="news">news</a></li>
          <li><a href="Journal.php">journal</a></li>
          <li><a href="gallery">gallery</a></li>
          <li><a href="contact">contact us</a></li>
          <li><a href="about_us">about us</a></li>
          <li><a href="dark_blue">Dark Blue</a></li>
          <li><a href="login">Sign In</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h2 style="margin-bottom: -0px;"><b>Welcome to Gawharshad Library</b></h2>
      <div class="form-outline"><br>
      <form action="search_code" method="post">
      <input type="search" autocomplete="off" name="str" required onclick="submit()" id="search" class="form-control" placeholder="Search..." aria-label="search" style="width:550px; height:40px; outline:0; border:1px; border-radius:20px;">
      <input type="hidden" name="submit" value="Search">
      </form>
      </div>
      
      <a class="" href="#myModal" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-search-plus" style="margin-left:-390px; margin-top:10px; color:gray;"> Advanced Search</i>
            </a>
    </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Advanced Search</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- inside this we write our input codes its basically out modal body -->
                            <form action="search_page" method="POST">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label" style="color:black;">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" required class="form-control" id="inputname"
                                             name="book_title" style="width:70%; margin-left:30px;" ><br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="color:black;">Translator</label>
                                    <div class="col-sm-10">
                                        <input type="text" required name="translator" class="form-control" id="inputFaculty"
                                            style="width:70%; margin-left:30px;"><br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="color:black;">Author</label>
                                    <div class="col-sm-10">
                                        <input type="text" required name="author" class="form-control" id="inputTranslator"
                                            style="width:70%; margin-left:30px;"><br>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="color:black;">Faculty</label>
                                    <div class="col-sm-10">
                                        <!-- <input type="text" name="" class="form-control" id="inputAuthor"
                                             style="width:70%; margin-left:30px;"><br> -->
                                             <?php 
                                            include('connection_DB.php');
                                            $Q = "SELECT * FROM `faculty`";
                                           $query=mysqli_query($con,$Q);
                                           $account=mysqli_num_rows($query);
                                       ?>
                                        <select required class="form-control" id="inputAuthor"
                                             style="width:70%; margin-left:30px;" name="faculty">
                                            <option selected hidden value="none">Select Faculty</option>
                                            <?php 
                                              for($i=1; $i<=$account; $i++){
                                                  $row=mysqli_fetch_array($query);
                                                  ?>
                                            <option value="<?php echo $row["faculty_id"]; ?>"><?php echo $row["faculty_name"]; ?></option>
                                            <?php
                                              }
                                              ?>
                                        </select>
                                    </div>
                                </div> 
                                
                                <button type="submit" name="search" class="btn btn-primary"
                                style="margin-left:390px; margin-top:10px; padding-right:25px; padding-left:25px;"><i class="fas fa-search"></i></button>
                            </form>


                            
                        </div>
                    </div>
                </div>
            </div>
  </section><!-- End Hero Section -->
  


  <main id="main">
  
   
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
       <strong>
© 2021 All Right Reserved GU Powered By. Dark Blue
</strong>
      </div>
      <div class="credits">
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="vendors/assets/vendor/jquery/jquery.min.js"></script>
  <script src="vendors/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendors/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="vendors/assets/vendor/php-email-form/validate.js"></script>
  <script src="vendors/assets/vendor/counterup/counterup.min.js"></script>
  <script src="vendors/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="vendors/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="vendors/assets/vendor/superfish/superfish.min.js"></script>
  <script src="vendors/assets/vendor/hoverIntent/hoverIntent.js"></script>
  <script src="vendors/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="vendors/assets/vendor/venobox/venobox.min.js"></script>
  <script src="vendors/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
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

</body>

</html>
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