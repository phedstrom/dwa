<div class="welcome">

	<h1>Welcome <?=$user->first_name?> <?=$user->last_name?></h1>
	
</div>

<div id="profileposts">
	<h3>Your Posts:</h3>

	<? foreach($posts as $key => $myposts): ?>

		<p>At <!--figure out how to make the Time library convert this code-->
		<?=$myposts['created']?>, you wrote: 
	
		<?=$myposts['content']?></p>
	
	<? endforeach; ?>

</div>

<div class="randompost">
	<h3>Most Recent Posts:</h3>
	
	<? foreach($users as $key => $randomp): ?>
		
		<?=$randomp['content']?>
		
	<? endforeach; ?>

</div>
