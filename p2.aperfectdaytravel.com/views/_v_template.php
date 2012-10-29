<!DOCTYPE html>
<html>
<head>
	<title><?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
				
	<!-- Controller Specific JS/CSS -->
	<!-- credit to http://css.maxdesign.com.au/listamatic/horizontal25.htm -->
	<style>
		#navcontainer
		{
		margin-left: auto;
		margin-right: auto;
		margin-top: 20px;
		margin-bottom: 10px;
		}

		#navlist li
		{
		display: inline;
		padding-bottom: 14px;
		padding-left: 20px;
		background-repeat: no-repeat;
		}

		#navlist a
		{
		padding-left: 20px;
		padding-bottom: 14px;
		font-weight: bold;
		text-transform: uppercase;
		text-decoration: none;
		}

		#navlist a:link, #navlist a:visited
		{
		padding-left: 20px;
		color: red;
		background: url(http://hekima.lionking.org/randomness/arrowbullet.gif);
		background-position: 0 -28px;
		background-repeat: no-repeat;}

		#navlist a:hover
		{
		color: black;
		padding-left: 20px;
		background: url(http://hekima.lionking.org/randomness/arrowbullet.gif);
		background-repeat: no-repeat;
		background-position: 0 -14px;} 
	</style>
	<?php echo @$client_files; ?>
	
</head>

<body>	

<div id="navcontainer">
<ul id="navlist">
	
		<!-- Menu for users who are logged in -->
		<? if($user): ?>
			
			<li><a href='/users/logout'>Logout</a></li>
			<li><a href='/posts/users/'>Change who you're following</a></li>
			<li><a href='/posts/'>View posts</a></li>
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

</body>
</html>