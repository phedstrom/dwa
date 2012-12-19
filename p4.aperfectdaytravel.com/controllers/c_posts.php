<?php

class posts_controller extends base_controller {

	public function __construct() {
		parent::__construct();
		
		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
			die("Only registered users may add posts.<br><a href='/users/login'>Please login or sign up</a>");
		}
	}
	
	public function add() {
	
		# Setup view
		$this->template->content = View::instance('v_posts_add');
		$this->template->title   = "Add a new post";
		
		# Build our query
		$q = "SELECT * 
			FROM posts
			JOIN users USING (user_id)";
	
		# Run our query, grabbing all the posts and joining in the users	
		$posts = DB::instance(DB_NAME)->select_rows($q);
	
		# Pass data to the view
		$this->template->content->posts = $posts;

		# Render template
		echo $this->template;
	
	}
	
	public function p_add() {
			
		# Associate this post with this user
		$_POST['user_id']  = $this->user->user_id;
		
		# Unix timestamp of when this post was created / modified
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		
		# Insert
		# Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
		DB::instance(DB_NAME)->insert('posts', $_POST);
		
		# Send them to a page asking if they want to post again or not
		Router::redirect("/posts/nextpost");
	}
	public function nextpost() {
		# Setup view
		$this->template->content = View::instance("v_posts_nextpost");
		$this->template->title   = "More posts";
			
		# Render template
		echo $this->template;
	}



}