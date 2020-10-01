<!DOCTYPE html>
<?php
include "header.php";
//$pid=$_GET['pid'];
if(!isset($_GET['pid']))
{
	echo "<h3 class='section'>!something wrong <a href='index.php'><- go to home</a></h3>";
}
else
{
	$pid=$_GET['pid'];
	$sql="select * from products where PID='$pid'";
	$res=mysql_query($sql,$conn);
	$res1=mysql_fetch_array($res);

?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li class="active"><?php echo $res1['pname']; ?></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="<?php echo $res1['pimage']; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?php echo $res1['pimage']; ?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="<?php echo $res1['pimage']; ?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?php echo $res1['pimage']; ?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?php echo $res1['pname']; ?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#">10 Review(s) | Add your review</a>
							</div>
							<div>
								<h3 class="product-price"><?php echo $res1['pprice']; ?><del class="product-old-price">$990.00</del></h3>
								<span class="product-available">In Stock</span>
							</div>
							<p><?php echo $res1['pdesc']; ?></p>
							<form method="POST" action="product.php">
								<input type="hidden" name='pid' value="<?php echo $pid; ?>"></input>
								<div class="add-to-cart">
									<div class="qty-label">
										Qty &nbsp;
										<div class="input-number">
											<input type="number" name="qty" value='1'>
											<span class="qty-up">+</span>
											<span class="qty-down">-</span>
										</div>
										
									</div>
									<br><br>
									<button type="submit" name="submit" class="btn-danger btn" ><i class="fa fa-shopping-cart"></i> &nbsp add to cart &nbsp;</button>
								</div>
							</form>
			
						
							<a class="btn btn-primary" href="insertwishlist.php?pid=<?php echo $pid; ?>" target="_blank"><i class="fa fa-heart-o"></i> <span class="tooltipp">add to wishlist</span></a>
							
					
							<!--<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">Headphones</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>-->

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
								<li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?php echo $res1['pdesc']; ?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
								
										<div class="col-md-12">
											<table class="table table-bordered" align="center">
											<p><?php echo $res1['pdesc']; ?></p>
											<tr>
												<td>product name</td>
												<td><?php echo $res1['pname']; ?></td>											
											</tr>											
											<tr>
												<td>product price</td>
												<td><?php echo $res1['pprice']; ?></td>
											
											</tr>
											<tr>
												<td>product brand</td>
												<td><?php echo $res1['brand']; ?></td>
											</tr>
											<tr>
												<td>product discount</td>
												<td><?php echo $res1['pdiscount']; ?></td>
											</tr>
											<tr>
												<td>product tags</td>
												<td><?php echo $res1['ptag']; ?></td>
											</tr>
											</table>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span>4.5</span>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 60%;"></div>
														</div>
														<span class="sum">2</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
												<?php
													$cmdd = mysql_query( "select * from review where PID = $pid limit 3", $conn );
													while( $rsett = mysql_fetch_array( $cmdd ) )
													{
												?>
												
													<li>
														<div class="review-heading">
															<h5 class="name"><?php echo "$rsett[name]"; ?></h5>
															<p class="date"><?php echo "$rsett[date]"; ?></p>
															<div class="review-rating">
															<?php
															$r=$rsett['rating'];
															for( $i=0; $i<5; $i++ ) 
															{
																	if($i<$r)
																	echo "<i class='fa fa-star'></i>";
																	else
																	echo "<i class='fa fa-star-o empty'></i>";
															}		
															?>
															</div>
														</div>
														<div class="review-body">
															<p><?php echo "$rsett[review]"; ?></p>
														</div>
													</li>
												<?php } ?>
												</ul>
												<ul class="reviews-pagination">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
												</ul>
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form" method="post">
													<input type="hidden" name='pid' value="<?php echo $pid; ?>" required></input>
													<input class="input" type="text" name="name" placeholder="Your Name" required>
													<input class="input" type="email" name="email" placeholder="Your Email" required>
													<textarea class="input" name="review" placeholder="Your Review" required></textarea>
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button type="submit" class="primary-btn" name="review_submit">Submit</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>
					<?php
					$t=$res1['ptag'];
					$cmd3 = mysql_query( "select * from products where ptag like '%$t%'", $conn );
					while( $rset3 = mysql_fetch_array( $cmd3 ) )
					{
					?>

					<!-- product -->
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="<?php echo $rset3['pimage']; ?>" alt="">
								<div class="product-label">
									<span class="sale"><?php echo $rset3['pdiscount']; ?>%</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">Category</p>
								<h3 class="product-name"><a href="#"><?php echo $rset3['pname']; ?></a></h3>
								<h4 class="product-price">$<?php echo $rset3['pprice']; ?><del class="product-old-price">$990.00</del></h4>
								<div class="product-rating">
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
					<!-- /product -->
					<?php } ?>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->


	<?php
}
	include "newsletter.php";
	include "footer.php";
	?>

	</body>
