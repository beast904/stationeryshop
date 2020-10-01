<!DOCTYPE html>
<?php
include "header.php";
?>

	
	<script src="js/jquery.min.js"></script>
    <script>
       
     $(document).ready(function(){

         $("form input[type=text],form input[type=checkbox]").prop("disabled",true);
		 document.getElementById('file').style.display = 'none';
		 document.getElementById('changepwd').style.display = 'none';
		 
		 $("#edit").on("click",function(){
                 $("form input[type=text],form input[type=checkbox]").prop("disabled",false);
				 document.getElementById('file').style.display = 'block';
			});
			
		 $("#changep").on("click",function(){
				 document.getElementById('changepwd').style.display = 'block';
				  document.getElementById('updateprofile').style.display = 'none';
			});
			
			$("#cancel").on("click",function(){
				 document.getElementById('changepwd').style.display = 'none';
				  document.getElementById('updateprofile').style.display = 'block';
			});
     });
			
    </script>
	
	
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
		?>


		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-sm-3">
						<image class="img-circle" style="width:200px;height:200px" src="<?php if($res1['uimage']=='') echo 'uimage/user.png'; else echo $res1['uimage']; ?>" alt="user image"></image>
					</div>
					<div class="col-sm-6">
						<form id="updateprofile" name="updateprofile"  method="post" enctype="multipart/form-data">
								<h5>Personal details</h5>
								<input id='file' class="input" style="width:500px;margin:0 0 10px;border:0" type="file" name="uimage" />
								<input name="fname" class="input" style="width:250px;margin:0 0 10px" type="text" value="<?php echo $res1['fname']; ?>">
								<input name="lname" class="input" style="width:250px;margin:0 0 10px" type="text" value="<?php echo $res1['lname']; ?>">
								
								<input name="email" class="input" style="width:400px;margin:0 0 10px" type="text" value="<?php echo $res1['email']; ?>">
								<?php
								//echo $_SESSION['uid'];
								$uid=$_SESSION['uid'];
								$q="select * from user_login where UID = $uid";
								$q1=mysql_query($q,$conn);
								$q2=mysql_fetch_array($q1);
								$vemail=$q2['vemail'];
								if($vemail==0)
								{
								?>
								<i class="fas fa-ban" style="color:red;"><b> NOT VERIFIED</b></i>
								
								<a class="btn btn-success" name="clickhere"  href="#" >VERIFY email</a>
								<?php
								}
								else
								{
								?>
									<i class="fa fa-check-circle" style="color:green;" aria-hidden="true"> VERIFIED</i>
								<?php
								}	
								?>
								
								
								
								<input name="mobile" class="input" style="width:250px;margin:0 0 10px" type="text" value="<?php echo $res1['mobile']; ?>">
								<?php
								//echo $_SESSION['uid'];
								$uid=$_SESSION['uid'];
								$q="select * from user_master where UID = $uid";
								$q1=mysql_query($q,$conn);
								$q2=mysql_fetch_array($q1);
								$vmobile=$q2['vmobile'];
								//echo $vmobile;
								if($vmobile==0)
								{
								?>
								<i class="fas fa-ban" style="color:red;"><b> NOT VERIFIED</b></i>
								
								<a class="btn btn-success" name="clickhere"  href="verifymobile.php" >VERIFY MOBILE</a>
								<?php
								}
								else
								{
								?>
									<i class="fa fa-check-circle" style="color:green;" aria-hidden="true"> VERIFIED</i>
								<?php
								}	
								?>
								
								<br/>
								<h5>Security question and answer</h5>
								<input name="que" class="input" style="width:250px;margin:0 0 10px" type="text" value="<?php echo $res2['sec_ques']; ?>">
								<input name="ans" class="input" style="width:250px;margin:0 0 10px" type="text" value="<?php echo $res2['sec_ans']; ?>">
								<br>
								<button class="btn btn-danger" type="button" name='edit' id="edit" ><i class="fa fa-pencil">edit</i></button>
								<input class="btn btn-success" type="submit" name='save' value='save'/>
								<button class="btn btn-danger pull-right" type="button" id="changep">change password</button>
								
						</form>
					<hr>
						<form id="changepwd" name="changepwd"  method="post">
								<h4>Change password <i class="fa fa-key"></i></h4>
								<input name="old" class="input" style="width:500px;margin:0 0 10px" type="password" placeholder="enter your current password">
								<input name="new1" class="input" style="width:500px;margin:0 0 10px" type="password" placeholder="enter new password">
								<input name="new2" class="input" style="width:500px;margin:0 0 10px" type="password" placeholder="re-enter new password">
								
								<input class="btn btn-success" type="submit" name='change' value='save'/>
								<button class="btn btn-danger " type="reset" id="cancel">cancel</button>
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


<?php  
if(isset($_POST['save']))
{
	$fname1 = $_POST['fname'];
	$lname1 = $_POST['lname'];
	$mobile1 = $_POST['mobile'];
	$email1 = $_POST['email'];
	$que1 = $_POST['que'];
	$ans1 = $_POST['ans'];
	
	//file upload
	if(($_FILES['uimage']['type']=="image/gif")||($_FILES['uimage']['type']=="image/jpeg")||($_FILES['uimage']['type']=="image/png"))
	{
		$tpath=$_FILES['uimage']['tmp_name'];
		$apath='uimage/'.$_FILES['uimage']['name'];
		move_uploaded_file($tpath,$apath);
		$sql1="update user_master set fname='$fname1',lname='$lname1',mobile='$mobile1',email='$email1',uimage='$apath' where UID='$uid'";
	}
	else
	{
		$sql1="update user_master set fname='$fname1',lname='$lname1',mobile='$mobile1',email='$email1' where UID='$uid'";
	}
	$res1=mysql_query($sql1,$conn) or die(mysql_error());
	
	$sql2="update user_login set sec_ques='$que1',sec_ans='$ans1' where UID='$uid'";
	$res2=mysql_query($sql2,$conn) or die(mysql_error());
	if($res1)
	{
		echo "<script type='text/javascript'> alert('profile data updated $fname1'); window.location.href='profile.php'; </script>";
	}	
}
if(isset($_POST['change']))
{
	$oldpwd = $_POST['old'];
	$pwd1 = $_POST['new1'];
	$pwd2 = $_POST['new2'];

	if( $pwd1 != $pwd2 )
	{
		echo "<script>alert( 'password dosn't match try again' );</script>";
	}
	else
	{
		
		$sql = "select password from user_login where UID = '$uid'";
		$cmd = mysql_query( $sql, $conn );
		$res = mysql_fetch_array( $cmd );
		
		$password = $res['password'];
		$oldpwd = md5($oldpwd);
		
		if( $password == $oldpwd )
		{
			$pwd1=md5($pwd1);
			$sql = "UPDATE user_login SET password='$pwd1' WHERE UID='$uid'";
			$cmd = mysql_query( $sql, $conn );
			if( $cmd )
			{
				echo "<script>alert( 'password changed successfully' );</script>";
			}
			else
			{
				echo "something wrong";
			}
		}
		else
		{
			echo "<script>alert( 'wrong password entered.' );</script>";
		}
	}
	
}
?>