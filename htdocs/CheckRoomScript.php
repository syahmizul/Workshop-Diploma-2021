<?php
	session_start();
	error_reporting(1);
	require('connection.php');
	extract($_REQUEST); 
	$uid = $_SESSION['IsUserLoggedIn'];
	
	
	
	$query = mysqli_query($con,"SELECT check_in_date,check_out_date,quantity FROM bookings WHERE user_id = '$uid' AND roomtype ='$roomType' ");
	$quantity = 0;
	while($row = mysqli_fetch_assoc($query))
	{

		if(  (strtotime($startDate) >= strtotime($row["check_in_date"])) && (strtotime($endDate) <= strtotime($row["check_out_date"]) ) )
		{
			$quantity = $quantity + $row["quantity"];
		}
		
	}
	
	
	
	$slotlimit = mysqli_fetch_assoc(mysqli_query($con,"SELECT slots FROM room WHERE roomtype = '$roomType'"))["slots"];
	
	 if ($quantity <= $slotlimit)
		echo 0;
	else
		echo 1; 


	
?>