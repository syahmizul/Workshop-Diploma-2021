<?php 
require('connection.php');

$id=$_GET['id'];


if(mysqli_query($con,"delete from room where id='$id' "))
{
	header('location:adminportalroom.php');	
}

?>