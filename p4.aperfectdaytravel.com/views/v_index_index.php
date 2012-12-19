<div id="tabs">
    <ul>
		<li><a href="#tabs-1">Forum Posts</a></li>
		<li><a href="#tabs-2">JQuery Effect 1</a></li>
    </ul>
	
    <div id="tabs-1">
		<form id="search" method='POST' action='/search/results'>
			<input type='text' name='search_terms' />
			<input type='submit' value='Search'>
		</form>

		<table border="1">
			<tr> 
				<th>All Posts</th> 
				<th>Details</th> 
			</tr>		  
				<? foreach($posts as $key => $post): ?>		  
					<tr> 
						<td class="leftpart">
							<h3><?=$post['category']?></h3>
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
    </div>
    <div id="tabs-2">
		<div id="pic_box">
			<div id="head" class="face"><img src="/images/headerStrip.jpg" alt="Scrolling Travel Photos">
			</div>
		</div>
    </div>
</div>
