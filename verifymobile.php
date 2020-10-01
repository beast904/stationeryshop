<!DOCTYPE html>
<?php
include "header.php";

?>

	
	<script src="js/jquery.min.js"></script>
    
	
	
	
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Profile Page</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">my profile</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<?php
			if(isset($_SESSION['uid']))
			{
			$uid=$_SESSION['uid'];
			$cmd1=mysql_query( "select * from user_master where UID='$uid'", $conn );
			$res1=mysql_fetch_array( $cmd1 );
			$cmd2=mysql_query( "select * from user_login where UID='$uid'", $conn );
			$res2=mysql_fetch_array( $cmd2 );
		
		
		
		
		
		if(isset($_POST['sendotp'])) {
				require('textlocal.class.php');
				require('credential.php');

				$textlocal = new Textlocal(false, false, API_KEY);

                // You can access MOBILE from credential.php
				// $numbers = array(MOBILE);
                // Access enter mobile number in input box
                $numbers = array($_POST['mobile']);

				$sender = 'TXTLCL';
				$otp = mt_rand(10000, 99999);
				$message = "Hello " . $res1['fname'] . " This is your OTP: " . $otp;

				try {
				    $result = $textlocal->sendSms($numbers, $message, $sender);
				    setcookie('otp', $otp);
				    echo "<script>alert('OTP successfully send..');</script>";
				} catch (Exception $e) {
				    die('Error: ' . $e->getMessage());
				}
			}

			if(isset($_POST['verifyotp'])) { 
				$otp = $_POST['otp'];
				if($_COOKIE['otp'] == $otp) {
					echo "<script>alert('Congratulation, Your mobile is verified.');</script>";
					$q="update user_master set vmobile='1' where UID='$uid'";
					mysql_query($q,$conn);
					echo "window.location.href='profile.php';";
					
				} else {
					echo "Please enter correct otp.";
				}
			}
		
		
		
		
		
		
		
		
		?>


		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-sm-3">
						<image class="img-circle" style="width:200px;height:200px" src="<?php echo $res1['uimage']; ?>" alt="user image"></image>
					</div>
					<div class="col-sm-6">
					
	
					      <form action="" method="post" >
            
            
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $res1['mobile']; ?>" maxlength="10" placeholder="Enter valid mobile number" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="sendotp" class="btn btn-lg btn-success btn-block">Send OTP</button>
                </div>
            </div>
            </form>
            <form method="POST" action="">
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="otp">OTP</label>
                    <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" maxlength="5" required="">
                </div>
            </div>
             <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="verifyotp" class="btn btn-lg btn-info btn-block">Verify</button>
                </div>
            </div>
        </form>	

	
						
						
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		
		
			<?php }
			
			else{ 
			echo "<div class='container'>
			<h3 style='margin:50px'>please login to view your profile 
				<br><a href='' class='btn btn-link' data-toggle='modal' data-target='#Modal_login'><i class='fa fa-sign-in' aria-hidden='true'></i> Login</a>
			</h3>
			</div>";
			
			
			}?>
	
	<!-- NEWSLETTER -->
		<?php include "newsletter.php"; ?>
	<!-- /NEWSLETTER -->
		
<?php include "footer.php"; ?>
		
	</body>
</html>


