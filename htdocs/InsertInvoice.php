<?php

	session_start();
	error_reporting(1);
	require('connection.php');
	extract($_REQUEST); // Variable initialization.
	
	if(!$_SESSION["IsUserLoggedIn"])
	{
		header("location:login.php");
	}   
	 if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		$uid = $_SESSION['IsUserLoggedIn'];
        
		mysqli_query($con,"INSERT INTO invoice (user_id, fullname, email, nameoncard, cc_number, exp_month, exp_year, cvv, address, city, state, zip, total) VALUES ('$uid','$fname','$email','$cname','$ccnum','$expmonth','$expyear','$cvv','$adr','$city','$state','$zip','$total')");
		//$result = mysqli_query($con,"INSERT INTO bookings (check_in_date, check_out_date, roomtype) VALUES ('$check_in_date', '$check_out_date', '$roomtype')");
	}	 
	
	$query = mysqli_query($con,"SELECT * FROM room");
	
     
	
?>