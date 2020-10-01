<?php
include "db.php";
if (isset($_POST["signup_button"])) {

	$fname = $_POST["f_name"];
	$lname = $_POST["l_name"];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password= md5($password);
	$repassword = $_POST['repassword'];
	$mobile = $_POST['mobile'];
	
	//existing email address in our database
	$sql = "SELECT UID FROM user_master WHERE email = '$email' LIMIT 1" ;
	$res = mysql_query($sql,$conn);
	$count_email = mysql_num_rows($res);
	if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email Address is already available Try Another email address</b>
			</div> ";
	} 
	else {
		
		
		//auto id start
			$sql = "select max(UID) from user_master";
			$cmd = mysql_query( $sql, $conn );
			$cnt = mysql_num_rows( $cmd );
			if( $cnt == 0 )
			{
				$uid = 1;
			}
			else
			{
				$rset = mysql_fetch_array( $cmd );
				$uid = $rset[0] + 1;
			}
			//auto id end
		
		$sql = "INSERT INTO `user_master` (`uid`, `fname`, `lname`, `mobile`, `email`) VALUES ($uid, '$fname', '$lname', '$mobile', '$email')";
		$sql1="INSERT INTO `user_login` (`UID`,`email`,`password`) VALUES ('$uid','$email','$password') ";
		
		$res = mysql_query($sql,$conn);
		$res1=mysql_query($sql1,$conn) or die(mysql_error());
		
		$vkey = mt_rand(100000,999999);
		setcookie('vkey',"$vkey",time() +84600);
		setcookie('email',"$email",time() +84600);
		
		$to = $email;
		$subject = "email verification";
		$message = "<a href='http://localhost/stationeryshop/index.php?vk=$vkey'>Register account</a>";
		$headers = "from: testmycode404@gmail.com";
		mail( $to, $subject, $message, $headers );
		
		if($res1){
				echo "<script>alert( 'Register successful login now' ); window.location.href='index.php';</script>";
		}	
	}
}
?>