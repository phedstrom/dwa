<form method='POST' action='/users/p_login'>

	<label for="e">Email</label>
	<br>
	<input id="e" type='text' name='email' class="required"/>
	<div id="errorMessage_email" class="errorMessage">Please enter a valid email.</div>
	<br><br>

	<label for="p">Password</label>
	<br>
	<input id="p" type='password' name='password' class="required"/>
	<div id="errorMessage_password" class="errorMessage">Please create a password.</div>
	<br><br>
	
	<? if($error): ?>
		<div class='error'>
			Login failed. Please double check your email and password.
		</div>
		<br>
	<? endif; ?>
	
	<input type='submit' value='Log Me In!'>

</form>