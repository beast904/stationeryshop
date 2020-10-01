<?php
	//session_start();	
	include("header.php");	
?>
<br><br><br><br>
<!DOCTYPE html>
<html>
<head>
<title>How to Implement OTP SMS Mobile Verification in PHP with TextLocal</title>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>

	<div class="container">
		<div class="error"></div>
		<form id="frm-mobile-verification">
			<div class="form-heading">Mobile Number Verification</div>
			<div class="form-row">
				USER NAME:
				<?php echo $_SESSION['uid'];?>
				<br><br> 
				OLD Number:
				<INPUT TYPE="number" NAME="txtm_contact" id="mobile" class="form-input"
					placeholder="Enter the 10 digit mobile"/>
				New Number :
				<input type="number" name="txtn_contact"  class="form-input"
					placeholder="Enter the 10 digit mobile">
			</div>

			<input type="button" class="btnSubmit" value="Send OTP"
				onClick="sendOTP();">
		</form>
	</div>

	<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="verification.js"></script>
</body>
</html>

	
	
	
	
	
	
	
	
	
