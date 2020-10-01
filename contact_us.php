<!DOCTYPE html>
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
						<h3 class="breadcrumb-header">Contact us</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">contact us</li>
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
			<div class="container">
				<!-- row -->
				<div class="row">
				
					<div class="col-sm-6">
						<form name="contactus" method="post">
								<h5></h5>
									<div class="form-group ">
                                        <input class="input form-control input-borders" type="text" name="fname"  placeholder="First Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="text" name="lname"  placeholder="Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="email" name="email"  placeholder="Email" required>
                                    </div>
									<div class="form-group">
                                        <input class="input form-control input-borders" type="text" name="subject"  placeholder="subject" required>
                                    </div>
									<div class="form-group">
                                        <textarea class="input form-control input-borders" type="text" name="message" rows="5"  placeholder="message" required></textarea>
                                    </div>
								<div class="form-group">
									<input class="btn btn-danger form-control input-borders" type="submit" name='submit' value='submit'/>
								</div>
								
						</form>
					
					</div>
					<div class="col-sm-6">
						<div style="border-left:solid  lavender;margin:10px;padding-left:30px">
						<h6 class="heading"><i class="fa fa-map-marker"></i> LOCATE US</h6>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3734.5249357481007!2d72.90652331447743!3d20.607449486228013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0c2b845dced6f%3A0xd07d6ae76f715053!2sDolat-Usha+Institute+of+Applied+Sciences+And+Dhiru-Sarla+Institute+Of+Management+And+Commerce!5e0!3m2!1sen!2sin!4v1565954051135!5m2!1sen!2sin" width="400" height="400" frameborder="0"></iframe>
					</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

	
	<!-- NEWSLETTER -->
			<?php include "newsletter.php"; ?>
	<!-- /NEWSLETTER -->
		
<?php include "footer.php"; ?>
		
	</body>
</html>


<?php
if(isset($_POST['submit']))
{
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];	
	
		//auto id start
			$sql = "select max(ID) from contactus";
			$cmd = mysql_query( $sql, $conn );
			$cnt = mysql_num_rows( $cmd );
			if( $cnt == 0 )
			{
				$id = 1;
			}
			else
			{
				$rset = mysql_fetch_array( $cmd );
				$id = $rset[0] + 1;
			}
			//auto id end
			
		
		$sql = "INSERT INTO `contactus` VALUES ($id, '$fname', '$lname', '$email', '$subject', '$message')";
		$res = mysql_query($sql,$conn);
		
		if($res)
		{
				echo "<script>alert( 'your message is successfully sent!' );</script>";
		}
}		
?>