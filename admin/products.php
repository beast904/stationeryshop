
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
						<li><a href="newsletter.php">Newsletter</a></li>
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
			
				<?php
					$cmd1 =  mysql_query( "select * from products", $conn );
					$cnt = mysql_num_rows( $cmd1 );
				?>	
					<div class="col-md-12" >
						<h3 class="alert bg-dark">Products master <span class= "label bg-grey"><?php echo $cnt; ?></span></h3>	
					</div>
					<div class="col" >
						<div class="form-inline pull-right">
							<form name="searchform" method="post" action="products.php">
						
								<input class="form-control" type="date" name="date1" value="<?php if(isset($_REQUEST['date1'])) echo $_REQUEST['date1']; ?>">
								<input class="form-control" type="date" name="date2" value="<?php if(isset($_REQUEST['date2'])) echo $_REQUEST['date2']; ?>">
								<button type="submit" name="datebtn" class="btn btn-info" data-toggle="tooltip" title="Search date wise"><i class="fa fa-search"></i></button>
							&emsp;
								<select class="form-control" name="order" >
									<option value="" <?php if(isset($_REQUEST['order'])) {if($_REQUEST['order']=='') echo 'selected'; } ?> >Ascending</option>
									<option value="DESC" <?php if(isset($_REQUEST['order'])) {if($_REQUEST['order']=='DESC') echo 'selected'; }?> >Descending</option>
								</select>
								<button type="submit" name="sbtn" class="btn btn-primary"><i class="fa fa-filter"></i></button>
							&emsp;
								<input class="form-control" type="text" name="stext" value="<?php if(isset($_REQUEST['stext'])) echo $_REQUEST['stext']; ?>" />
								<button type="submit" name="sbtn" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Search row"><i class="fa fa-search"></i></button>
							&emsp;
								<a class="btn btn-success" href="" data-toggle="modal" data-target="#Modal_insert"><i class="fa fa-plus"></i> &nbsp;insert</a>
								<a class="btn btn-warning" href="products.php"><i class="fa fa-refresh"></i></a>
								
							</form>
							<br>
						</div>
					</div>
				
			</div>
			<div class="row">
				<div class="table-responsive ">
					<table class="table table-hover">
					  <thead class="bg-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col"></th>
							<th scope="col">name</th>
							<th scope="col">description</th>
							<th scope="col">Brands</th>
							<th scope="col">Quantity</th>
							 <th scope="col">price</th>
							<th scope="col">discount</th>
							<th scope="col">ptag</th>
							<th scope="col">added date</th>
							<th scope="col">categories id</i></th>
							<th scope="col">update</i></th>
							<th scope="col">delete</th>
						</tr>
					  </thead>
					  <tbody class="bg-light">
						<?php
							if(isset($_POST['sbtn']))
							{
								$stext = $_POST['stext'];
								$sql="select * from products where PID='$stext' or pname LIKE '%$stext%' or pdesc LIKE '%$stext%'";
								$cmd1 =  mysql_query( $sql, $conn ) or die(mysql_error());
							}
							else
							{
								$sql="select * from products";
								
							}
							if(isset($_POST['datebtn']))
							{
								$d1 = $_REQUEST['date1'];
								$d2 = $_REQUEST['date2'];
								$sql=" select * from products where date between '$d1' and '$d2'";
							}
							if(isset($_REQUEST['order']))
							{
								$sql.=" ORDER BY CID $_REQUEST[order]";
							}
							$cmd1 =  mysql_query( $sql, $conn ) or die(mysql_error());
							while( $rset = mysql_fetch_array( $cmd1 ) )
							{
						?>
						<tr>
						<form name="up" method="post">
						  <th scope="row"><?php echo "$rset[0]"; ?><input type="hidden" name="upid" value="<?php echo $rset[0]; ?>"></th>
						  <td><image src="../<?php echo $rset[6]; ?>" style="width:100px; height:100px"></image></td>
						  <td><?php echo "$rset[1]"; ?></td>
						  <td><?php echo "$rset[2]"; ?></td>
						  <td><?php echo "$rset[3]"; ?></td>
						  <td><?php echo "$rset[4]"; ?></td>
						  <td><?php echo "$rset[5]"; ?></td>
						  <td><?php echo "$rset[7]"; ?></td>
						  <td class="text-nowrap"><?php echo "$rset[8]"; ?></td>
						  <td><?php echo "$rset[9]"; ?></td>
						  <td><?php echo "$rset[10]"; ?></td>
						  <td><a class="btn btn-primary"  href="products_update.php?upid=<?php echo $rset[0]; ?>"><i class="fa fa-pencil"></a></td>
						  <td><a class="btn btn-danger" href="products.php?pid=<?php echo $rset[0]; ?>"><i class="fa fa-trash"></a></td>
						 </form>
						</tr>
						<?php
							}
						?>
						 
					  </tbody>
					</table>
				</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
	<!--  insert start  -->
	<div class="modal fade" id="Modal_insert" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
							<?php
								$sql = "select max( PID ) from products";
								$cmd = mysql_query( $sql, $conn );
								$cnt = mysql_num_rows( $cmd );
								if( $cnt == 0 )
								{
									$pid = 1;
								}
								else
								{
									$rset = mysql_fetch_array( $cmd );	
									$pid = $rset[0] + 1;
								}
							?>
						
							
							<form id="insert" class="login100-form " action="products.php" method="POST" enctype="multipart/form-data" >
								<div class="billing-details jumbotron">
									<div class="section-title">
										<h2 class="login100-form-title p-b-49" >Insert Products</h2>
									</div>
								
									
									<div class="form-group">
										<label for="id">ID</label>
										<input class="input" type="text" name="pid" value="<?php echo "$pid"; ?>" readonly >
									</div>
									
									<div class="form-group">
										<label for="id">Upload images</label>
										<input class="input" type="file" name="pimage" >
									</div>
								
									<div class="form-group">
										<label for="name">Name</label>
										<input class="input " type="text" name="name" value="" required>
									</div>
									
									<div class="form-group">
										<label for="name">Brands</label>
										<input class="input " type="text" name="brand" value="" required>
									</div>
									
									<div class="form-group">
										<label for="name">Quantity</label>
										<input class="input " type="text" name="quantity" value="" required>
									</div>
									
									<div class="form-group">
										<label for="sub">Description</label>
										<textarea class="input" name="desc" required></textarea>
									</div>
									
									<div class="form-group">
										<label for="price">Price: </label>
										<input class="input" type="text" name="price" value="" required style="width:150px">
										<label for="discount">discount: </label>
										<input class="input" type="text" name="discount" value="" style="width:150px" required>
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
										<textarea class="input" name="ptag" required></textarea>
									</div>
									
									
									<input class="primary-btn btn-block" type="submit"  Value="insert" name="insert">
								</div>
							</form> 
					</div>
				</div>
			</div>
			<!--/modal -->
		</div>
	</div>
	<!-- /insert end-->
	
	</body>
</html>
<?php

//delete
if( isset( $_GET['pid'] ) )
{
	$pid = $_GET['pid'];
	$sql = "DELETE FROM products WHERE PID='$pid'";
	$cmd = mysql_query( $sql, $conn ) or die( mysql_error() );	
	echo "<script>alert( 'Products Deleted.' ); window.location.href='products.php'; </script>";
}


//insert
if( isset( $_POST['insert'] ) )
{
	$pid = $_POST['pid'];
	$pname = $_POST['name'];
	$brand = $_POST['brand'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$discount = $_POST['discount'];
	$cat = $_POST['cat'];
	$ptag = $_POST['ptag'];
	
		$tpath=$_FILES['pimage']['tmp_name'];
		$apath='img/'.$_FILES['pimage']['name'];
		move_uploaded_file($tpath,$apath);
	
	$sql = " INSERT INTO products VALUES($pid, '$pname', '$desc', '$brand','$quantity', $price, '$apath', '$discount', '$ptag' , NOW() ,'$cat')";
	$cmd = mysql_query( $sql, $conn ) or die(mysql_error());
	echo "<script>alert( 'INSERTED.' ); window.location.href='products.php'; </script>";
}

?>