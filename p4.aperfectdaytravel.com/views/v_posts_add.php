<form method='POST' action='/posts/p_add'>
	
	<label for="tt"><strong>New Post:</strong></label>
	<br>
    <textarea id="tt" name="content" class="required"></textarea>
	<div id="errorMessage_content" class="errorMessage">This box was left blank.</div>
	<br><br>
	<input type='submit' value='Submit your post'>

</form>