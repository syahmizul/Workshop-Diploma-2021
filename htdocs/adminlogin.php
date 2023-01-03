<?php 
session_start();
error_reporting(1);
require('connection.php');
extract($_REQUEST); // Variable initialization.

if($_SESSION['admin_logged_in'] != "")
{
	header('location:admin/index.php');
}

if(isset($login))
{
  if($email=="" || $pass=="")
  {
  $error= "<h4 style='color:red'>Fill all details</h4>";  
  }   
  else
  {
  $sql=mysqli_query($con,"select * from admin where username='$email' && password='$pass' ");
    if(mysqli_num_rows($sql))
    {
    $_SESSION['admin_logged_in']=$email;  		
	header('location:admin/index.php');
    }
    else
    {
    $error= "<h4 style='color:red'>Invalid login details</h4>"; 
    } 
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>UTeM Resort</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
      <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
         <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/logo.png" style="max-height:100px;"></a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#responsive">
            <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="responsive">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                     <a class="nav-link hranim" href="index.php">Home</a>
                     <span>
                        <hr>
                     </span>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link hranim" href="index.php#suites">Suites</a>
                     <span>
                        <hr>
                     </span>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link hranim" href="index.php#facilities">Facilities</a>
                     <span>
                        <hr>
                     </span>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link hranim" href="login.php">Customer Portal</a>
                     <span>
                        <hr class="hranim">
                     </span>
                  </li>
				  <li class="nav-item">
                     <a class="nav-link hranim" href="adminlogin.php">Admin Portal</a>
                     <span>
                        <hr class="hranim">
                     </span>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
<div class="container-fluid w3-animate-zoom bg-light" style="color:black;">
  <div class="container">
    <div class="row"><br>
      <div class="col-lg-12"></div>
        <div class="col-lg-12 text-center rounded"style="box-shadow: 0px 0px 11px 6px rgba(0,0,0,0.3);"><br>
        	<h1 class="display-4">Admin Login</h1>
          <?php echo @$error; ?>
          <form method="post"><br>
              <div class="form-group">
                <input type="Email" class="form-control"name="email"placeholder="Email" autocomplete="on"required >
              </div>
            <div class="form-group">
                <input type="Password" class="form-control"name="pass"placeholder="Password" autocomplete="on"required>
            </div>
          <input type="submit" value="Login" name="login" class="btn btn-primary btn-group btn-group-justified"required>
      	</form><br>
        </div>
    </div><br>
  </div>
</div>

</body>
</html>

