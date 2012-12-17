<? if($show_no_posts_message): ?>
	
	You need to follow someone to see a feed! 
	Find friends to follow <a href="/posts/users">here</a>
	
	<?else:?>

<? foreach($posts as $key => $post): ?>
	
	<h2><?=$post['first_name']?> <?=$post['last_name']?> posted:</h2>
	<?=$post['content']?>
	
	<br><br>
	
<? endforeach; ?>

<?endif;?>
			
		