<?php

class index_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	/*-------------------------------------------------------------------------------------------------
	Access via http://aperfectdaytravel.com/index/index/
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# Any method that loads a view will commonly start with this
		# First, set the content of the template with a view file
			$this->template->content = View::instance('v_index_index');
			
		# Now set the <title> tag
			$this->template->title = "APDT index";
	
		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
			$client_files = Array(
						""
	                    );
			# Load the above specified files
	    	$this->template->client_files = Utils::load_client_files($client_files);   
			
		/***------------------------------------------------------***/
		#passing all posts to v_index.php for display
		# Build our query being specific about what is returned so there's no ambiguity between user created or post created
		$q = "SELECT posts.*, users.user_id, users.first_name, users.last_name
			 FROM posts
			 JOIN users USING (user_id)
			 ORDER BY created DESC";
	
		# Run our query, grabbing all the posts and joining in the users	
		$posts = DB::instance(DB_NAME)->select_rows($q);
	
		# Pass data to the view
		$this->template->content->posts = $posts;
		
		#create a datestamp to be used to calculate age of posts
		$current_time = Time::now();	
		
		# Pass data to the view
		$this->template->content->current_time = $current_time;
			
	      		
		# Render the view
		echo $this->template;

	}

	
		
} // end class
