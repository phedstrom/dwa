<!DOCTYPE html>
<html>
	<head>
		<title><?=@$title; ?></title>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
		
		<!-- JS -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
		
		<!-- Global CSS can go here -->
		<link rel="stylesheet" href="/css/master.css" type="text/css">
					
		<!-- Controller Specific JS/CSS -->
		<?=@$client_files; ?>
		
	</head>

	<body>	
		
		<div id="wrapper">
		
		<div id="navcontainer">
			<ul id="navlist">
			
				<!-- Menu for users who are logged in -->
				<? if($user): ?>
				
					<li><a href='/users/profile'>Your Profile</a></li>
					<li><a href='/users/logout'>Logout</a></li>
					<li><a href='/posts/users/'>Change who you're following</a></li>
					<li><a href='/posts/index'>View posts</a></li>
					<li><a href='/posts/add'>Add a new post</a></li>
				
				<!-- Menu options for users who are not logged in -->	
				<? else: ?>
				
					<li><a href='/users/signup'>Sign up</a></li>
					<li><a href='/users/login'>Log in</a></li>
				
				<? endif; ?>
				
			</ul>
			
		</div>
		
		<br>

		<?=$content;?>	

		</div>
	</body>
</html>