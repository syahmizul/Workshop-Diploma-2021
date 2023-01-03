<?php 
	session_start();
	error_reporting(1);
	require('connection.php');
	extract($_REQUEST); // Variable initialization.
	
	$id=$_GET['id'];
	$sql=mysqli_query($con,"select * from room where id='$id'");
	$res=mysqli_fetch_assoc($sql);

	extract($_REQUEST);
	if(isset($update))
	{
		mysqli_query($con,"update room set name='$name',roomtype='$roomtype',image_url='$image_url',features='$features',price='$price',slots='$slots' where id='$id' ");
		header('location:adminportalroom.php');
	}

?>
<html>
	<body>
		<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered">
			
			<tr>	
				<th>Room Name</th>
				<td><input type="text" name="name" value="<?php echo $res['name']; ?>"  class="form-control"/>
				</td>
			</tr>
			
			<tr>	
				<th>Room Type</th>
				<td><input type="text" name="roomtype" value="<?php echo $res['roomtype']; ?>"  class="form-control"/>
				</td>
			</tr>
			
			<tr>	
				<th>Image URL</th>
				<td><input type="text" name="image_url"  value="<?php echo $res['image_url']; ?>" class="form-control"/>
				</td>
			</tr>
			
			<tr>	
				<th>Features</th>
				<td><textarea name="features"  class="form-control"><?php echo $res['features']; ?></textarea>
				</td>
			</tr>
			
			
			<tr>	
				<th>Price</th>
				<td><input type="text" name="price"  value="<?php echo $res['price']; ?>" class="form-control"/>
				</td>
			</tr>
			
			<tr>	
				<th>Slots</th>
				<td><input type="text" name="slots"  value="<?php echo $res['slots']; ?>" class="form-control"/>
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