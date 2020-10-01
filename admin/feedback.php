<!DOCTYPE html>
<html lang="en">
<head>
		<title>ADMIN | customer </title>
		
	<?php include "header.php";?>
	
					<ul class="main-nav nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="customer.php">Customers</a></li>
						<li><a href="categories.php">Categories</a></li>
						<li><a href="products.php">Products</a></li>
						<li><a href="orders.php">Orders</a></li>
						<li><a href="delivery.php">Delivery</a></li>
						<li  class="active"><a href="feedback.php">Feedback</a></li>
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
						
						$cmd1 =  mysql_query( "select * from review", $conn );
						$cnt = mysql_num_rows( $cmd1 );
					?>
					<div class="col-md-12" >
						<h3 class="alert bg-dark">Customer Feedback <div class="label bg-grey"><?php echo $cnt; ?></div></h3>	
					</div>
					
					<div class="col">
						<div class="form-inline pull-right">	
							<form name="searchform" method="post" >
								
								<input class="form-control" type="date" name="date1" value="<?php if(isset($_REQUEST['date1'])) echo $_REQUEST['date1']; ?>">
								<input class="form-control" type="date" name="date2" value="<?php if(isset($_REQUEST['date2'])) echo $_REQUEST['date2']; ?>">
								<button type="submit" name="datebtn" class="btn btn-info" data-toggle="tooltip" title="Search date wise"><i class="fa fa-search"></i></button>
							&emsp;
									<select class="form-control" name="sort" >
										<option value="ID" <?php if(isset($_REQUEST['sort'])) {if($_REQUEST['sort']=='ID') echo 'selected'; }?> >ID</option>
										<option value="name" <?php if(isset($_REQUEST['sort'])) {if($_REQUEST['sort']=='name') echo 'selected'; } ?> >NAME</option>
										<option value="rating" <?php if(isset($_REQUEST['sort'])) {if($_REQUEST['sort']=='rating') echo 'selected'; }?> >RATING</option>
										<option value="date" <?php if(isset($_REQUEST['sort'])) {if($_REQUEST['sort']=='date') echo 'selected'; }?> >DATE</option>
									</select>  
									<select class="form-control" name="order" >
										<option value="" <?php if(isset($_REQUEST['order'])) {if($_REQUEST['order']=='') echo 'selected'; } ?> >Ascending</option>
										<option value="DESC" <?php if(isset($_REQUEST['order'])) {if($_REQUEST['order']=='DESC') echo 'selected'; }?> >Descending</option>
									</select>
									<button type="submit" name="sbtn" class="btn btn-primary"><i class="fa fa-filter"></i></button>
								&emsp;
									<input class="form-control" type="text" name="stext" value="<?php if(isset($_REQUEST['stext'])) echo $_REQUEST['stext']; ?>" />
									<button type="submit" name="sbtn" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Search row"><i class="fa fa-search"></i></button>
								&emsp;
									<a class="btn btn-warning" href=""  data-toggle="tooltip" title="Refresh page"><i class="fa fa-refresh"></i></a>
					
							</form>
							<br>
						</div>
					</div>	
					<table class="table table-hover">
					  <thead class="bg-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">ID</th>
							<th scope="col">name</th>
							<th scope="col">email</th>
							<th scope="col">review</th>
							<th scope="col">rating</th>
							<th scope="col">date</th>
							<th scope="col">Product id</th>
							<th scope="col">delete</th>
						</tr>
					  </thead>
					  <tbody class="bg-light">
						<?php
							
							if(isset($_POST['sbtn']))
							{
								$stext = $_POST['stext'];
								$sql="select * from review where ID like '%$stext%' or PID like '%$stext%' or name like '%$stext%' or email like '%$stext%'";
							}
							else
							{
								$sql = "select * from review";
							}
							if(isset($_POST['datebtn']))
							{
								$d1 = $_REQUEST['date1'];
								$d2 = $_REQUEST['date2'];
								$sql=" select * from review where date between '$d1' and '$d2'";
							}
							if(isset($_REQUEST['sort']))
							{
								
								$sql.=" ORDER BY $_REQUEST[sort]";
								if(isset($_REQUEST['order']))
								{
									$sql.="  $_REQUEST[order]";
								}
							}	
							
							$cmd1 =  mysql_query( $sql, $conn ) or die(mysql_error());
							while( $rset = mysql_fetch_array( $cmd1 ) )
							{
								
						?>
						<tr>
						 
						 <th></th>
						  <td><?php echo "$rset[0]"; ?></td>
						  <td><?php echo "$rset[1]"; ?></td>
						  <td><?php echo "$rset[2]"; ?></td>
						  <td><?php echo "$rset[3]"; ?></td>
						  <td><?php echo "$rset[4]"; ?></td>
						  <td><?php echo "$rset[5]"; ?></td>
						  <td><?php echo "$rset[6]"; ?></td>

						  <td><a class="btn btn-danger" href='feedback.php?id=<?php echo $rset[0]; ?>' data-toggle="tooltip" title="Delete row" ><i class="fa fa-trash"></a></a></td>
						</tr>
						<?php
							}
						?>
					  </tbody>
					</table>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

	</body>
</html>
<?php
	if(isset($_GET['id']))
	{
	$id = $_GET['id'];
	$sql = "DELETE FROM review WHERE ID='$id'";
	$cmd = mysql_query( $sql, $conn ) or die( mysql_error() );
	echo "<script>alert('deleted'); window.location.href='feedback.php'; </script>";
	}

?>