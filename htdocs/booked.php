<?php

	session_start();
	error_reporting(1);
	require('connection.php');
	extract($_REQUEST); // Variable initialization.
	
	if(!$_SESSION["IsUserLoggedIn"])
	{
		header("location:login.php");
	}   
	$uid = $_SESSION['IsUserLoggedIn'];
	$query = mysqli_query($con,"SELECT * FROM bookings WHERE user_id = '$uid'");
	$rows = mysqli_num_rows($query);

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

<body style="background-color: rgb(50,50,50);color: rgb(255,255,255);font-family: 'Source Sans Pro', sans-serif;">
    <header>
        <nav class="navbar navbar-light navbar-expand-md" style="color: rgb(255,255,255);">
            <div class="container-fluid"><a class="navbar-brand" href="index.php" style="color: #ffffff;">Hotel</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-2" style="color: #ffffff;"><span class="sr-only" style="color: #ffffff;">Toggle navigation</span><span class="navbar-toggler-icon" style="color: #ffffff;"></span></button>
                <div class="collapse navbar-collapse" id="navcol-2" style="color: #ffffff;">
                    <ul class="navbar-nav" style="color: #ffffff;">
                        <li class="nav-item" style="color: #ffffff;"><a class="nav-link active" href="booking.php" style="color: #ffffff;">Room Options</a></li>
                        <li class="nav-item" style="color: #ffffff;"><a class="nav-link" href="booked.php" style="color: #ffffff;">Booked Rooms</a></li>
                    </ul>
                </div><button class="btn btn-primary" type="button"><a href="logout.php" style="text-decoration: none; color: #ffffff;">Logout</a></button>
            </div>
        </nav>
    </header>
    <div class="d-flex flex-column" style="padding: 40px;">
        <div class="table-responsive table-bordered border rounded" style="color: rgb(255,255,255);">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="color: rgb(255,255,255);">ID<br></th>
                        <th style="color: rgb(255,255,255);">Room Type</th>
                        <th style="color: rgb(255,255,255);">Check In Date</th>
                        <th style="color: rgb(255,255,255);">Check Out Date</th>
                        <th style="color: rgb(255,255,255);">Status</th>
                    </tr>
                </thead>
                <tbody style="color: rgb(255,255,255);">
					
				<?php
				if ($rows > 0) 
				{
					while($row = mysqli_fetch_assoc($query)) 
					{
						echo '<tr style="color: rgb(255,255,255);">';
						echo '<td>'.$row["id"]. '</td>';
						echo '<td>'.$row["roomtype"]. '</td>';
						echo '<td>'.$row["check_in_date"]. '</td>';
						echo '<td>'.$row["check_out_date"]. '</td>';
						echo '<td>'.$row["status"]. '</td>';
                    }    
							echo '</tr>
							</tbody>
						</table>
					</div>
				</div>';
				}
				?>
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