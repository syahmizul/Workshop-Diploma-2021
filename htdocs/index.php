<?php
	session_start();
	error_reporting(1);
	require('connection.php');
	extract($_REQUEST); // Variable initialization.
	
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>HotelProject</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/Date-Picker-From-and-To.css">
        <link rel="stylesheet" href="assets/css/Features-Blue.css">
        <link rel="stylesheet" href="assets/css/Footer-Clean.css">
        <link rel="stylesheet" href="assets/css/Footer-Dark.css">
        <link rel="stylesheet" href="assets/css/Header-Blue.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/css/lightpick.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
        <link rel="stylesheet" href="assets/css/Login-screen.css">
        <link rel="stylesheet" href="assets/css/Simple-Slider.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/Team-Boxed.css">
        <link rel="stylesheet" href="GlobalStyle.css?refreshcss=1">
    </head>
    <body style="font-family: 'Source Sans Pro', sans-serif;">
        <!-- Start: Header Blue -->
        <div style="background-image: url(&quot;assets/img/room1.jpg&quot;);background-color: #ffffff;background-repeat: space;background-size: cover;filter: blur(0px);">
            <!-- Start: Header -->
            <div class="header-blue" style="filter: blur(0px);background-color: rgba(255,255,255,0);">
                <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">HotelPlex</a>
                        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navcol-1">
                            <ul class="navbar-nav">
                                <li class="nav-item hranim">
                                    <a class="nav-link text-center" href="booking.php" style="color: var(--white);">Book now!</a>
                                </li>
                            </ul>
							<?php
							
							if ($_SESSION['IsUserLoggedIn'])
							{
								$uid = $_SESSION['IsUserLoggedIn'];
								
								$result = mysqli_query($con,"SELECT isAdmin FROM users WHERE id = '$uid'");
								
								$isAdmin = mysqli_fetch_assoc($result)["isAdmin"];
								if($isAdmin)
								{
									echo '<ul class="navbar-nav">
										<li class="nav-item hranim">
											<a class="nav-link text-center" href="adminportal.php" style="color: var(--white);">Admin Portal</a>
										</li>
									</ul>';
								}
							}
							?>
                            <span class="ml-auto navbar-text">  <?php 
						if($_SESSION["IsUserLoggedIn"]) 
							echo "<a class=\"btn btn-info border rounded shadow action-button\" role=\"button\" data-bss-hover-animate=\"swing\" href=\"logout.php\" style=\"color: rgb(255,255,255);background-color: rgba(255,255,255,0);\">Logout</a>"; 
					    else 
							echo "<a class=\"btn btn-info border rounded shadow action-button\" role=\"button\" data-bss-hover-animate=\"swing\" href=\"login.php\" style=\"color: rgb(255,255,255);background-color: rgba(255,255,255,0);\">Login</a>";  
						?>  <a class="btn btn-info border rounded shadow action-button" role="button" data-bss-hover-animate="swing" href="signup.php" style="color: rgb(255,255,255);background-color: rgba(255,255,255,0);">Sign Up</a> </span>
                        </div>
                    </div>
                </nav>
                <div class="container hero">
                    <div class="row">
                        <!-- Start: Text -->
                        <div class="col-12 col-lg-6 col-xl-5 offset-xl-1" style="width: 520px;">
                            <h1>Enjoy unforgettable experiences in dream hotels.<br></h1>
                            <p>Experience an otherworldly hotel booking experience.</p>
                            <a class="btn btn-info border rounded shadow  hranim" role="button" href="booking.php">Browse Hotels</a>
                        </div>
                        <!-- End: Text -->
                        <div class="col d-xl-flex align-items-xl-end" style="margin-top: 50px;">
                            <div class="carousel slide" data-ride="carousel" id="carousel-1">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="w-100 d-block" src="assets/img/room1.jpg" alt="Slide Image">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="w-100 d-block" src="assets/img/room1.jpg" alt="Slide Image">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="w-100 d-block" src="assets/img/room1.jpg" alt="Slide Image">
                                    </div>
									<div class="carousel-item">
                                        <img class="w-100 d-block" src="assets/img/room1.jpg" alt="Slide Image">
                                    </div>
                                </div>
                                <div>
                                    <!-- Start: Previous -->
                                    <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a>
                                    <!-- End: Previous -->
                                    <!-- Start: Next -->
                                    <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a>
                                    <!-- End: Next -->
                                </div>
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-1" data-slide-to="1"></li>
                                    <li data-target="#carousel-1" data-slide-to="2"></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End: Header -->
        </div>
        <!-- End: Header Blue -->
        <!-- Start: Features Blue -->
        <div class="features-blue">
            <div class="container">
                <!-- Start: Intro -->
                <div class="intro">
                    <h2 class="text-center">Why us?</h2>
                    <p class="text-center">Various features that makes us superior compared to others.</p>
                </div>
                <!-- End: Intro -->
                <!-- Start: Features -->
                <div class="row features">
                    <div class="col-sm-6 col-md-4 item">
                        <i class="fa fa-map-marker icon"></i>
                        <h3 class="name">Multiple hotels</h3>
                        <p class="description">Partnered with more than 1000+ hotels,multiple choices of hotels are available at your service.</p>
                    </div>
                    <div class="col-sm-6 col-md-4 item">
                        <i class="fa fa-clock-o icon"></i>
                        <h3 class="name">24/7 Customer Support</h3>
                        <p class="description">Customer support that are available around the clock to answer all your questions.</p>
                    </div>
                    <div class="col-sm-6 col-md-4 item">
                        <i class="fa fa-list-alt icon"></i>
                        <h3 class="name">User friendly interface</h3>
                        <p class="description">A user interface that won't confuse you so you can perform your bookings and transactions faster.</p>
                    </div>
                </div>
                <!-- End: Features -->
            </div>
        </div>
        <!-- End: Features Blue -->
        <!-- Start: Footer Dark -->
        <div class="footer-dark">
            <footer>
                <div class="container">
                    <div class="row">
                        <!-- Start: Services -->
                        <div class="col-sm-6 col-md-3 item">
                            <h3>Services</h3>
                            <ul>
                                <li>
                                    <a href="#">Web design</a>
                                </li>
                                <li>
                                    <a href="#">Development</a>
                                </li>
                                <li>
                                    <a href="#">Hosting</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End: Services -->
                        <!-- Start: About -->
                        <div class="col-sm-6 col-md-3 item">
                            <h3>About</h3>
                            <ul>
                                <li>
                                    <a href="#">Company</a>
                                </li>
                                <li>
                                    <a href="#">Team</a>
                                </li>
                                <li>
                                    <a href="#">Careers</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End: About -->
                        <!-- Start: Footer Text -->
                        <div class="col-md-6 item text">
                            <h3>HotelPlex</h3>
                            <p>A Hotel Booking System that thrives to bring you a premium experience.</p>
                        </div>
                        <!-- End: Footer Text -->
                        <!-- Start: Social Icons -->
                        <div class="col item social">
                            <a href="#"><i class="icon ion-social-facebook"></i></a>
                            <a href="#"><i class="icon ion-social-twitter"></i></a>
                            <a href="#"><i class="icon ion-social-snapchat"></i></a>
                            <a href="#"><i class="icon ion-social-instagram"></i></a>
                        </div>
                        <!-- End: Social Icons -->
                    </div>
                    <!-- Start: Copyright -->
                    <p class="copyright">HotelPlex © 2021</p>
                    <!-- End: Copyright -->
                </div>
            </footer>
        </div>
        <!-- End: Footer Dark -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/smart-forms.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/lightpick.min.js"></script>
        <script src="assets/js/Date-Picker-From-and-To.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
        <script src="assets/js/Simple-Slider.js"></script>
    </body>
</html>
