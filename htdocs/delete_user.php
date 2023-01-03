<?php 
require('connection.php');

$id=$_GET['id'];


if(mysqli_query($con,"delete from users where id='$id' "))
{
	header('location:adminportaluser.php');	
}

?>