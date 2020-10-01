<!DOCTYPE html>
<html lang="en">
<head>
		<title>ADMIN | manage contactus </title>
		
	<?php include "header.php";?>
	
					<ul class="main-nav nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="customer.php">Customers</a></li>
						<li><a href="categories.php">Categories</a></li>
						<li><a href="products.php">Products</a></li>
						<li><a href="orders.php">Orders</a></li>
						<li><a href="delivery.php">Delivery</a></li>
						<li><a href="feedback.php">Feedback</a></li>
						<li><a href="newsletter.php">Newsletter</a></li>
						<li class="active"><a href="manage_contactus.php">manage Contactus</a></li>
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
						
						$cmd1 =  mysql_query( "select * from contactus", $conn );
						$cnt = mysql_num_rows( $cmd1 );
					?>
					<div class="col-md-12" >
						<h3 class="alert bg-dark">Contect us <div class="label bg-grey"><?php echo $cnt; ?></div></h3>	
					</div>
					<div class="col">						
						<div class="form-inline pull-right">
							<form name="searchform" method="post" action="">
		
									<select class="form-control" name="sort" >
										<option value="ID" <?php if(isset($_REQUEST['sort'])) {if($_REQUEST['sort']=='ID') echo 'selected'; }?> >ID</option>
										<option value="fname" <?php if(isset($_REQUEST['sort'])) {if($_REQUEST['sort']=='fname') echo 'selected'; }?> >F NAME</option>
										<option value="lname" <?php if(isset($_REQUEST['sort'])) {if($_REQUEST['sort']=='lname') echo 'selected'; }?> >L NAME</option>
										<option value="email" <?php if(isset($_REQUEST['sort'])) {if($_REQUEST['sort']=='email') echo 'selected'; }?> >EMAIL</option>
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
							<th scope="col">First name</th>
							<th scope="col">Last name</th>
							<th scope="col">email</th>
							<th scope="col">subject</th>
							<th scope="col">message</th>
							<th scope="col">delete</th>
						</tr>
					  </thead>
					  <tbody class="bg-light">
						<?php
							
							if(isset($_POST['sbtn']))
							{
								$stext = $_POST['stext'];
								$sql="select * from contactus where ID like '%$stext%' or fname like '%$stext%' or lname like '%$stext%' or email like '%$stext%' ";
							}
							else
							{
								$sql = "select * from contactus";
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
						 <!--<th scope="row"><image src="../<?php echo $rset[6]; ?>" style="width:100px; height:auto"></image></th> -->
						 <th></th>
						  <td><?php echo "$rset[0]"; ?></td>
						  <td><?php echo "$rset[1]"; ?></td>
						  <td><?php echo "$rset[2]"; ?></td>
						  <td><?php echo "$rset[3]"; ?></td>
						  <td><?php echo "$rset[4]"; ?></td>
						  <td><?php echo "$rset[5]"; ?></td>
						  <td><a class="btn btn-danger" href='manage_contactus.php?id=<?php echo $rset[0]; ?>' data-toggle="tooltip" title="Delete row" ><i class="fa fa-trash"></a></a></td>
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
	$sql = "DELETE FROM contactus WHERE ID='$id'";
	$cmd = mysql_query( $sql, $conn ) or die( mysql_error() );
	echo "<script>alert('deleted'); window.location.href='customer.php'; </script>";
	}

?>