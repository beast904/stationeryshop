//this is index page
//it automatically runs when the folder is started
//it also verifies email
//with an otp sent to users email
//user must verify before login
<!DOCTYPE html>
<?php 
include "header.php"; 

if(isset($_GET['vk']))
{
	$vkey = $_GET['vk'];
	$vkey1 = $_COOKIE['vkey'];
	$email = $_COOKIE['email'];
	echo "$vkey $vkey1 $email";
	if($vkey == $vkey1)
	{
		$q1 = "update user_login set vemail=1 where email='$email'";
		$update=mysql_query($q1) or die(mysql_error());
		
		if($update)
		{
			echo "<script>alert( 'your account has been verified. you may login' ); window.location.href='index.php';</script>";
		}
		else
		{
			echo "<script>alert( 'this account is invalid or already exist' ); </script>";
		}	
	}
	else
	{
		echo "something went wrong";
	}
}

?>
								
	
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Writing Instruments<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Paper & Books<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Files & Folder<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">New Products</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li class="active"><a href="index.php">all</a></li>
								<li><a href="index.php?n=school">school</a></li>
								<li><a href="index.php?n=college">college</a></li>
								<li><a href="index.php?n=office">office</a></li>
								<li><a href="index.php?n=pen">others</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<div id="tab1" class="tab-pane active" role='tab' >
								<div class="products-slick" data-nav="#slick-nav-1">
									<!-- product -->
												
										<?php
										if(isset($_GET['n']))
										{
											$qq="where ptag like '%$_GET[n]%'";
										}
										else
										{
												$qq='';
										}
										$query="select * from products ".$qq;
										$res=mysql_query($query,$conn);		
										if(mysql_num_rows($res) > 0)
										{

											while($row = mysql_fetch_array($res))
											{	
												$pid    = $row['PID'];
												$pname   = $row['pname'];
												$pdesc = $row['pdesc'];
												$brand = $row['brand'];
												$price = $row['pprice'];
												$pimg = $row['pimage'];
												$tag = $row['ptag'];
												$discount= $row['pdiscount'];
												$date=$row['date'];

											?>
												
												
													<div class="product" >
														<a href="product.php?pid=<?php echo $pid;?>"> <div class="product-img">
															<img src="<?php echo $pimg; ?>" alt="" >
															<div class="product-label">
																<span class="sale">-<?php echo $discount; ?>%</span>
																<span class="new">NEW</span>
															</div>
														</div> </a>
														<div class="product-body">
															<p class="product-category"><?php echo $brand; ?></p>
															<h3 class="product-name"><a href="product.php?pid=<?php echo $pid;?>"><?php echo substr($pname,0,25); ?>..</a></h3>
															<h4 class="product-price">$<?php echo $price; ?> <del class="product-old-price"> $990.00</del></h4>
															<div class="product-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
															<div class="product-btns">
																<button class="add-to-wishlist">
																	<a href="insertwishlist.php?pid=<?php echo $pid; ?>"><i class="fa fa-heart-o"></i></a>
																	<span class="tooltipp">add to wishlist</span>
																</button>
																<button class="add-to-wishlist">
																	<a class="add-to-wishlist" target="_blank" href="insertcart.php?pid=<?php echo $pid; ?>" >
																		<i class="fa fa-shopping-cart"></i><span class="tooltipp">add to cart</span>
																	</a>
																</button>
															</div>
														</div>
									
													</div>
												
										<?php
												}
											}
										?>	
									
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
								
					
							</div>
						</div>
					</div>
				</div>
				<!-- Products tab & slick -->
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top selling</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										
								<?php
								$query="select * from products ";
								$res=mysql_query($query,$conn);
												
								if(mysql_num_rows($res) > 0)
								{
									while($row = mysql_fetch_array($res))
									{	
										$pid    = $row['PID'];
										$pname   = $row['pname'];
										$pdesc = $row['pdesc'];
										$price = $row['pprice'];
										$pimg = $row['pimage'];
										$tag = $row['ptag'];
										$discount= $row['pdiscount'];
										$date=$row['date'];
									?>
										
										
										<div class="col-md-3 col-xs-6">
											<div class="product" >
														<a href="product.php?pid=<?php echo $pid;?>"> <div class="product-img">
															<img src="<?php echo $pimg; ?>" alt="" >
															<div class="product-label">
																<span class="sale">-<?php echo $discount; ?>%</span>
																<span class="new">NEW</span>
															</div>
														</div> </a>
														<div class="product-body">
															<p class="product-category">Category</p>
															<h3 class="product-name"><a href="product.php?pid=<?php echo $pid;?>"><?php echo substr($pname,0,25); ?>..</a></h3>
															<h4 class="product-price"><?php echo $price; ?><del class="product-old-price">$990.00</del></h4>
															<div class="product-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
															<div class="product-btns">
																<button class="add-to-wishlist">
																	<a href="insertwishlist.php?pid=<?php echo $pid; ?>"><i class="fa fa-heart-o"></i></a>
																	<span class="tooltipp">add to wishlist</span>
																</button>
																<button class="add-to-wishlist">
																	<a class="add-to-wishlist" target="_blank" href="insertcart.php?pid=<?php echo $pid; ?>" >
																		<i class="fa fa-shopping-cart"></i><span class="tooltipp">add to cart</span>
																	</a>
																</button>
															</div>
														</div>
									
													</div>
											</div>
											
									<?php
									}
								}
							?>			
																
										<!-- /product -->
									<div id="slick-nav-3" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										
								<?php
								$query="select * from products ";
								$res=mysql_query($query,$conn);
												
								if(mysql_num_rows($res) > 0)
								{
									while($row = mysql_fetch_array($res))
									{	
										$pid    = $row['PID'];
										$pname   = $row['pname'];
										$pdesc = $row['pdesc'];
										$price = $row['pprice'];
										$pimg = $row['pimage'];
										$tag = $row['ptag'];
										$discount= $row['pdiscount'];
										$date=$row['date'];
									?>
										
										
										<div class="col-md-3 col-xs-6">
											<div class="product" >
														<a href="product.php?pid=<?php echo $pid;?>"> <div class="product-img">
															<img src="<?php echo $pimg; ?>" alt="" >
															<div class="product-label">
																<span class="sale">-<?php echo $discount; ?>%</span>
																<span class="new">NEW</span>
															</div>
														</div> </a>
														<div class="product-body">
															<p class="product-category">Category</p>
															<h3 class="product-name"><a href="product.php?pid=<?php echo $pid;?>"><?php echo substr($pname,0,25); ?>..</a></h3>
															<h4 class="product-price"><?php echo $price; ?><del class="product-old-price">$990.00</del></h4>
															<div class="product-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
															</div>
															<div class="product-btns">
																<button class="add-to-wishlist">
																	<a href="insertwishlist.php?pid=<?php echo $pid; ?>"><i class="fa fa-heart-o"></i></a>
																	<span class="tooltipp">add to wishlist</span>
																</button>
																<button class="add-to-wishlist">
																	<a class="add-to-wishlist" target="_blank" href="insertcart.php?pid=<?php echo $pid; ?>" >
																		<i class="fa fa-shopping-cart"></i><span class="tooltipp">add to cart</span>
																	</a>
																</button>
															</div>
														</div>
									
													</div>
											</div>
											
									<?php
									}
								}
							?>			
																
										<!-- /product -->
									<div id="slick-nav-3" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-3">
							
							<?php
								$query="select * from products ORDER BY pdiscount";
								$res=mysql_query($query,$conn);	
								while($row = mysql_fetch_array($res))
								{	
							?>
							<div>
								<!-- product widget -->
								<div class="product-widget">
								<a href="product.php?pid=<?php echo $row['PID'];?>">
									<div class="product-img">
										<img src="<?php echo $row['pimage'];?>" alt="">
									</div>
								</a>
									<div class="product-body">
										<p class="product-category"><?php echo $row['pdiscount']; ?>% OFF</p>
										<h3 class="product-name"><a href="product.php?pid=<?php echo $row['PID'];?>"><?php echo $row['pname']; ?></a></h3>
										<h4 class="product-price">$<?php echo $row['pprice']; ?><del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
							</div>
								<?php } ?>
						</div>
					</div>
					<div class="clearfix visible-sm visible-xs"></div>
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<?php
								$query="select * from products order by ptag ";
								$res=mysql_query($query,$conn);	
								while($row = mysql_fetch_array($res))
								{	
							?>
							<div>
								<!-- product widget -->
									<div class="product-widget">
								<a href="product.php?pid=<?php echo $row['PID'];?>">
									<div class="product-img">
										<img src="<?php echo $row['pimage'];?>" alt="">
									</div>
								</a>
									<div class="product-body">
										<p class="product-category"><?php echo $row['pdiscount']; ?>% OFF</p>
										<h3 class="product-name"><a href="product.php?pid=<?php echo $row['PID'];?>"><?php echo $row['pname']; ?></a></h3>
										<h4 class="product-price">$<?php echo $row['pprice']; ?><del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
							</div>
								<?php
								}
								?>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<?php
								$query="select * from products ORDER BY pprice";
								$res=mysql_query($query,$conn);	
								while($row = mysql_fetch_array($res))
								{	
							?>
							<div>
								<!-- product widget -->
						<div class="product-widget">
								<a href="product.php?pid=<?php echo $row['PID'];?>">
									<div class="product-img">
										<img src="<?php echo $row['pimage'];?>" alt="">
									</div>
								</a>
									<div class="product-body">
										<p class="product-category"><?php echo $row['pdiscount']; ?>% OFF</p>
										<h3 class="product-name"><a href="product.php?pid=<?php echo $row['PID'];?>"><?php echo $row['pname']; ?></a></h3>
										<h4 class="product-price">$<?php echo $row['pprice']; ?><del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
							</div>
								<?php
								}
								?>
						</div>
					</div>

				</div>
				
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="products-widget-slick" data-nav="">
							
							<?php
								$query="select * from products ORDER BY pdiscount desc";
								$res=mysql_query($query,$conn);	
								while($row = mysql_fetch_array($res))
								{	
							?>
							<div>
								<!-- product widget -->
									<div class="product-widget">
								<a href="product.php?pid=<?php echo $row['PID'];?>">
									<div class="product-img">
										<img src="<?php echo $row['pimage'];?>" alt="">
									</div>
								</a>
									<div class="product-body">
										<p class="product-category"><?php echo $row['pdiscount']; ?>% OFF</p>
										<h3 class="product-name"><a href="product.php?pid=<?php echo $row['PID'];?>"><?php echo $row['pname']; ?></a></h3>
										<h4 class="product-price">$<?php echo $row['pprice']; ?><del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
							</div>
								<?php } ?>
						</div>
					</div>
				<div class="clearfix visible-sm visible-xs"></div>
					<div class="col-md-4 col-xs-6">

						<div class="products-widget-slick" data-nav="">
							<?php
								$query="select * from products ";
								$res=mysql_query($query,$conn);	
								while($row = mysql_fetch_array($res))
								{	
							?>
							<div>
								<!-- product widget -->
									<div class="product-widget">
								<a href="product.php?pid=<?php echo $row['PID'];?>">
									<div class="product-img">
										<img src="<?php echo $row['pimage'];?>" alt="">
									</div>
								</a>
									<div class="product-body">
										<p class="product-category"><?php echo $row['pdiscount']; ?>% OFF</p>
										<h3 class="product-name"><a href="product.php?pid=<?php echo $row['PID'];?>"><?php echo $row['pname']; ?></a></h3>
										<h4 class="product-price">$<?php echo $row['pprice']; ?><del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
							</div>
								<?php
								}
								?>
						</div>
					</div>
					<div class="clearfix visible-sm visible-xs"></div>
					<div class="col-md-4 col-xs-6">

						<div class="products-widget-slick" data-nav="">
							<?php
								$query="select * from products ORDER BY PID desc ";
								$res=mysql_query($query,$conn);	
								while($row = mysql_fetch_array($res))
								{	
							?>
							<div>
								<!-- product widget -->
								<div class="product-widget">
								<a href="product.php?pid=<?php echo $row['PID'];?>">
									<div class="product-img">
										<img src="<?php echo $row['pimage'];?>" alt="">
									</div>
								</a>
									<div class="product-body">
										<p class="product-category"><?php echo $row['pdiscount']; ?>% OFF</p>
										<h3 class="product-name"><a href="product.php?pid=<?php echo $row['PID'];?>"><?php echo $row['pname']; ?></a></h3>
										<h4 class="product-price">$<?php echo $row['pprice']; ?><del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
							</div>
								<?php
								}
								?>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="products-widget-slick" data-nav="">
							
							<?php
								$query="select * from products order by pname desc";
								$res=mysql_query($query,$conn);	
								while($row = mysql_fetch_array($res))
								{	
							?>
							<div>
								<!-- product widget -->
								<div class="product-widget">
								<a href="product.php?pid=<?php echo $row['PID'];?>">
									<div class="product-img">
										<img src="<?php echo $row['pimage'];?>" alt="">
									</div>
								</a>
									<div class="product-body">
										<p class="product-category"><?php echo $row['pdiscount']; ?>% OFF</p>
										<h3 class="product-name"><a href="product.php?pid=<?php echo $row['PID'];?>"><?php echo $row['pname']; ?></a></h3>
										<h4 class="product-price">$<?php echo $row['pprice']; ?><del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
							</div>
								<?php } ?>
						</div>
					</div>
				<div class="clearfix visible-sm visible-xs"></div>
					<div class="col-md-4 col-xs-6">

						<div class="products-widget-slick" data-nav="">
							<?php
								$query="select * from products order by CID";
								$res=mysql_query($query,$conn);	
								while($row = mysql_fetch_array($res))
								{	
							?>
							<div>
								<!-- product widget -->
								<div class="product-widget">
								<a href="product.php?pid=<?php echo $row['PID'];?>">
									<div class="product-img">
										<img src="<?php echo $row['pimage'];?>" alt="">
									</div>
								</a>
									<div class="product-body">
										<p class="product-category"><?php echo $row['pdiscount']; ?>% OFF</p>
										<h3 class="product-name"><a href="product.php?pid=<?php echo $row['PID'];?>"><?php echo $row['pname']; ?></a></h3>
										<h4 class="product-price">$<?php echo $row['pprice']; ?><del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
							</div>
								<?php
								}
								?>
						</div>
					</div>
					<div class="clearfix visible-sm visible-xs"></div>
					<div class="col-md-4 col-xs-6">

						<div class="products-widget-slick" data-nav="">
							<?php
								$query="select * from products ORDER BY date desc ";
								$res=mysql_query($query,$conn);	
								while($row = mysql_fetch_array($res))
								{	
							?>
							<div>
								<!-- product widget -->
								<div class="product-widget">
								<a href="product.php?pid=<?php echo $row['PID'];?>">
									<div class="product-img">
										<img src="<?php echo $row['pimage'];?>" alt="">
									</div>
								</a>
									<div class="product-body">
										<p class="product-category"><?php echo $row['pdiscount']; ?>% OFF</p>
										<h3 class="product-name"><a href="product.php?pid=<?php echo $row['PID'];?>"><?php echo $row['pname']; ?></a></h3>
										<h4 class="product-price">$<?php echo $row['pprice']; ?><del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
							</div>
								<?php
								}
								?>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
	
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<div class="row">
			<div class="section-title">
				<h4 class="title">Top brands </h4>
			</div>
				<div class="products-tabs">
				
					<div id="tab1" class="tab-pane active" role='tab' >
						<div class="products-slick" data-nav="#slick-nav-1">					
								<?php
									$query="select * from brands";
									$res=mysql_query($query,$conn);		
									if(mysql_num_rows($res) > 0)
									{

									while($row = mysql_fetch_array($res))
									{
									?>
									<div class="product">
										 <div class="product-img">
											<img src="img/brands/<?php echo $row['image']; ?>" alt="" >
										</div>
									</div>
								<?php
										}
									}
								?>	
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- Products tab & slick -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->



		<!-- NEWSLETTER -->
		<?php include "newsletter.php"; ?>
		<!-- /NEWSLETTER -->


	<?php include "footer.php"; ?>
	

	</body>
</html>
