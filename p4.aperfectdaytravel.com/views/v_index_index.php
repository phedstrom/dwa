<form method='POST' action='/search/results'>

	<input type='text' name='search_terms'></input>

	<input type='submit' value='Search'>

</form>

<div id="container">
	<div id="pic_box">
		<div id="head" class="face"><img src="/images/headerStrip.jpg"></div>
	</div>
</div>



<div class="welcome">

	<h1>A Perfect Day Travel Forum</h1>

</div>

<table border="1"> 
	<tr> 
        <th>Category</th> 
        <th>Last topic</th> 
    </tr>
			  
		<? foreach($posts as $key => $post): ?>		  
			<tr> 
				<td class="leftpart">
					<p><?=$post['content']?></p>
				</td> 
				<td class="rightpart">
					<?=$elapsed_time = Time::time_ago($post['created'], $current_time);?>
					<br>
					Posted By: <strong><?=$post['first_name']?> <?=$post['last_name']?></strong> 
					<br>
					On: <?=$actual_date = Time::display($post['created']);?>
				</td> 	
			</tr>
		<? endforeach; ?>
	
</table>

<div class="randompost">

	We are a community of travelers sharing tips from across the globe.
	<br><br>

	Create a profile today and enter a world of information, inspiration and fun.
	<br><br>

</div>