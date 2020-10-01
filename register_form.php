 <div class="wait overlay">
        <div class="loader"></div>
    </div>
    <style>
    .input-borders{
        border-radius:30px;
    }
    </style>
				<!-- row -->
				
                <div class="container-fluid">
					
						
						
						<!-- /Billing Details -->
						
								<form id="signup_form" class="login100-form" action="register.php" method="POST"  onsubmit = "return(validation());">
									<div class="billing-details jumbotron">
                                    <div class="section-title">
                                        <h2 class="login100-form-title p-b-49" >Register Here</h2>
                                    </div>
                                    <div class="form-group ">
                                    
                                        <input class="input form-control input-borders" type="text" name="f_name" id="f_name" placeholder="First Name" required>
	                                  </div>
                                    <div class="form-group">
                                    
                                        <input class="input form-control input-borders" type="text" name="l_name" id="l_name" placeholder="Last Name" required>
							                             </div>
									 <div class="form-group">
                                        <input class="input form-control input-borders" type="text" name="mobile" id="mobile" placeholder="mobile" required>
							
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="email" name="email"  placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="password" name="password" id="password" placeholder="password" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="password" name="repassword" id="repassword" placeholder="confirm password" required>
                                    </div>
                                   
                                   
								   
                                    <div style="form-group">
                                       <input class="primary-btn btn-block"  value="Sign Up" type="submit" name="signup_button">
                                    </div>
                                    <div class="text-pad">
                                    <a href="" data-toggle="modal" data-target="#Modal_login">Already have an Account ? then login</a>
                                       
                                    </div>
                                    
                                
								</form>
                                <div class="login-marg">
						<!-- Billing Details -->
						<div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8" id="signup_msg">
                                    

                                </div>
                                <!--Alert from signup form-->
                            </div>
                            <div class="col-md-2"></div>
                        </div>

						
					</div>
                    </div> 

					
				
				<!-- /row -->

			
 <script>
		
		function validation() {
		  var txt = "";
		 var val1 = document.getElementById('f_name').value;
		 var val2 = document.getElementById('l_name').value;
		 var val3 = document.getElementById('mobile').value;
    
			if (!val1.match(/^[a-zA-Z]+$/)) 
			{
				alert('Only alphabets are allowed');
				document.getElementById('f_name').focus() ;
				return false;
			}
			if (!val2.match(/^[a-zA-Z]+$/)) 
			{
				alert('Only alphabets are allowed');
				document.getElementById('l_name').focus() ;
				return false;
			}
			
			if(isNaN(val3))
			{
			alert("Enter the valid Mobile Number(Like : 9566137117)");
			document.getElementById('mobile').focus();
			return false;
			}
			if((val3.length < 1) || (val3.length > 10))
			{
			alert(" Your Mobile Number must be 1 to 10 Integers");
			document.getElementById('mobile').select();
			return false;
			}
			
			return true;
		 
		 
		}
		</script>
  