<div class="welcome">

	<h1>Welcome <?=$user->first_name?> <?=$user->last_name?></h1>
	
</div>

<div id="profileposts">
	<h3>Your Posts:</h3>

	<? foreach($posts as $key => $myposts): ?>
		
		On: <?=$actual_date = Time::display($myposts['created']);?>, you wrote: 
	
		<?=$myposts['content']?></p>
	
	<? endforeach; ?>

</div>

<div class="randompost">
	<h3>Most Recent Post:</h3>
	
	<? foreach($users as $key => $randomp): ?>
	
		On <?=$actual_date = Time::display($randomp['created']);?>, this post was added:
		<br>
		<?=$randomp['content']?>"
		
	<? endforeach; ?>

</div>
