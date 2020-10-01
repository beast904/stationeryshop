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
						<h3 class="breadcrumb-header">my wishlist</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">wishlist</li>
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
			<h3 style='margin:50px'>please login to view your wishlist
				<br><a href='' class='btn btn-link' data-toggle='modal' data-target='#Modal_login'><i class='fa fa-sign-in' aria-hidden='true'></i> Login</a>
			</h3>
			</div>";
}
else
{
$uid=$_SESSION['uid'];

//to fetch cart_id
$sql="select * from wishlist where UID='$uid'";
$res=mysql_query($sql,$conn) or die(mysql_error());
$res1=mysql_fetch_array($res);
$wid=$res1['WID'];
?>




<div class="row">


<div class="col-md-9" style="margin-left:200px;">
<div class="main" >


			<div class="table-responsive">
			<form method="post" action="login_form.php">
			
	               <table id="cart" class="table table-hover table-condensed" id="" width="100%">
    				<thead>
						<tr>
							
							<th style="width:50%">Product   </th>
							<th style="width:10%">Price</th>
							<th style="width:20%"></th>
						</tr>
					</thead>
					<tbody>
                    
				
				
				
				<?php 
					//to fetch product_id

				$sql="select * from wishlist where UID='$uid'";
				$res=mysql_query($sql,$conn) or die(mysql_error());
				while($res1=mysql_fetch_array($res))
				{
					$sql1 = "select * from products where PID=".$res1['PID']."";
						$cmd1 = mysql_query($sql1,$conn)  or die( mysql_error( ) );
						$rset1 = mysql_fetch_array( $cmd1 );

					//echo $rset1['pname'];
			?>
						<tr>
							<td data-th="Product" >
								<div class="row">
								
									<div class="col-sm-4"><img src="<?php echo $rset1['pimage']; ?>" style="height: 100px;width:100px;"/>
									</div>
									<div class="col-sm-6">
										<div style="">
										<h4> <?php echo $rset1['pname']; ?></h4>
										</div>
									</div>
								</div>
							</td>
                            <input type="hidden" name="product_id[]" value=""/>
							<td data-th="Price"><input type="text" class="form-control price" value="<?php echo $rset1['pprice']; ?>" readonly="readonly"></td>
		
							
							<td class="actions" data-th="">
							<div class="btn-group">							
								<a href="delete.php ? wpid=<?php echo $rset1['PID']; ?>" class="btn btn-danger" ><i style="font-size:20px;" class="fa fa-trash-o"></i></a>
								<a href="insertcart.php?pid=<?php echo $rset1['PID']; ?>" class="btn btn-success" ><b>Add to cart<b></a>								
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
                        <td>
							<a href="" data-toggle="modal" data-target="#Modal_register" class="btn btn-success">Add all items to cart </a>
						</td>	
					
					</tr>
			</tfoot>
				
			</table>
		</div>
	</div>
</div>
</div> 

<?php } include "footer.php"; ?>

</body>
</html>