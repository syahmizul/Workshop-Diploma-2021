<?php 
	session_start();
	error_reporting(1);
	require('connection.php');
	extract($_REQUEST); // Variable initialization.
	
	$id=$_GET['id'];
	$sql=mysqli_query($con,"select * from users where id='$id'");
	$res=mysqli_fetch_assoc($sql);

	extract($_REQUEST);
	if(isset($update))
	{
		mysqli_query($con,"update users set isAdmin='$isAdmin',firstname='$firstname',lastname='$lastname',username='$username',password='$password',address='$address' where id='$id' ");
		header('location:adminportaluser.php');
	}

?>
<html>
	<body>
		<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered">
			
			<tr>	
				<th>isAdmin</th>
				<td><input type="text" name="isAdmin" value="<?php echo $res['isAdmin']; ?>"  class="form-control"/>
				</td>
			</tr>
			
			<tr>	
				<th>First Name</th>
				<td><input type="text" name="firstname" value="<?php echo $res['firstname']; ?>"  class="form-control"/>
				</td>
			</tr>
			
			<tr>	
				<th>Last Name</th>
				<td><input type="text" name="lastname"  value="<?php echo $res['lastname']; ?>" class="form-control"/>
				</td>
			</tr>
			
			<tr>	
				<th>Username</th>
				<td><textarea name="username"  class="form-control"><?php echo $res['username']; ?></textarea>
				</td>
			</tr>
			
			
			<tr>	
				<th>Password</th>
				<td><input type="text" name="password"  value="<?php echo $res['password']; ?>" class="form-control"/>
				</td>
			</tr>
			
			<tr>	
				<th>Address</th>
				<td><input type="text" name="address"  value="<?php echo $res['address']; ?>" class="form-control"/>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<input type="submit" class="btn btn-primary" value="Update Room Details" name="update"/>
				</td>
			</tr>
		</table> 
		</form>
	</body>
</html>