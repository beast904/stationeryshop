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
						<h3 class="breadcrumb-header">my order</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">order</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	<!-- /BREADCRUMB -->

<?php
if(!isset($_SESSION['uid']))
{
	echo "<div class='container'>
			<h3 style='margin:50px'>please login to view your oreders
				<br><a href='' class='btn btn-link' data-toggle='modal' data-target='#Modal_login'><i class='fa fa-sign-in' aria-hidden='true'></i> Login</a>
			</h3>
			</div>";
}
else
{
?>

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">			
			<div class="row">
				<div class="col-md-12">
				<div class="main">
					<div class="table-responsive  text-center">
						   <table class="table table-hover table-condensed ">
							<thead>
								<tr>
									<th>#</th>
									<th>Product image   </th>
									<th>Product name   </th>
									<th>Price</th>
									<th>Quantity</th>
									<th>Shipping charges   </th>
									<th>grandtotal</th>
									<th>Payment method   </th>
									<th>Order date   </th>
									<th>status </th>
									<th></th>
						
								</tr>
							</thead>
						<tbody>		
						<?php
						
						$no = 0;
							$sql="select * from orders where UID='$uid'";
							$res1=mysql_query($sql,$conn);
							while($rset1=mysql_fetch_array($res1))
							{
							if( $no == 0 )
							{	
								$no = 1;
							}
							else
							{
								$no = $no + 1;
							}
							
							$pid=$rset1['PID']; 
							$sql="select * from products where PID='$pid'";
							$res2=mysql_query($sql,$conn);
							$rset2=mysql_fetch_array($res2);
							
							?>

								<tr>
								<td><?php echo $no; ?></td>
								<td> <a href="product.php?pid=<?php echo $pid;?>"> <img src="<?php echo $rset2['pimage']; ?>" width="100px"> </a></td>
								<td ><?php echo $rset2['pname']; ?></td>
								<td><?php echo $rset1['price']; ?></td>
								<td><?php echo $rset1['quantity']; ?></td>
								<td>free</td>
								<td><?php echo $rset1['price']*$rset1['quantity']; ?></td>
								<td><?php echo $rset1['pay_method']; ?></td>
								<td><?php echo $rset1['order_date']; ?></td>
								<td><?php echo $rset1['status']; ?></td>
								<?php
									if($rset1['status']=='pending')
									{
								?>
								<td><a class="btn btn-danger" href="yourorder.php?oid=<?php echo $rset1[0]; ?>" title="cancel order">cancel</a></td>
								<?php
									}
								?>
				
								</tr>
								<?php
								 }
								?>
							
							<tr><td colspan=11><br></td></tr>
				<!---- last order delevery table ---->
															
						<?php
						
							$no = 0;
							$sql="select * from delivery where UID='$uid'";
							$res1=mysql_query($sql,$conn);
							while($rset1=mysql_fetch_array($res1))
							{
								if( $no == 0 )
								{	
									$no = 1;
								}
								else
								{
									$no = $no + 1;
								}
							
							$pid=$rset1['PID']; 
							$sql="select * from products where PID='$pid'";
							$res2=mysql_query($sql,$conn);
							$rset2=mysql_fetch_array($res2);
							
							?>

								<tr>
								<td><?php echo $no; ?></td>
								<td><a href="product.php?pid=<?php echo $pid;?>">  <img src="<?php echo $rset2['pimage']; ?>" width="100px"> </a></td>
								<td ><?php echo $rset2['pname']; ?></td>
								<td><?php echo $rset1['price']; ?></td>
								<td><?php echo $rset1['quantity']; ?></td>
								<td>free</td>
								<td><?php echo $rset1['price']*$rset1['quantity']; ?></td>
								<td><?php echo $rset1['pay_method']; ?></td>
								<td><?php echo $rset1['date']; ?></td>
								<td><?php echo 'completed' ?></td>
								</tr>
								<?php
		} 
								?>					
							
							</tbody>
							</table>
						</div>
					</div>					
				</div>					
			</div>
		</div>

	<!-- NEWSLETTER -->
<?php } include "newsletter.php"; ?>
		<!-- /NEWSLETTER -->
		
	<?php include "footer.php"; ?>
	</body>
</html>
<?php
if( isset( $_GET['oid'] ) )
{
	$oid = $_GET['oid'];
	$sql = "update orders set status='calcelled' where OID=$oid";
	$cmd = mysql_query( $sql, $conn ) or die( mysql_error() );	
	echo "<script>alert( 'Order Cancelled.' ); window.location.href='yourorder.php'; </script>";
	
	}

?>