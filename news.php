
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="images/logo Gawharshad.png" type="image/png">
        <title>News</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="vendors/assets/css/bootstrap.css">
        <link rel="stylesheet" href="vendors/assets/vendor/linericon/style.css">
        <link rel="stylesheet" href="vendors/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/assets/vendor/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/assets/vendor/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/assets/vendor/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/assets/vendor/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/assets/vendor/jquery-ui/jquery-ui.css">
        <!-- main css -->
		<link rel="stylesheet" href="vendors/assets/css/style.css">
        <link rel="stylesheet" href="vendors/assets/css/styleee.css">
        <link rel="stylesheet" href="vendors/assets/css/responsive.css">
    </head>
    <body>



	<!-- our header section -->

	
	<header id="header" class="header-transparent" style="background:black;">
    <div class="container d-flex justify-content-between">

    <div id="logo">
        <a href="index"><img src="images/lib.png" alt="" style="height:40px; margin-left:-10px;"></a>
        
      </div>
        
	  <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="index">Home</a></li>
          <li class="menu-active"><a href="news">news</a></li>
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

        
       	
      <!-- SLIDE SHOW  -->
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel"
        style="margin-top:90px;">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" style="width: 100%; height: 90vh;">
            <div class="carousel-item active">
                <img src="images/paper.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Cicero</h5>
                    <p>a Room Without books is like a Body Without a Soul</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/printer.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Jim Rohn</h5>
                    <p>Reading is essential for those who seek to rise above the ordinary</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/bundle.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Mark Haddon</h5>
                    <p>Reading is a conversation. All books talk. But a good book listens as well.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev" onclick="$('#carouselExampleCaptions').carousel('prev')">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next" onclick="$('#carouselExampleCaptions').carousel('next')">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
    </div>		
        <section class="choice_area p_120">
        	<div class="container">
        		<div class="main_title2">
        			<h2>News</h2>
				</div>
							
				
        		<div class="row choice_inner">
				<?php
					include 'connection_DB.php';
								
				$sql = "SELECT * FROM news";
				$query =mysqli_query($con,$sql);
				while($data = mysqli_fetch_array($query)){?>
        			<div class="col-lg-3 col-md-6">
						
        				<div class="choice_item">
							<?php
								if ($data['news_img'] =='') {
									# code...
							?>
        					<img class="img-fluid" src="images/responsive.png"  alt="">
							<?php }else {
								# code...
							?>
							<img class="img-fluid" src="<?php echo "images/".$data['news_img']; ?>" style="width: 300px; height: 176px;" alt="">
							<?php }?>
        					<div class="choice_text">
        						<div class="date">
        							<a class="gad_btn" href="news-details?id=<?php echo $data['id']; ?>">Read More</a>
        						</div>
        						<h4><?php echo $data['name']; ?></h4>
								<p><?php echo $data['dis']; ?></p>
								
							</div>
							
						</div>
						
					</div>
					<?php }?>
					<br>
        			<!--  -->
				</div>
				
			</div>
			
        </section>
       
        <script src="vendors/assets/js/jquery-3.2.1.min.js"></script>
        <script src="vendors/assets/js/popper.js"></script>
        <script src="vendors/assets/js/bootstrap.min.js"></script>
        <script src="vendors/assets/js/stellar.js"></script>
        <script src="vendors/assets/vendor/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/assets/vendor/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/assets/vendor/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/assets/vendor/isotope/isotope-min.js"></script>
        <script src="vendors/assets/vendor/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/assets/vendor/jquery-ui/jquery-ui.js"></script>
        <script src="vendors/assets/js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/assets/js/mail-script.js"></script>
        <script src="vendors/assets/js/theme.js"></script>
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