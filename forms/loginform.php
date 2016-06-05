<div class="container">
		<!-- Trigger the modal with a button -->

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Login &amp; Register</button>
			
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<div class="panel panel-login">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-6">
					<a href="#" class="active" id="login-form-link">Login</a>
					</div>
					<div class="col-xs-6">
						<a href="#" id="register-form-link">Register</a>
					</div>
				</div>
				<!--split line-->
				<hr>
			</div>
<div class="panel-body">
	<div class="row">
		<div class="col-lg-12">
		
		<!-- LOG IN FORM STARTS HERE -->
			<form id="login-form" action="forms/form.php" method="post" role="form" style="display: block;">
				<div class="form-group">
					<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Username" value="" MAXLENGTH="16">
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" maxlength="8">
				</div>
				<div class="form-group text-center">
					<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
					<label for="remember"> Remember Me</label>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3">
							<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In" ONCLICK="forms/login.php">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-12">
							<div class="text-center">
								<a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
							</div>
						</div>
					</div>
				</div>
			</form><!-- LOG IN FORM -ENDS- HERE -->
		
			
	<!-- REGISTRATION FORM STARTS HERE -->
			
	<form id="register-form" action="forms/registration.php" method="post" role="form" style="display: none;">
	<?php if(isset($msg)) echo $msg; ?>
		<div class="form-group">
			<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Username" value size="8" MAXLENGTH="16">
		</div>
		<div class="form-group">
			<input type="email" name="user_email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
		</div>
		<div class="form-group">
			<input type="password" name="user_password" id="password" tabindex="2" class="form-control" placeholder="Password" size="8" maxlength="8">
		</div>
		<div class="form-group">
			<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<input type="submit" name="register" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now" ONCLICK="validateForm()">
				</div>
			</div>
		</div>
	</form>
	
	<!-- END OF REGISTRATION FORM -->
	
		</div>
	</div>
</div>
			<div class="modal-footer"><!-- close button on the form-->
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			
		</div>
	</div>
</div>
</div>