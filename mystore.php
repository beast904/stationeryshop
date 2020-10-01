<!DOCTYPE html>

	
		<?php include "header.php"; ?>
								

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- Products tab & slick -->
					<div class="col-md-12">
							<div class="products-tabs">
								<!-- tab -->
								
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
										
										
											<div class="product" >
											<a href="product.php?pid=<?php echo $pid;?>"> <div class="product-img">
												<img src="<?php echo $pimg; ?>" alt="" >
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">NEW</span>
												</div>
											</div> </a>
											<div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href=""><?php echo $pname; ?> </a></h3>
												<h4 class="product-price"><?php echo $price; ?><del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><a href="insertwishlist.php?pid=<?php echo $pid; ?>"><i class="fa fa-heart-o"></a></i><span class="tooltipp">add to wishlist</span></button>
							
													
												</div>
												</div>
												<div class="add-to-cart">
													<a class="btn-danger btn form-control" href="insertcart.php?pid=<?php echo $pid; ?>" ><i class="fa fa-shopping-cart"></i> &nbsp &nbsp; add to cart &nbsp;</a>
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
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
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
