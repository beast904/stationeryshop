<!DOCTYPE html>
<html lang="en">
<head>
		<title>ADMIN | products </title>
	
		
	<?php include "header.php";?>

					<ul class="main-nav nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="customer.php">Customers</a></li>
						<li><a href="categories.php">Categories</a></li>
						<li class="active"><a href="products.php">Products</a></li>
						<li><a href="orders.php">Orders</a></li>
						<li><a href="delivery.php">Delivery</a></li>
						<li><a href="feedback.php">Feedback</a></li>
						<li><a href="manage_contactus.php">manage Contactus</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
		
	<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
			<div class="row">
			<div class=" col-md-2 pull-center">
	</div>
	<!-- update start  -->
					<div class="container-fluid col-md-8 pull-center">
							
						<?php

						//delete
						if( isset( $_GET['upid'] ) )
						{
							$upid = $_GET['upid'];
							$cmd = mysql_query( "select * from products where PID = $upid",$conn );
							$rset = mysql_fetch_array( $cmd );
						}

						?>
							
							<form id="insert" class="login100-form " action="products_update.php" method="POST">
								<div class="billing-details jumbotron">
									<div class="section-title">
										<h2 class="login100-form-title p-b-49" >Update Products</h2>
									</div>
								
									
									<div c	lass="form-group">
										<label for="id">ID</label>
										<input class="input" type="text" name="pid" value="<?php echo $upid; ?>" readonly >
									</div>
							
								
									<div class="form-group">
										<label for="name">Name</label>
										<input class="input " type="text" name="name" value="<?php echo $rset[1]; ?>" required>
									</div>
									
									<div class="form-group">
										<label for="sub">Description</label>
										<textarea class="input" name="desc" required><?php echo $rset[2]; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="price">Price: </label>
										<input class="input" type="text" name="price"value="<?php echo $rset[5 ]; ?>" required style="width:250px">
										<label for="discount">discount: </label>
										<input class="input" type="text" name="discount" value="<?php echo $rset[7]; ?>" style="width:250px" required>
									</div>
									
									<div class="form-group">
										<label for="quantity">Quantity: </label>
										<input class="input" type="text" name="quantity"value="<?php echo $rset[4]; ?>" required style="width:250px">
										
									</div>
									
									
									
									<div class="form-group">
									<label for="categories">select categories</label>
									<select id="category" name="cat" class="input">
										<option value="">select</option>
										<?php
										$result = mysql_query( "SELECT * FROM categories", $conn );
										while( $row = mysql_fetch_array( $result ) ) {
										?>
											<option value="<?php echo $row['CID'];?>"><?php echo $row['cname'];?></option>
										<?php
											}
										?>	
									</select>
									</div>
									
									<div class="form-group">
										<label for="name">products tag</label>
										<textarea class="input" name="ptag" required><?php echo $rset[6]; ?></textarea>
									</div>
									
									
									<input class="primary-btn btn-block" type="submit"  Value="update" name="update">
								</div>
							</form> 
					</div>
				</div>
		</div>
	</div>
	<!-- /update end-->


	</body>
</html>

<?php
//update
if( isset( $_POST['update'] ) )
{
	$pid = $_POST['pid'];
	$pname = $_POST['name'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];
	$quantity=$_POST['quantity'];
	$discount = $_POST['discount'];
	$cat = $_POST['cat'];
	$ptag = $_POST['ptag'];
	$sql = " UPDATE products SET pname = '$pname', pdesc = '$desc', pprice = '$price',quantity='$quantity', pdiscount = '$discount', CID = '$cat', ptag = '$ptag'  WHERE PID = $pid";
	$cmd = mysql_query( $sql, $conn ) or die(mysql_error());
	echo "<script>alert( 'Updated.' ); window.location.href='products.php'; </script>";
}

?>