</html>

<?php

if(isset($_POST['submit']))
{	if(isset($_SESSION['uid']))
	{
			$qty=$_POST['qty'];	
			$pid = $_POST['pid'];
			$sql = "select CTID from cart_master where UID = '$_SESSION[uid]'";
			$cmd = mysql_query( $sql, $conn);
			$rset = mysql_fetch_array( $cmd );
			$count = mysql_num_rows( $cmd );
			if( $count == 1 )
			{
			
				$sql="select * from cart_details where PID='$pid' and CTID='$rset[0]' ";
				$cmd=mysql_query($sql,$conn);
				$count1 = mysql_num_rows( $cmd );
				if( $count1 >= 1 )
				{
					echo "<script type='text/javascript'>";
					echo "alert('product already in cart');";
					echo "window.location.href='cart.php';";
					echo "</script>";
				}
				else
				{
				
				$sql = "insert into cart_details values( $rset[CTID], $pid, $qty)";
				$cmd = mysql_query( $sql, $conn ) or die( mysql_error() );
				header( 'location:cart.php' );
				}
			}
			else
			{
					//auto id start
				$sql = "select max( CTID ) from cart_master";
				$cmd = mysql_query( $sql, $conn );
				$cnt = mysql_num_rows( $cmd );
				if( $cnt == 0 )
				{
					$cartid = 1;
				}
				else
				{
					$rset = mysql_fetch_array( $cmd );
					$cartid = $rset[0] + 1;
				}
					//auto id end
				$sql = "insert into cart_master values( $cartid, $_SESSION[uid], 0)";
				$cmd = mysql_query( $sql, $conn );
				$sql = "insert into cart_details values( $cartid, $pid, $qty)";
				$cmd = mysql_query( $sql, $conn ) or die( mysql_error() );
				header( 'location:cart.php' );
			}
			
	}
	else
	{
		echo "<script> alert('please login to insert product in cart');</script>";
	}	
}
if(isset($_POST['review_submit']))
{
	$name = $_POST["name"];
	$email = $_POST['email'];
	$review = $_POST['review'];
	$rating = $_POST['rating'];	
	$pid = $_POST['pid'];
	if(isset($_SESSION['uid']))
	{
		//auto id start
			$sql = "select max(ID) from review";
			$cmd = mysql_query( $sql, $conn );
			$cnt = mysql_num_rows( $cmd );
			if( $cnt == 0 )
			{
				$id = 1;
			}
			else
			{
				$rset = mysql_fetch_array( $cmd );
				$id = $rset[0] + 1;
			}
		//auto id end
				
			
		$sql = "INSERT INTO `review` VALUES ($id, '$name', '$email', '$review', '$rating', NOW(), '$pid')";
		$res = mysql_query($sql,$conn);
		
		if($res)
		{
				echo "<script>alert( 'your review is successfully submitted!' );</script>";
		}
	}
	else
	{
		echo "<script>alert( 'dear $name please login to add your product review' );</script>";
	}
}		
?>