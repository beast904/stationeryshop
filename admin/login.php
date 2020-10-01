<!DOCTYPE html>
<?php
require_once( '../db.php' );
$msg = '';
if( isset( $_POST['submit'] ) )
{
	session_start();

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "select * from admin_login where email='$email' and password = '$password'";
	$cmd = mysql_query( $sql, $conn );
	$count = mysql_num_rows( $cmd );
	if( $count == 1 )
	{
		$_SESSION['email']=$email;
		$_SESSION['password']=$password;
		header('location:index.php');
	}
	else
	{
		echo "<script>alert('incorrect password or username');</script>";
	}
}

if(isset($_POST['forgot']))
{
	$email=$_POST['email'];
	$sql = "SELECT * FROM `admin_login` WHERE email='$email'";
	$res = mysql_query( $sql, $conn );
	$count = mysql_num_rows( $res );
	if( $count == 1 ){
		$r = mysql_fetch_assoc( $res );
		$password = $r['password'];
		$to = $r['email'];
		$subject = "Your Recovered Password";

		$message = "Please use this password to login ->  " . $password;
		$headers = "From : testmycode404@gmail.com";
		if(mail($to, $subject, $message, $headers)){
			$msg = "! Your Password has been sent to your email id";
		}else{
			$msg = "! Failed to Recover your password, try again";
		}

	}else{
		$msg = "! email does not exist in database";
	}
}
	
mysql_close($conn);
?>


<html lang="en">
<head>
	<title>ADMIN | login</title>

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="../css/slick.css"/>
	<link type="text/css" rel="stylesheet" href="../css/slick-theme.css"/>

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="../css/nouislider.min.css"/>

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="../css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="../css/style.css"/>

</head>
	<body>
	<!-- TOP HEADER -->
	<div id="top-header">
		<div class="container">
			<ul style="color:silver">
				<li><i class=""></i><?php echo " " . date("D, d F Y"); ?></li>
			</ul>
		</div>
	</div>
	<!-- /TOP HEADER -->
			
		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-9">
						<div class="header-logo">
							<h1 style="color:#fff">THE STATIONERY SHOP <i class="fa fa-book"></i></h1>
						</div>
					</div>
					<!-- /LOGO -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container ">
			<!-- row -->
		<div class="row">
		
			<div class="col-md-3">
			</div>
			<div class="col-md-6 ">
				<form name="login" method="post" action="login.php">
					<p class="h3">&nbsp Admin Login <i class="fa fa-lock"></i></p>
				  <div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="Enter email" required>
				  </div>
				  <div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
				  </div>
				  <div class="form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Check me out</label>
				  </div>
				  <button type="submit" name="submit" class="btn btn-success">LOGIN</button>
				  <button type="reset" class="btn btn-danger">Cancel</button>
				  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
					Forgot password
				  </button>
				</form>
				<br>
				<div class="collapse" id="collapseExample">
				  <div class="card card-body">
					<form method="POST" class="">
						<p class="h3">&nbsp forgot password <i class="fa fa-unlock"></i></p>
						<div class="col-md-6">
							<input type="email" class="form-control" name="email" placeholder="Email">
							
						</div>
						<button type="submit" class="btn btn-primary" name="forgot">Forgot Password</button>
					</form>
					</div>
				</div>
				
				<div class="alert alert-warning alert-dismissible show" role="alert">
				  <strong> <?php echo "$msg"; ?> </strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
			</div>
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
		<!-- /SECTION -->

		<!-- jQuery Plugins -->
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/slick.min.js"></script>
		<script src="../js/nouislider.min.js"></script>
		<script src="../js/jquery.zoom.min.js"></script>
		<script src="../js/main.js"></script>

	</body>
</html>

