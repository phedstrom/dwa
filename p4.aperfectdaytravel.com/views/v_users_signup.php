<form method='POST' action='/users/p_signup'>

	<label for="f">First Name</label>
	<br>
	<input id="f" type='text' name='first_name' class="required"/>
	<div id="errorMessage_first_name" class="errorMessage">Please enter your first name.</div>
	<br><br>
	
	<label for="l">Last Name</label>
	<br>
	<input id="l" type='text' name='last_name' class="required"/>
	<div id="errorMessage_last_name" class="errorMessage">Please enter your last name.</div>
	<br><br>

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
	
	<input type='submit' value='Submit and get ready to sign in!'>

</form> 