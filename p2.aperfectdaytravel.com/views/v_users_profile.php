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
	<h3>Thought for the Day:</h3>
	
	<? foreach($users as $key => $randomp): ?>
		
		<?=$randomp['content']?>
		
	<? endforeach; ?>

</div>

<!--None of this is working- probably because it needs a separate page
<div id="directory">

	<? /*foreach($user as $key => $users): */?>

	<p><?/*=$user['first_name']*/?> </*?=$user['last_name']*/?> can be reached at: 
		
		<?/*=$user['email']*/?></p>
		
	<?/* endforeach; */?>

</div>-->
