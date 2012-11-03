<?php
class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	public function index() {
		echo "Welcome to the users's department";
	}
	
	public function signup() {
		# Setup view
			$this->template->content = View::instance("v_users_signup");
			$this->template->title  = "Signup";
			
		# Render template
			echo $this->template;
	}
	# methods in charge of processing POST data start with a 'p' underscore
	public function p_signup() {
		
		#THIS IS A TEST
		//print_r ($_POST['password']);
		
		# Dump out the results of POST to see what the form submitted
		// print_r($_POST);
		
		# Encrypt password
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
			
		# More data we want stored with the user	
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		$_POST['token']    = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
		
		# Insert this user into the database
		$user_id = DB::instance(DB_NAME)->insert("users", $_POST);
	
		# For now, just confirm they've signed up - we can make this fancier later
		echo "You're signed up"; 
		
		#NOW GO BACK TO PLACE FOR THEM TO SIGN IN WITH USERNAME AND PASSWORD AS ECHOED ON PAGE
		# Send them back to the login page
			Router::redirect("/users/login");
	}
	
	public function login($error = NULL) {
		# Setup view
		$this->template->content = View::instance('v_users_login');
		$this->template->title   = "Login";
		
		# Pass error data to the view
		$this->template->content->error = $error;
			
		# Render template
			echo $this->template;
	}
	# Again, convention suggests you underscore methods in charge of processing POST data
	public function p_login() {
	
		# Sanitize the user entered data to prevent a SQL Injection Attack
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		# Hash submitted password so we can compare it against one in the db
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		# Search the db for this email and password
		# Retrieve the token if it's available
		$q = "SELECT token 
			FROM users 
			WHERE email = '".$_POST['email']."' 
			AND password = '".$_POST['password']."'";
		
		$token = DB::instance(DB_NAME)->select_field($q);	
					
		# If we didn't get a token back, login failed
		if($token == "") {
			# Send them back to the login page
			Router::redirect("/users/login/error");
			
		# But if we did, login succeeded! 
		} else {
				
			# Store this token in a cookie
			setcookie("token", $token, strtotime('+4 weeks'), '/');
			
			# Send them to the main page - or whever you want them to go
			Router::redirect("/users/profile");				
		}
	}
	
	#cannot get this to work with the view
	public function directory()	{
	
			# Setup the view
			$this->template->content = View::instance("v_users_profile");
			
			#Build a query of all the user's email and names
			$q =	"SELECT *
					FROM users";
					
			# Execute the query to get all the users. Store the result array in the variable $users
			$users = DB::instance(DB_NAME)->select_rows($q);
					
			# Pass $users data to the view
			$this->template->content->users  = $users;
			
			
			# Render the view
			echo $this->template;
	
	}

	public function profile() {

		# Not logged in
		if(!$this->user) {
			echo "Members only. <a href='/users/login/'>Please click here to return to the login page.</a>";
		#the following forces this method to exit
		return false;
		}

		# Setup the view
		$this->template->content = View::instance("v_users_profile");
		
		#Use info in variable $this->user to populate the tab on the browser
		$this->template->title = "Profile of ".$this->user->first_name." ".$this->user->last_name;
		
		# Load CSS / JS
			$client_files = Array(
				"/css/users.css",
				"/js/users.js",
			);
		
		/***------------------------------------------------------***/
		#To list the logged in user's posts
		#Build a query of this user's posts
		$q =	"SELECT*
				FROM posts
				WHERE posts.user_id = " .$this->user->user_id;
				
		#Execute the query, storing the results in a variable called $myposts
		$myposts = DB::instance(DB_NAME)->select_rows($q);
			
		#Pass data to the view
		$this->template->content->posts = $myposts;
		
		/***------------------------------------------------------***/
		#To spit out a random post
		#Build a query of all the user's email and names
		$q =	"SELECT *
				FROM posts 
				ORDER BY rand() LIMIT 1";
				
		# Execute the query to get the one row. Store the result array in the variable $randomp
		$randomp = DB::instance(DB_NAME)->select_rows($q);
				
		# Pass $users data to the view
		$this->template->content->users  = $randomp;
		/***------------------------------------------------------***/
		
		#This is loading the stylesheet and js
		$this->template->client_files = Utils::load_client_files($client_files);

		# Render the view
		echo $this->template;

		}	
		
	public function logout() {

		# Generate and save a new token for next login
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
	
		# Create the data array we'll use with the update method
		# In this case, we're only updating one field, so our array only has one entry
		$data = Array("token" => $new_token);
	
		# Do the update
		DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");
	
		# Delete their token cookie - effectively logging them out
		setcookie("token", "", strtotime('-1 year'), '/');
	
		# Send them back to the main landing page
		Router::redirect("/");

}

} # end of the class