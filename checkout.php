<!DOCTYPE html>
<?php
include "header.php";	
?>

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Checkout</li>
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
		<form method="POST" action="order.php">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							
							<?php
							
							$uid=$_SESSION['uid'];
							$r=1;
							$sql="select * from address where UID='$uid'";
							$res=mysql_query($sql,$conn);
							while($res1=mysql_fetch_array($res))
							{
								
														
							?>
							
							<div class="list-group">
								  <a class="list-group-item list-group-item-action">
									<div class="d-flex w-100">
									  <input class="" type="radio" name="addid" value="<?php echo $res1['ADDID']; ?>"><h5 class="mb-1">Address <?php echo $r++; ?> </h5>
									</div>
									<p class="mb-1"><?php echo $res1['address']; ?></p>
										
									</a>
							</div>
						<?php
						}
						?>  
			
							
						</div>
						<!-- /Billing Details -->

						<!-- Shiping Details -->
						<form method="POST" >
						<div class="shiping-details">
							<div class="input-checkbox">
								<input type="checkbox" id="shiping-address">
								<label for="shiping-address">
									<span></span>
									Ship to a diffrent address?
								</label>
								<div class="caption">
									<div class="form-group">
										<input class="input" type="text" name="fname" placeholder="First Name">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="lname" placeholder="Last Name">
									</div>
									
									<div class="form-group">
										<input class="input" type="text" name="city" placeholder="City">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="state" placeholder="State">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="address" placeholder="Address">
									</div>
									
									<div class="form-group">
										<input class="input" type="text" name="landmark" placeholder="Landmark">
									</div>
									
									
									<div class="form-group">
										<input class="button btn btn-primary" type="submit" value="Add Address" name="add">
									</div>
								</div>
							</div>
						</div>
						</form>
						<!-- /Shiping Details -->

						<!-- payment method -->
							
				<div class="checkout-box faq-page inner-bottom-sm">
					<div class="row">
						<div class="col-xl-6">
							<h3 class="title">Choose Payment Method</h3>
							<div class="panel-group " id="accordion">
								<!-- checkout-step-01  -->
								<div class="panel panel-default checkout-step-01">

									<!-- panel-heading -->
									<div class="panel-heading">
										<a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
										 Select your Payment Method
										</a>
									</div>
									<!-- panel-heading -->

									<div id="collapseOne" class="panel-collapse collapse in">

										<!-- panel-body  -->
										<div class="panel-body">
											<input type="radio" name="paymethod" value="COD" checked="checked"> COD
										</div>
										<div class="panel-body">
											<input type="radio" name="paymethod" value="Internet Banking"> Internet Banking
										</div>
										<div class="panel-body">
											<input type="radio" name="paymethod" value="Debit / Credit card"> Debit / Credit card
										</div>
										<!-- panel-body  -->

									</div>									
									<!-- row -->
								</div>
								<!-- checkout-step-01  -->
							</div> 
						</div>
					</div>
				</div>
			</div>

					<!-- Order Details -->
					<div class="col-md-4 " style="margin-left:30px; background-color:lavender; padding:20px">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div> 
								<div><strong>TOTAL</strong></div>
							</div>
									<?php 			
										$ctid=$_SESSION['ctid'];
															//to fetch product_id

										$sql="select * from cart_details where CTID='$ctid'";
										$res=mysql_query($sql,$conn) or die(mysql_error());

										$sql="select * from cart_master where CTID='$ctid'";
										$tot1=mysql_query($sql,$conn);
										$tot2=mysql_fetch_array($tot1);


										while($res1=mysql_fetch_array($res))
										{
											$sql1 = "select * from products where PID=".$res1['PID']."";
												$cmd1 = mysql_query($sql1,$conn)  or die( mysql_error( ) );
												$rset1 = mysql_fetch_array( $cmd1 );
												
											//echo $rset1['pname'];
											$p=$rset1['pprice'];
											$q=$res1['quantity'];
											$st=$p * $q ;
											
									?>
							<div class="order-products">
								<div class="order-col">
									<div><?php echo $res1['quantity']; ?>x <?php echo $rset1['pname']; ?></div>
									<div><?php echo $st; ?></div>
									
								</div>
							
							</div>
							<?php
			}
			
			?>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							
									
							
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total"><?php echo $tot2['total_cost']; ?></strong></div>
							</div>
							
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
			
						<center><input type="submit"  name="checkout" value="Ready To Checkout" class="primary-btn order-submit"></input></center>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		</form>
		<!-- /SECTION -->

<?php include "newsletter.php"; ?>
		<?php include "footer.php"; ?>
		
		</body>