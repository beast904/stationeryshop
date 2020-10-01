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
					<form method="POST" class="form">
					
						<span>enter your registered email</span>
						<input class="form-control" type="text" name="user" placeholder="example@email.com" required><br>
						<button class="btn btn-primary" type="submit" name="forgot">Forgot Password</button>
					</form>
					<?php
					$emsg='';
					$user='';
					if( isset( $_POST['forgot'] ) ){
						$user=$_POST['user'];
						$sql = "SELECT * FROM `user_login` WHERE email='$user'";
						$cmd = mysql_query( $sql, $conn ) or die(mysql_error());
						$rset = mysql_fetch_array( $cmd );
						if( $rset[0] == '' )
						{
							$emsg = "! not register with '$user'";
						}
						else
						{
							echo "<form name='form1' method='post'> <br/>";
							echo "<input class='' type='text' name='user' value='$rset[email]' hidden>";
							echo "<input class='form-control' type='text' name='que' value='$rset[sec_ques]' readonly>";
							echo "<input class='form-control' type='text' name='ans' placeholder='answer' require></br>";
							echo "<input class='btn btn-success' type='submit' name='submit' value='submit'> ";
							echo "</form>";
							
						}
					}
					if( isset( $_POST['submit'] ) )
					{
						$ans = $_POST['ans'];
						$user = $_POST['user'];
						$sql = "SELECT * FROM `user_login` WHERE email = '$user'";
						$cmd = mysql_query( $sql, $conn );
						$rset=mysql_fetch_array( $cmd );
						if( $rset['sec_ans'] == $ans )
						{
							
							
							
							echo "<form name='form2' method='post'> <br/>";
							echo "<input class='form-control' type='hidden' name='email' value='$user' placeholder='' ></br>";
							echo "<input class='form-control' type='password' name='pwd' placeholder='new password' require></br>";
							echo "<input class='btn btn-success' type='submit' name='submitpwd' value='submit'> ";
							echo "</form>";
						}
						else
						{
							$emsg = "incorrect answer try another way <a href='forgot2.php'> --></a>";
						}
					}
					if( isset( $_POST['submitpwd'] ) )
					{
							$user = $_POST['email'];
							$pwd = $_POST['pwd'];
							$pwd1=md5($pwd);
							$sql = "UPDATE user_login SET password='$pwd1' WHERE email = '$user'";
							$cmd = mysql_query( $sql, $conn );
					}
					
					?>
					<br>
					<a href='forgot2.php'> try another way--></a>"
					<?php if($emsg!='') {echo "<p class=' alert alert-danger'> $emsg</p>";} ?> 
				</div>
			</div>
		</div>
	</div>
	
	<?php
		include "footer.php";?>
	

	</body>
</html>

