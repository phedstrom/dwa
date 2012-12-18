<div class="paddiv">
Welcome to the search results page.

<table border="1"> 
	<tr> 
        <th>Category</th> 
        <th>Last topic</th> 
    </tr>
			  
		<? foreach($searched as $key => $search): ?>		  
			<tr> 
				<td class="leftpart">
					<p><?=$search['content']?></p>
				</td> 
				<td class="rightpart">
					<?=$elapsed_time = Time::time_ago($search['created'], $current_time);?>
					<br>
					Posted By: <strong><?=$search['first_name']?> <?=$search['last_name']?></strong> 
					<br>
					On: <?=$actual_date = Time::display($search['created']);?>
				</td> 	
			</tr>
		<? endforeach; ?>
	
</table>

</div>