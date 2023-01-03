<?php
	session_start();
	error_reporting(1);
	require('connection.php');
	extract($_REQUEST); 
	$uid = $_SESSION['IsUserLoggedIn'];

	$Object = json_decode($Object);

	$query = mysqli_query($con,"SELECT check_in_date,check_out_date,quantity,user_id FROM bookings WHERE roomtype ='$Object->roomtype' AND user_id = '$uid'");
	$quantity = 0;
	while($row = mysqli_fetch_assoc($query))
	{
		if(  (strtotime($Object->startDate) >= strtotime($row["check_in_date"])) && (strtotime($Object->endDate) <= strtotime($row["check_out_date"]) ) )
		{
			$quantity = $quantity + $row["quantity"];
		}
	}
		

	$slotlimit = mysqli_fetch_assoc(mysqli_query($con,"SELECT slots FROM room WHERE roomtype = '$Object->roomtype'"))["slots"];

	if ($quantity <= $slotlimit)
		echo 0;
	else
		echo 1;


	
?>