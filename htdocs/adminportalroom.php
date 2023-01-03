<?php

	session_start();
	error_reporting(1);
	require('connection.php');
	extract($_REQUEST); // Variable initialization.
	
	$uid = $_SESSION['IsUserLoggedIn'];
	$isAdmin = mysqli_query($con,"SELECT isAdmin FROM users WHERE id = '$uid'");
	
	
	
	if(!$_SESSION["IsUserLoggedIn"])
	{
		header("location:login.php");
	}   
	

	$query = mysqli_query($con,"SELECT * FROM room");
	$rows = mysqli_num_rows($query);
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Admin Portal</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="dashboard.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">HotelPlex</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">Logout</a>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-right">
</form>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar" style="position: relative; top: 60px;">
                        <li>
                            <a href="adminportal.php">Bookings Overview</a>
                        </li>
                        <li class="active">
                            <a href="adminportalroom.php">Room Overview</a>
                        </li>
                        <li>
                            <a href="adminportaluser.php">User Overview</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h2 class="sub-header">Room Overview</h2>
                    <button type="button" class="btn btn-primary">
                        <a href="createnewroom.php" style="text-decoration:none;color:#ffffffff;">Add New Room</a>
                    </button>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Room Type</th>
                                    <th>Image URL</th>
                                    <th>Features</th>
                                    <th>Price</th>
                                    <th>Slots</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
				if ($rows > 0) 
				{
					while($row = mysqli_fetch_assoc($query)) 
					{
						$id=$row['id'];
						
						echo '<tr>';
						echo '<td>'.$row["id"]. '</td>';
						echo '<td>'.$row["name"]. '</td>';
						echo '<td>'.$row["roomtype"]. '</td>';
						echo '<td>'.$row["image_url"]. '</td>';
						echo '<td>';

						foreach ( json_decode($row["features"]) as $value )
						{
							echo $value;
						}

						echo '</td>';
						echo '<td>'.$row["price"]. '</td>';
						echo '<td>'.$row["slots"]. '</td>';
						echo'<td><button type="button" class="btn btn-primary"><a style="text-decoration: none;color:#ffffffff;" href="update_room.php?id='.$id.'">Edit</a></button></td>';
						echo'<td><button type="button" class="btn btn-primary"><a style="text-decoration: none;color:#ffffffff;" onclick="delRoom('.$id.')">Delete</a></button></td>';
                    }    
						echo '</tr>';
				}
				?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
        <script>
		function delRoom(id)
		{
			if(confirm("You want to delete this room ?"))
			{
				window.location.href='delete_room.php?id='+id;	
			}
		}				
		</script>
    </body>
</html>
