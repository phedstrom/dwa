<!DOCTYPE html>
<html>
	<head>
		<title><?=@$title; ?></title>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
		
		<!-- JS -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
		<script src="/js/p4.js"></script>
		
		
		<!-- Global CSS can go here -->
		<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/start/jquery-ui.css"/>
		<link rel="stylesheet" type="text/css" href="/css/master.css"/>
					
		<!-- Controller Specific JS/CSS -->
		<?=@$client_files; ?>
		
	</head>

	<body>	
		
		<div id="wrap">	
		
			<div id="header"><h1>A Perfect Day Travel Forum</h1>
			</div>
			
				<div id="navmain">
					<a class="item" href="/index.php">Home</a>
					<a class="item" href='/posts/add'>Add a post</a> 
					<!--<a class="item" href="/forum/create_cat.php">Create a category</a>-->  
				</div>
			
				<div id="navside">
					<? if($user): ?> 
						Hello <?=$user->first_name?>. Not you? <a href='/users/logout'>Sign out</a>
						<br>
					
					<!-- Menu options for users who are not logged in -->	
				<? else: ?>
					<a href='/users/login'>Sign in</a> or <a href='/users/signup'>Create An Account</a> 
				<? endif; ?>
			</div>  
		
			<div id="main">
			<?=$content;?>	
			</div>
		</div>
	</body>
</html>