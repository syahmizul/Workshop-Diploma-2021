<?php
	session_start();
	error_reporting(1);
	require('connection.php');
	extract($_REQUEST); // Variable initialization.
	
	if(isset($update))
	{
		
		mysqli_query($con,"insert into room(name,roomtype,image_url,features,price,slots) values( '$name','$roomtype','$image_url','$features','$price','$slots' )");
		//header('location:adminportalroom.php');
	}

?>

<html>
	<body>
		<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered">
			
			<tr>	
				<th>Room Name</th>
				<td><input type="text" name="name" value=""  class="form-control"/>
				</td>
			</tr>
			
			<tr>	
				<th>Room Type</th>
				<td><input type="text" name="roomtype" value=""  class="form-control"/>
				</td>
			</tr>
			
			<tr>	
				<th>Image URL</th>
				<td><input type="text" name="image_url"  value="" class="form-control"/>
				</td>
			</tr>
			
			<tr>	
				<th>Features</th>
				<td><textarea name="features"  class="form-control"></textarea>
				</td>
			</tr>
			
			
			<tr>	
				<th>Price</th>
				<td><input type="text" name="price"  value="" class="form-control"/>
				</td>
			</tr>
			
			<tr>	
				<th>Slots</th>
				<td><input type="text" name="slots"  value="" class="form-control"/>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<input type="submit" class="btn btn-primary" value="Add Room Details" name="update"/>
				</td>
			</tr>
		</table> 
		</form>
	</body>
</html>