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
						<h3 class="breadcrumb-header">CART</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">cart</li>
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
			<h3 style='margin:50px'>please login to view your cart 
				<br><a href='' class='btn btn-link' data-toggle='modal' data-target='#Modal_login'><i class='fa fa-sign-in' aria-hidden='true'></i> Login</a>
			</h3>
			</div>";
}
else
{
$uid=$_SESSION['uid'];
$tot=0;
//to fetch cart_id
$sql="select * from cart_master where UID='$uid'";
$res=mysql_query($sql,$conn) or die(mysql_error());
$res1=mysql_fetch_array($res);
$ctid=$res1['CTID'];



if($res<0)
{
	echo "no products in ur cart";
}
else
{
	
?>



<div class="container">

	<div class="row">


	<div class="col-md-12" style="margin-left:30px;">

		<div class="main" >

			<div class="table-responsive">
			
	            <table class="table table-hover table-condensed" id="">
    				<thead>
						<tr>
							
							<th style="width:48%">Product   </th>
							<th >Price</th>
							<th style="width:15%" >Quantity</th>
							<th  class="text-center">Subtotal</th>
							<th ></th>
						</tr>
					</thead>
					<tbody>
                    
				
						<?php 
						//to fetch product_id
							$_SESSION['ctid']=$ctid;
							$sql="select * from cart_details where CTID='$ctid'";
							$res=mysql_query($sql,$conn) or die(mysql_error());
							while($res1=mysql_fetch_array($res))
							{
							$sql1 = "select * from products where PID=".$res1['PID']."";
								$cmd1 = mysql_query($sql1,$conn)  or die( mysql_error( ) );
								$rset1 = mysql_fetch_array( $cmd1 );

							//echo $rset1['pname'];
							$p=$rset1['pprice'];
							$q=$res1['quantity'];
							$st=$p * $q ;
							
							$tot=$tot+$st;

						?>
				
				
                             
						<tr>
							<td data-th="Product" >
								<div class="row">
								
									<div class="col-sm-4 "><img src="<?php echo $rset1['pimage']; ?>" style="height: 100px;width:100px;"/>
									</div>
									<div class="col-sm-6">
										<div style="max-width=50px;">
										<h4> <?php echo $rset1['pname']; ?></h4>
										</div>
									</div>
									
									
								</div>
							</td>
                            <input type="hidden" name="product_id[]" value=""/>
				            <input type="hidden" name="" value=""/>
							<td data-th="Price"><input type="text" class="form-control price" value="<?php echo $rset1['pprice']; ?>" readonly="readonly"></td>
							<td data-th="Quantity">
							<div class="inline-form">
								<form method="POST">
									<input type="hidden" value="<?php echo $res1['PID']; ?>" name="pid1">							
									<button type="submit" class="btn btn-primary pull-left" name="qplus"><i class="fa fa-plus"></i></button>&nbsp;
									<input type="text" class="input" value="<?php echo $res1['quantity']; ?>" name="qty" style="width:70px" readonly="readonly"/>
									<button type="submit" class="btn btn-primary pull-right" name="qminus"><i class="fa fa-minus"></i></button>
								</form>
							</div>
							
							</td>
							<td data-th="Subtotal" class="text-center"><input type="text" class="form-control total" value="<?php echo $st; ?>" readonly="readonly"></td>
							<td class="actions" data-th="">
							<div class="btn-group">
								
								<a href="delete.php ? pid=<?php echo $rset1['PID']; ?> & ctid=<?php echo $ctid; ?>" class="btn btn-danger  remove" ><i class="fa fa-trash-o"></i></a>		
							</div>	
							
							</td>
								
							
								</tr> 
							
									
					<?php 
					}
					?>                
						
						</tbody>
						<tfoot>
						
						<tr>
							<td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="1" class="hidden-xs"></td>
							<td class="hidden-xs text-center"><b class="net_total" ></b></td>
							
							<td class="pull-right">total amount<p class="alert-success"> <?php echo $tot; ?></p></td>
								<td><a href="checkout.php "  class="btn btn-success"><b>Ready to Checkout ></b></a></td>	
						
									</tr>
								</tfoot>
								
								<?php 
								$sql="update cart_master set total_cost='$tot' where CTID='$ctid'";
								$res=mysql_query($sql,$conn);		
								
								?>
				</table>
			</div>
							
					</div>
							
							
				</div>
				
						
				</div>
			</div>				
		</div>


<?php
}}
if(isset($_POST['qplus']))
{
	$pid1=$_POST['pid1'];
	$q=$_POST['qty'];
	if($q < 20)
	{
	$q=$q+1;
	$sql="update cart_details set quantity='$q' where PID='$pid1' and CTID='$ctid'";
	$res=mysql_query($sql);
	header('location:cart.php');
	}
}
if(isset($_POST['qminus']))
{
	$pid1=$_POST['pid1'];
	$q=$_POST['qty'];
	if($q != 1)
	{
		$q=$q-1;
		$sql="update cart_details set quantity='$q' where PID='$pid1' and CTID='$ctid'";
		$res=mysql_query($sql);
		header('location:cart.php');
	}
}
include "footer.php";
?>