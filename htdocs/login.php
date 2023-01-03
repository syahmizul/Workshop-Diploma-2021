<?php

	session_start();
	
	error_reporting(1);
	require('connection.php');
	extract($_REQUEST); // Variable initialization.
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		if(!$_POST['username'] && !$_POST['password'])
		{
			$error = "<h6 style='color:red'>Please fill all details.</h4>";  
		}   
		else
		{
			$sql="select * from users where username='$username' and password='$password'";
			$query = mysqli_query($con,$sql);
			if(mysqli_num_rows($query))
			{
				$result = mysqli_query($con,"select * from users where username='$username' and password='$password'");
				$row = mysqli_fetch_array($result);
				$_SESSION["IsUserLoggedIn"] = $row["id"];
				
				header("location:index.php");
			}
			else
				$error = "<h6 style='color:red'>Wrong username or password.</h4>";  
			
		}
	}


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
        <link rel="stylesheet" href="assets/css/untitled-1.css">
        <link rel="stylesheet" href="assets/css/untitled.css">
    </head>
    <body style="font-family: 'Source Sans Pro', sans-serif; background-image: url('assets/img/exterior.jpg'); background-repeat: no-repeat; background-size: cover;">
        <!-- Start: Login screen -->
        <div style="z-index: 59;">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand mb-0 h1" href="index.php">HotelPlex</a>
                </div>
            </nav>
        </div>
        <div id="login-one" class="login-one">
            <form class="login-one-form" method="post" target="_self">
                <div class="col">
                    <div class="login-one-ico">
                        <i class="fa fa-unlock-alt" id="lockico"></i>
                    </div>
                    <div class="form-group">
                        <div>
                            <h3 id="heading">Log in:</h3>
                            <?php echo $error; ?>
                        </div>
                        <input class="form-control" type="text" id="input" placeholder="Username" name="username">
                        <input class="form-control" type="password" id="input" placeholder="Password" name="password">
                        <button class="btn btn-primary" id="button" style="background-color:#007ac9;" type="submit">Log in</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End: Login screen -->
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
