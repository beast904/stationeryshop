<!DOCTYPE html>

	
		<?php include "header.php"; ?>
		<?php 
		if(isset($_GET['n']))
		{
			$_SESSSION['stext']=$_GET['n'];
		}
		?>						
	
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
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<div class="products-slick">
								<!-- product -->
											
									<?php
									if(isset($_GET['n']))
									{
										$qq="where ptag like '%$_GET[n]%' or pname like '%$_GET[n]%' ";
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
