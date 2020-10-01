<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>STATIONERY SHOP</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<link type="text/css" rel="stylesheet" href="css/custom.css"/>
		<link type="text/css" rel="stylesheet" href="css/nav.css"/>

		<script src="https://kit.fontawesome.com/6e49948015.js" crossorigin="anonymous"></script>
		
		

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		
    </head>
	<body bgcolor="lavender">
	<a id="#top"></a>
	
<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<font style="font-style:normal; font-size: 30px;color: #fff;font-family: serif">
									<b>STATIONERY SHOP</b>
                                    </font>
								</a>
							</div>
						</div>
						<!-- /LOGO -->
	
	
						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form method="post" action="store1.php">
									<select name="scat" class="input-select">
										<option value="0">All Categories</option>
										<option value="1">School</option>
										<option value="1">College</option>
										<option value="1">Office</option>
										<option value="1">Art&Craft</option>
										<option value="1">...</option>
									</select>
									<input name="stxt" class="input" placeholder="Search here" required>
									<input name="sbtn" type="submit" value="search" class="search-btn">
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								
								
								<!-- Login-->
								
							<?php
								session_start();
								include "db.php";
								if(isset($_SESSION["uid"]))
								{
									$sql = "SELECT fname FROM user_master WHERE UID='$_SESSION[uid]'";
									$query = mysql_query($sql,$conn );
									$row = mysql_fetch_array($query);                               
									
									echo '
								   <div class="dropdownn">
									  <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user-o"></i> HI '.$row['fname'].'</a>
									  <div class="dropdownn-content">
										<a style="color:#fff" href="profile.php"><i class="fa fa-user-circle" aria-hidden="true" ></i>  My Profile</a>
										<a style="color:#fff" href="wishlist.php"  ><i class="fa fa-heart" aria-hidden="true" ></i> Wishlist</a>
										<a style="color:#fff" href="yourorder.php"  ><i class="fa fa-first-order" aria-hidden="true" ></i> My Orders</a>
										<a style="color:#fff" href="logout.php"  ><i class="fa fa-sign-in" aria-hidden="true"></i>  Log out</a>
									  </div>
									</div>';

								}
								else
								{
									echo '		
									<div class="dropdownn">
										
										<a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" ><i class="fa fa-user"></i> My Account</a>
										<ul class="dropdownn-content nav" >
											<li><a style="color:#D10024" href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-sign-in" aria-hidden="true" ></i> Login</a>
											</li><li><a style="color:#D10024" href="" data-toggle="modal" data-target="#Modal_register"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>						
										</li></ul>	
										
									</div>
									';
								}
							?>
						<?php
								$nitem=0;
								if(isset($_SESSION['uid']))
								{	
								$sql="select * from cart_master where UID='$_SESSION[uid]'";
								$res=mysql_query($sql,$conn);
								$rset=mysql_fetch_array($res);
								$ctid=$rset['CTID'];
								
								$sql="select count(*) from cart_details where CTID='$ctid'";
								$res1=mysql_query($sql,$conn);
								$rset1=mysql_fetch_array($res1);
								$nitem=$rset1[0];
								}
								
								?>
				<!-- Login-->
						<div class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="">
								<i class="fa fa-shopping-cart"></i>
								<span>Your Cart</span>
								<div class="qty"><?php echo $nitem; ?></div>
							</a>
							<div class="cart-dropdown">
								<div class="cart-list">
					
								<?php 
								//to fetch product_id
								if( isset( $_SESSION['uid'] ) )
								{
								$uid = $_SESSION['uid'];
								
								$sql = "select * from cart_master where UID='$uid'";
								$res = mysql_query( $sql,$conn ) or die( mysql_error( ) );
								$res1 = mysql_fetch_array( $res );
								$total_cost = $res1['total_cost'];
								$ctid = $res1['CTID'];

								$sql = "select * from cart_details where CTID='$ctid'";
								$res = mysql_query( $sql,$conn ) or die( mysql_error( ) );
								while( $res1 = mysql_fetch_array( $res ) )
								{
									$sql1 = "select * from products where PID=".$res1['PID']."";
										$cmd1 = mysql_query($sql1,$conn)  or die( mysql_error( ) );
										$rset1 = mysql_fetch_array( $cmd1 );

									//echo $rset1['pname'];
									

								?>
											<div class="product-widget">
												<div class="product-img">
													<img src="<?php echo $rset1['pimage']; ?>" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#"><?php echo $rset1['pname']; ?></a></h3>
													<h4 class="product-price"><span class="qty"><?php echo $res1['quantity']; ?>x</span><?php echo $rset1['pprice']; ?></h4>
												</div>
												<a href="delete.php?pid=<?php echo $rset1['PID']; ?> & ctid=<?php echo $ctid; ?>"><button class="delete" ><i class="fa fa-close "></i></button></a>
										
											</div>
								<?php
										}
					
										?>
											
										</div>
										
										<div class="cart-summary">
											<!--<small>3 Item(s) selected</small>-->
											<h5>SUBTOTAL:<?php echo $total_cost; ?></h5>
										</div>
										<div class="cart-btns">
											<a href="cart.php" target="_blank">View Cart</a>
											<a href="checkout.php" target="_blank">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
										
									</div>  
									
								</div>
								
								<!-- /Cart -->
						<?php
											}
									else
									{
										echo "please login to view your cart";
									}
						?>
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

	
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php"><b>Home</b></a></li>
						<li><a href="#categories" data-toggle="collapse" role="button" >Categories <i class="fa fa-angle-down"></i></a></li>
						<li><a href="store1.php">today's deal</a></li>
						<li><a href="contact_us.php">contact us</a></li>
						<li><a href="#footer">About us</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				
				<!-- /responsive-nav -->
				<div class="collapse" id="categories" >
					<div class="card card-body col-md-9"> 
						<ul class="nav navbar-nav">
							<?php
							
									$cmd1 = mysql_query( "select * from categories", $conn );
									while( $rset1 = mysql_fetch_array( $cmd1 ) )
									{
										echo "<li><a href='shop.php?n=$rset1[1]'>$rset1[1]</a></li>";
									}	
							?>
						</ul>
					</div>
				</div>
				<!-- /responsive-nav -->				
				
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->		
		
					<div class="modal fade" id="Modal_login" role="dialog">
                        <div class="modal-dialog">
													
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              
                            </div>
                            <div class="modal-body">
                            <?php
                                include "login_form.php";
    
                            ?>
          
                            </div>
                          </div>
													
                        </div>
                    </div>

					<div class="modal fade" id="Modal_register" role="dialog">
                        <div class="modal-dialog" style="">

                          <!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  
								</div>
								<div class="modal-body">
								
								<?php
									include "register_form.php";
		
								?>
			  
								</div>
							</div>

                        </div>
                      </div>
					  

		
		
		
					
								