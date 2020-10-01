<?php 
if( isset( $_POST['newsletterbtn'] ) )
{
	$email = $_POST['email'];
	$sql = "select * from newsletter where email = '$email'";
	$cmd = mysql_query( $sql, $conn );
	$count = mysql_num_rows( $cmd );
	if( $count == 1 )
	{
		echo "<script> alert( 'your email already in subscription list' ); window.location.href='index.php'; </script>";
	}
	else
	{
		
		//auto id start
			$sql = "select max( ID ) from newsletter";
			$cmd = mysql_query( $sql, $conn );
			$cnt = mysql_num_rows( $cmd );
			if( $cnt == 0 )
			{
				$ID = 1;
			}
			else
			{
				$rset = mysql_fetch_array( $cmd );
				$ID = $rset[0] + 1;
			}
		//auto id end
		$sql = "insert into newsletter values( $ID, '$email' )";
		$cmd = mysql_query( $sql, $conn );
		if($cmd)
		{
			echo "<script> alert( 'your email added to subscription list' ); window.location.href='index.php'; </script>";
		}
	}
}
?>
<!-- NEWSLETTER -->
	<div id="newsletter" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="newsletter">
						<p>Sign Up for the <strong>NEWSLETTER</strong></p>
						<form method="POST">
							<input class="input" type="email" name="email" placeholder="Enter Your Email">
							<button type="submit" name="newsletterbtn" class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
						</form>
						<ul class="newsletter-follow">
							<li>
								<a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
<!-- /NEWSLETTER -->
