<?php
include "db.php";
$emsg = '';
if(isset($_POST['login_button']))
{
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	$password1 = md5($password);
	echo "$password1";
	$sql = "SELECT * FROM user_login WHERE email = '$email' AND password = '$password1'";
	$res = mysql_query($sql,$conn);
	
	$count = mysql_num_rows($res);
    $row = mysql_fetch_array($res);
	
	//if user record is available in database then $count will be equal to 1
	if($count == 1)
	{
			$v=$row[5];
			if($v == 1)
			{
				$_SESSION['uid'] = $row['UID'];
				//if user is login from page we will send login_success
				echo "<script>alert( 'login successful' ); window.location.href='index.php';</script>";
			}
			else
			{
				echo "<script>alert( 'this account has not been verified, check your email inbox' ); window.location.href='index.php';</script>";
			}
	}
	else
	{
		echo "<script>alert( 'incorrect password or username' ); </script>";	
	}
}
?>

<div class="wait overlay">
	<div class="loader"></div>
	</div>
	<div class="container-fluid">
				<!-- row -->

					<div class="login-marg">
						
								<form id="login" method="POST">
									<div class="billing-details jumbotron">
										<div class="section-title">
											<h2 class="login100-form-title p-b-49" >Login Here</h2>
										</div>
									   
										
										<div class="form-group">
										   <label for="email">Email</label>
											<input class="input input-borders" type="email" name="email" placeholder="Email" id="password" required>
										</div>
										
										<div class="form-group">
										   <label for="email">Password</label>
											<input class="input input-borders" type="password" name="password" placeholder="password" id="password" required>
										</div>
										
									   
										
											<input class="primary-btn btn-block"   type="submit"  Value="Login" name="login_button">
											 
										
										<div class="text-pad">
									
										   <a class="btn btn-link btn-block" href="forgot1.php"> forget password ?</a>
										</div>
									</div>
								</form>
                          
					</div>
		<!-- /row -->
	</div>
