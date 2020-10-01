
<?php
require_once( "../db.php" );
session_start();
if(!isset($_SESSION['email']))
{
	header( 'location:login.php' );
}
$cmd143 = mysql_query( "SELECT * FROM admin_login  where email = '$_SESSION[email]'", $conn );
$rset143 = mysql_fetch_array( $cmd143 );
?>


		<style> 
		
		.box{
			margin-left:25px;
			box-shadow:3px 3px 3px grey;
			padding:5px;
		}
		.logo{
			border:1px solid;
			border-radius:50%;
			width:50px;
			height:50px;
		}
		.bg-dark{background-color:#343a40;color:white}
		.bg-light{background-color:#fff;color:black}
		.bg-lav{background-color:lavender}
		.bg-grey{background-color:grey}
		</style>


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
		
		<!-- jQuery Plugins -->
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/slick.min.js"></script>
		<script src="../js/nouislider.min.js"></script>
		<script src="../js/jquery.zoom.min.js"></script>
		<script src="../js/main.js"></script>
		
    </head>
	<body class="bg-lav">
	<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container text-success">
						<i class=""></i><?php echo " " . date("D, d F Y"); ?>
				</div>
			</div>
			<!-- /TOP HEADER -->
		<header id="header">
			<!-- MAIN HEADER -->
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">						
						<div class="header-ctn pull-left">
							<h1 class="h1" style="color:#fff"><i class="fa fa-book"></i> STATIONERY SHOP</h1>
						</div>
						
							<div class="header-ctn">
								<!-- dropdown -->
								
								<div class="dropdown">
										<a href="" class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" title="My account">
										<img class="logo dropdown-toggle" src="img/user.png"></img></a>
										<div class="dropdown-menu"  style="width:200px">
										<ul class="nav">
											<li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#account"><i class="fa fa-user"></i> Account</a></li>
											<li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#change_password"><i class="fa fa-key"></i> Change Password</a></li>
											<li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
										</ul>
										</div>
								</div>
								<!-- /dropdown -->
								
								<div>
									<a href="#" data-toggle="tooltip" title="Notification">
										<i class="fa fa-bell" style="font-size:30px;"></i>
										<span></span>
										<div class="qty">9</div>
									</a>
								</div>
							</div>	
							
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		
		
		<!-- Button trigger modal -->
			<!-- Modal -->
			<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="change_password" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h3 class="modal-title" id="change_password">Change Password <i class="fa fa-key"></i>
					<a class="close" data-dismiss="modal"><i class="fa fa-close"></i></a></h3>	
				  </div>
				  <div class="modal-body">
					<form name="changepassword" method="post"  >
						
						<div class="form-group">
							<label for="oldpassword">Enter Current Password</label>
							<input class="form-control" type="password" name="oldpassword" placeholder="current password" value="">
						</div>
						
						<div class="form-group">
							<label for="newpassword">Enter New Password</label>
							<input class="form-control" type="password" name="newpassword" placeholder="new password" value="">
						</div>
						<div class="form-group">
							<label for="1newpassword"> Re-enter New Password</label>
							<input class="form-control" type="password" name="1newpassword" placeholder="new password" value="">
						</div>
							
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="submit" class="btn btn-primary">Save</button>
					</form>
				  </div>
				</div>
			  </div>
			</div>
			
			<!--modal account start -->
			<div class="modal fade" id="account" role="dialog"  aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="account">Account profile <a class="close" data-dismiss="modal"><i class="fa fa-close"></i></a></h3>	
						
					</div>
					<div class="modal-body row">
						<div class="col-xs-12">
							<div class="row well">
								<div class="col-sm-6 col-md-4">
									 <img src="<?php echo "$rset143[image]"; ?>" alt="admin image" class="img-rounded img-responsive" ></img>
								</div>
								<div class="col-sm-6 col-md-8">
									<h3><?php echo "$rset143[name]"; ?></h3>
									<p>
										<i class="fa fa-envelope"></i> <?php echo "$rset143[email]"; ?>
										<br />
										<i class="fa fa-globe"></i><a href="http://www.stationeryshop.com"> www.stationeryshop.com</a>
										<br />
										<i class="fa fa-gift"></i> <?php echo date('M d Y',strtotime($rset143['dob'])); ?>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
	
<?php
if( isset( $_POST['submit'] ) )
{
	$email = $_SESSION['email'];
	$oldpassword = $_POST['oldpassword'];
	$password1 = $_POST['newpassword'];
	$password2 = $_POST['1newpassword'];

	
	if( $password1 != $password2 )
	{
		echo "<script>alert( 'password dosn't match try again' );</script>";
	
	}
	else
	{
		
		$sql = "select password from admin_login where email = '$email'";
		$cmd = mysql_query( $sql, $conn );
		$res = mysql_fetch_array( $cmd );
		if( $res['password'] == $oldpassword )
		{
			$sql = "UPDATE admin_login SET password='$password1' WHERE email='$email'";
			$cmd = mysql_query( $sql, $conn );
			if( $cmd )
			{
				echo "<script>alert( 'password changed successfully' );</script>";
			}
			else
			{
				echo "something wrong";
			}
		}
		else
		{
			echo "<script>alert( 'wrong password entered.' );</script>";
		}
	}

}
?>

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					
