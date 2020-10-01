<!DOCTYPE html>


	
		<?php include "header.php"; ?>
				
	<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">forgot password</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">forgot password</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
		
				
	
	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container ">
			<!-- row -->
			<div class="row">
				<div class="col-md-6">
					
					<form method="POST">

					<span>@ enter your registered email</span>
					<input class="form-control" type="email" name="email" placeholder="Example@email.com" required>

					<br />
						<button class="btn btn-primary" type="submit" name="forgot">Forgot Password</button>
					
					</form>
			<?php
			$emsg = '';
			if( isset( $_POST['forgot'] ) ){
				$email=$_POST['email'];
				$sql = "SELECT * FROM `user_login` WHERE email='$email'";
				$res = mysql_query( $sql, $conn );
				$count = mysql_num_rows( $res );
				if( $count == 1 ){
					$r = mysql_fetch_assoc( $res );
					$password = $r['password'];
					$to = $r['email'];
					$subject = "Your Recovered Password";

					$message = "stationery shop,Please use this password to login ->  " . $password;
					$headers = "From : testmycode404@gmail.com";
					if( mail( $to, $subject, $message, $headers ) ){
						$emsg = "Your Password has been sent to your email id";
					}else{
						$emsg = "Failed to Recover your password, try again";
					}

				}
				else{
					$emsg = "User name or email does not exist in database";
				}
			}
			?>
					<br><?php if($emsg!='') {echo "<p class=' alert alert-danger'> $emsg</p>";} ?> 
				</div>
			</div>
		</div>
	</div>
	
	<?php
		include "footer.php";?>
	

	</body>
</html>

