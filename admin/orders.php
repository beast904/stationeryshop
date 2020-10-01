<!DOCTYPE html>
<html lang="en">
<head>
		<title>ADMIN | orders </title>
		
	<?php include "header.php";?>
	
					<ul class="main-nav nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="customer.php">Customers</a></li>
						<li><a href="categories.php">Categories</a></li>
						<li><a href="products.php">Products</a></li>
						<li class="active"><a href="orders.php">Orders</a></li>
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
						
						$cmd1 =  mysql_query( "select * from orders", $conn );
						$cnt = mysql_num_rows( $cmd1 );
					?>
					<div class="col-md-12" >
						<h3 class="alert bg-dark">Orders <div class="label bg-grey"><?php echo $cnt; ?></div></h3>	
					</div>
					<div class="col" >
						<div class="form-inline pull-right ">
							<form name="searchform" method="post" action="">
							
								<input class="form-control" type="date" name="date1" value="<?php if(isset($_REQUEST['date1'])) echo $_REQUEST['date1']; ?>">
								<input class="form-control" type="date" name="date2" value="<?php if(isset($_REQUEST['date2'])) echo $_REQUEST['date2']; ?>">
								<button type="submit" name="datebtn" class="btn btn-info" data-toggle="tooltip" title="Search date wise"><i class="fa fa-search"></i></button>
							&emsp;
								
								<select class="form-control" name="sort" >
									<option value="OID" <?php if(isset($_REQUEST['sort'])) {if($_REQUEST['sort']=='OID') echo 'selected'; }?> >OID</option>
									<option value="UID" <?php if(isset($_REQUEST['sort'])) {if($_REQUEST['sort']=='UID') echo 'selected'; } ?> >UID</option>
									<option value="PID" <?php if(isset($_REQUEST['sort'])) {if($_REQUEST['sort']=='PID') echo 'selected'; }?> >PID</option>
									<option value="price" <?php if(isset($_REQUEST['sort'])) {if($_REQUEST['sort']=='price') echo 'selected'; }?> >PRICE</option>
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
									<a class="btn btn-warning" href="orders.php"  data-toggle="tooltip" title="Refresh page"><i class="fa fa-refresh"></i></a>
							</form>
							<br>
						</div>
					</div>	
					<table class="table table-hover">
					  <thead class="bg-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">ORDER ID</th>
							<th scope="col">USER ID</th>
							<th scope="col">PRODUCTS ID</th>
							<th scope="col">ADDRESS ID</th>
							<th scope="col">QUANTITY</th>
							<th scope="col">PRICE</th>
							<th scope="col">DATE</th>
							<th scope="col">PAYMENTS</th>
							<th scope="col">STATUS</th>
							<th scope="col">delete</th>
							<th scope="col">update</th>
						</tr>
					  </thead>
					  <tbody class="bg-light">
						<?php
							
							if(isset($_POST['sbtn']))
							{
								$stext = $_POST['stext'];
								$sql="select * from orders where PID like '%$stext%' or pay_method like '%$stext%' or status like '%$stext%' ";
							}
							else
							{
								$sql="select * from orders";
							}
							if(isset($_POST['datebtn']))
							{
								$d1 = $_REQUEST['date1'];
								$d2 = $_REQUEST['date2'];
								$sql=" select * from orders where order_date between '$d1' and '$d2'";
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
						  <td><?php echo "$rset[7]"; ?></td>
						   <td><?php echo "$rset[8]"; ?></td>
						  <td><a class="btn btn-danger" href='orders.php?doid=<?php echo $rset[0]; ?>' data-toggle="tooltip" title="Delete row" ><i class="fa fa-trash"></a></a></td>
						  <td><a class="btn btn-success" href='orders.php?oid=<?php echo $rset[0]; ?>' data-toggle="tooltip" title="accept orders" ><i class="fa fa-check"></a></a></td>
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

//delete
if( isset( $_GET['doid'] ) )
{
	$oid = $_GET['doid'];
	$sql = "DELETE FROM orders WHERE OID='$oid'";
	$cmd = mysql_query( $sql, $conn ) or die( mysql_error() );	
	echo "<script>alert( 'orders Deleted.' ); window.location.href='orders.php'; </script>";
}

if( isset( $_GET['oid'] ) )
{
	$oid = $_GET['oid'];
	$sql1= "select * from orders where OID = $oid";
	$cmd1 =  mysql_query( $sql1, $conn ) or die(mysql_error());
	$rset = mysql_fetch_array( $cmd1 );

	$sql = "INSERT INTO delivery VALUES("."$rset[0]".","."$rset[1]".","."$rset[2]".","."$rset[3]".","."$rset[4]".","."$rset[5]".","."'$rset[6]'".","."'$rset[7]'".")";
	$cmd = mysql_query( $sql, $conn ) or die( mysql_error() );	
	if($cmd)
	{
		$sql = "DELETE FROM orders WHERE OID='$oid'";
		$cmd = mysql_query( $sql, $conn ) or die( mysql_error() );	
	}
	echo "<script>alert( 'orders accepted.' ); window.location.href='orders.php'; </script>";
}

?>