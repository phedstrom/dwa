<?php
class search_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	public function index() {
		echo "Welcome to the search department";
	}
	
	public function search() {
		
		# Setup view
			$this->template->content = View::instance('v_search_form');
			$this->template->title   = "Search Form";
			
		# Render template
			echo $this->template;
	}
	
	public function results() {
		
		# Setup view
		$this->template->content = View::instance('v_search_results');
		$this->template->title   = "Search Results";
			
		/***-- Begin cleanup and appending user data - modified from HeadFirst MySql --***/
		
		#put all the form input into a string to store it
		$search_terms = $_POST['search_terms'];
		
		#need to pre-process data to strip out commas using str_replace() - parameter 1 is text to find, 2 is what to replace it with
		#extract the search keywords into an array
		$clean_search = str_replace(',' , ' ', $search_terms);
		
		#explode() function chops a string into an array of substrings based on first parameter that defines where it separates/delimits, and the string to be exploded
		$search_words = explode(' ', $clean_search);

		#create a finally cleaned array of search words
		$final_search_words = array();

		##loop through string to add words that will build the search query
		#loop through each element of the $search_word array and if it's not empty, add it to $final_search_words
		if (count($search_words) > 0) {
			foreach ($search_words as $word) {
				if (!empty($word)) {
					$final_search_words[] = $word;
				}
			}
		}
		
		#generate a WHERE clause using all the search keywords in $final_search_words array
		$where_list = array();
		#insert search words to an array with Mysql query terms attached
		if (count($final_search_words) > 0) {
			foreach($final_search_words as $word) {
				$where_list[] = "content LIKE '%$word%'";
			}
		}
		
		#implode() function takes an array of strings and builds a single string out of them
		#this prevents an additional "OR" from being added if we just used explode()
		#the delimiter OR has a space on either side of it
		$where_clause = implode(' OR ', $where_list);
		
		/**--End of user data cleanup --**/ 
		
		# Build a query being specific about what is returned so there's no ambiguity between user created or post created
		$search_query = "SELECT posts.*, users.user_id, users.first_name, users.last_name
			 FROM posts
			 JOIN users USING (user_id)";
		
		#make sure the WHERE clause isn't empty before appending it to the search query
		if (!empty($where_clause)) {
			$search_query .= " WHERE $where_clause";
		}
		
		#run a second query with the appended user data
		$q = $search_query;
		$searched = DB::instance(DB_NAME)->select_rows($q);
		
		#create a datestamp to be used to calculate age of posts
		$current_time = Time::now();	
		
		# Pass data to the view
		$this->template->content->searched = $searched;
		$this->template->content->current_time = $current_time;
		$this->template->content->search_terms = $search_terms;
		
		# Render template
			echo $this->template;
		
	}
	
} # end of the class