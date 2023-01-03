<?php
	session_start();
	error_reporting(1);
	require('connection.php');
	extract($_REQUEST); 
	$uid = $_SESSION['IsUserLoggedIn'];
	$RoomArray = array();
	$query = mysqli_query($con,"SELECT * FROM room ");
	
	while ($row = mysqli_fetch_object($query))
	{
		array_push($RoomArray,$row);
	}
	
	
	echo json_encode($RoomArray);
	
	
?>
