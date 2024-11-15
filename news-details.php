<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="vendors/assets/img/logo Gawharshad.png" type="image/png">
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
        <link rel="stylesheet" href="vendors/assets/css/styleee.css">
        <link rel="stylesheet" href="vendors/assets/css/responsive.css">
    </head>
    <body>

		   <!-- SLIDE SHOW  -->
		   <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
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
        
			<?php
				include 'connection_DB.php';
				$id = $_GET['id'];
				$q = "SELECT * FROM news WHERE id = '$id'";
				$query = mysqli_query($con,$q);
				$ResultSet = mysqli_fetch_array($query);
			
			?>
       <section class="news_area single-post-area p_100">
		   
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-8">
       					<div class="main_blog_details">
						   <?php
						 		if ($ResultSet['news_img'] =='') {
									 # code...
						   ?>
       						<img class="img-fluid" src="images/responsive.png" style=" width: 520px;height: 400px;" alt="">
							   <?php }else {
								   # code...
							   ?>
							   <img class="img-fluid" src="<?php echo "images/".$ResultSet['news_img'];?>" style=" width: 720px;height: 400px;" alt="">
							   <?php }?>
       						<a href="#"><h4><?php echo $ResultSet['name'];?></h4></a>
       						<div class="user_details">
       							<div class="float-right">
       								<div class="media">
       									<div class="media-body">
       										
       									</div>
       								</div>
       							</div>
       						</div>
       						
							<blockquote class="blockquote">
								<p class="mb-0"><?php echo $ResultSet['info'];?></p>
							</blockquote>
							
							
        
</section>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
</html>
