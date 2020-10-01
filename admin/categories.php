
<!DOCTYPE html>
<html lang="en">
<head>
		<title>ADMIN | categories </title>
		
	<?php include "header.php";?>
	
					<ul class="main-nav nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="customer.php">Customers</a></li>
						<li class="active"><a href="categories.php">Categories</a></li>
						<li><a href="products.php">Products</a></li>
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
						$cmd1 =  mysql_query( "select * from categories", $conn );
						$cnt = mysql_num_rows( $cmd1 );
					?>	
						<div class="col-md-12">
							<h3 class="alert bg-dark">Categories master <div class="label bg-grey"><?php echo $cnt; ?></div></h3>	
						</div>
					<div class="col" >
						<div class="form-inline pull-right">
							<form name="searchform" method="post" action="categories.php">
							
									
								
									<select class="form-control" name="order" >
										<option value="" <?php if(isset($_REQUEST['order'])) {if($_REQUEST['order']=='') echo 'selected'; } ?> >Ascending</option>
										<option value="DESC" <?php if(isset($_REQUEST['order'])) {if($_REQUEST['order']=='DESC') echo 'selected'; }?> >Descending</option>
									</select>
									<button type="submit" name="submit_sort" class="btn btn-primary"><i class="fa fa-filter"></i></button>
								&emsp;
									<input class="form-control" type="text" name="stext" value="<?php if(isset($_REQUEST['stext'])) echo $_REQUEST['stext']; ?>" />
									<button type="submit" name="sbtn" class="btn btn-info"><i class="fa fa-search"></i></button>
								&emsp;
									<a class="btn btn-success" href="" data-toggle="modal" data-target="#Modal_insert"><i class="fa fa-plus"></i> &nbsp;insert</a>
									<a class="btn btn-warning" href="categories.php"><i class="fa fa-refresh"></i></a>
								
								
							</form>
							<br>
						</div>
					</div>
				
					
				</div>
			<div class="row">
				<div class="table-responsive text-nowrap">
					<table class="table table-hover">
					  <thead class="bg-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">ID</th>
							<th scope="col">categories name</th>
							<th scope="col">main categories</th>
							<th scope="col">UPDATE</th>
							<th scope="col">DELETE</th>
						</tr>
					  </thead>
					  <tbody class="bg-light">
						<?php
							if(isset($_POST['sbtn']))
							{
								$stext = $_POST['stext'];
								$sql = "select * from categories where CID='$stext' or cname LIKE '%$stext%' or scname LIKE '%$stext%'";
							}
							else
							{
								$sql = "select * from categories";
							}
							if(isset($_REQUEST['order']))
							{
								$sql.=" ORDER BY CID $_REQUEST[order]";
							}
							$cmd1 =  mysql_query( $sql, $conn ) or die(mysql_error());
							
							while( $rset = mysql_fetch_array( $cmd1 ) )
							{
						?>
						<form action="categories.php" method="post">
						<tr>
						  <th scope="row"></th>
						  <td><h2 class="btn" style="background-color:white;"><?php echo "$rset[0]"; ?></h2><input type="hidden" name="catid" value="<?php echo $rset[0];?>"/></td>
						  <td><input class="form-control" type="text" name="name" value="<?php echo $rset[1];?>"/></td>
						  <td><input class="form-control" type="text" name="sub" value="<?php echo $rset[2];?>"/></td>
						  <td><button type="submit" class="btn btn-primary" name="up_cat" ><i class="fa fa-pencil"></i></button></td>
						  <td><button type="submit" class="btn btn-danger" name="dl_cat" ><i class="fa fa-trash"></i></button></td>
						</tr>
						</form>
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

	<!--  update start  -->
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
								$sql = "select max( CID ) from categories";
								$cmd = mysql_query( $sql, $conn );
								$cnt = mysql_num_rows( $cmd );
								if( $cnt == 0 )
								{
									$cid = 1;
								}
								else
								{
									$rset = mysql_fetch_array( $cmd );	
									$cid = $rset[0] + 1;
								}
							?>
							
							<form id="insert" class="login100-form " action="categories.php" method="POST">
								<div class="billing-details jumbotron">
									<div class="section-title">
										<h2 class="login100-form-title p-b-49" >Insert categories</h2>
									</div>
							   
								
									<div class="form-group">
										<label for="id">ID</label>
										<input class="input input-borders" type="text" name="catid" value="<?php echo $cid; ?>" >
									</div>
									
									<div class="form-group">
										<label for="name">name</label>
										<input class="input input-borders" type="text" name="name" value="" required>
									</div>
									
									<div class="form-group">
										<label for="sub">sub tag</label>
										<input class="input input-borders" type="text" name="sub" value="" required>
									</div>
									
									<input class="primary-btn btn-block" type="submit"  Value="insert" name="in_cat">
								</div>
							</form> 
					</div>
				</div>
			</div>
			<!--/modal -->
		</div>
	</div>
	<!-- /update end-->

	</body>
</html>
<?php
//insert
if( isset( $_POST['in_cat'] ) )
{
	$sub = $_POST['sub'];
	$name = $_POST['name'];
	$catid = $_POST['catid'];
	$sql = "insert into categories values( '$catid', '$name' ,'$sub' )";
	$cmd = mysql_query( $sql, $conn ) or die(mysql_error());
	echo "<script>alert( 'Inserted.' );  window.location.href='categories.php'; </script>";
}
//update
if( isset( $_POST['up_cat'] ) )
{
	$sub = $_POST['sub'];
	$name = $_POST['name'];
	$catid = $_POST['catid'];
	$sql = " UPDATE categories SET cname = '$name',scname = '$sub' WHERE CID = $catid";
	$cmd = mysql_query( $sql, $conn ) or die(mysql_error());
	echo "<script>alert( 'Updated.' ); window.location.href='categories.php'; </script>";
}
//delete
if( isset( $_POST['dl_cat'] ) )
{
	$catid = $_POST['catid'];
	$sql = "DELETE FROM categories WHERE CID='$catid'";
	$cmd = mysql_query( $sql, $conn ) or die( mysql_error() );	
	echo "<script>alert( 'Deleted.' ); window.location.href='categories.php'; </script>";
}

?>