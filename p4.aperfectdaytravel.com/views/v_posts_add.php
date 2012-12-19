<form method='POST' action='/posts/p_add'>

	<!-- RADIO BUTTONS -->
    <strong>Category</strong>
	<br>
	<input id="r1" type="radio" name="category" value="Adventure" required/>
    <label for="r1">Adventure</label>
	<br>
    <input id="r2" type="radio" name="category" value="Kids" />
    <label for="r2">Kids</label>
    <br>
	<input id="r2" type="radio" name="category" value="Foodie" />
    <label for="r2">Foodie</label>
    <br>
	<input id="r2" type="radio" name="category" value="Creative" />
    <label for="r2">Creative</label>
    <br>
	<div id="errorMessage_category" class="errorMessage">Please select one category.</div>
	<br>
	
	<label for="tt"><strong>New Post:</strong></label>
	<br>
    <textarea id="tt" name="content" class="required"></textarea>
	<div id="errorMessage_content" class="errorMessage">This box was left blank.</div>
	<br><br>
	<input type='submit' value='Submit your post'>

</form>