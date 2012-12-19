<table border="1"> 
	<tr> 
		<th>Your Search Results</th> 
        <th>Details</th> 
    </tr>
			  
		<? foreach($searched as $key => $search): ?>		  
			<tr> 
				<td class="leftpart">
					<h3><?=$search['category']?></h3>
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

