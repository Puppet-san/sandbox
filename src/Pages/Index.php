<?php

/**
* @package TomTakPlugin
*/


namespace Src\Pages;

use \Src\Base\BaseController;
use \Src\Api\Callbacks\QuestionCallbacks;

class Index extends BaseController
{
	
	public $callbacks;
	
	public $questions = array();

	public function register() 
	{		
		$this->callbacks = new QuestionCallbacks();
		
		/* $this->getQuestions(); */
		
		/* $this->createIndexPage(); */
		
	}
	
	public function createIndexPage() {
		do_action( wp_insert_post, [
			"post_name" => "Question Index",
			"post_title" => "Frequently Asked Questions"
		]);
	}
	
	/* public function getQuestions()
	{
		$args = array(
			'post_type' => 'question',
			'post_status' => 'publish',
			'posts_per_page' => 8,
			'orderby' => 'title',
			'order' => 'ASC',
		);
		
		$loop = new WP_Query( $args );
		
		while( $loop->have_posts() ) : $loop->the_post();
			print the_title();
			the_excerpt();
		endwhile;
		
		wp_reset_postdata();
		
	//	global $wpdb;
		
	//	// update to only get necessary questions for page rather than all questions lol
	//	$this->questions = $wpdb->get_var( "SELECT * FROM $wpdb->questions");
		
	//	echo "<p>{$this->questions}</p>";
	} */
	
}