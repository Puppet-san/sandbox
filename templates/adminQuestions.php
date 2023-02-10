<?php
	
	
	global $wpdb;

	$questions = $wpdb->get_results( "SELECT * FROM {$wpdb->posts} WHERE post_type = 'question' AND post_status = 'publish'" ); // phpcs:ignore
	
?>




<h1>Question Settings</h1>


<!-- Question Menu -->
<div class="wrap">
	<div class='tt-questions'>
		<?php
			foreach ( $questions as $question ) {
				$lead = Src\Base\Question::createLead($question->post_content);
				echo "<div class='draggable'><details><summary><div class='tt-title'>{$question->post_title}<div class='corner'></div></div><div class='tt-lead'><p>{$lead}</p></div></summary><div class='tt-content'><p>{$question->post_content}</p></div></details></div>";
			}
		?>
		<button id="tt-new-question-button" type="button">New Question</button>
	</div>
</div>

<!-- New Question -->

<!-- Question Maker
<div id="tt-new-question">
	<div id="titlediv" class="wrap">
		<form action="" method="POST">
			<h1 class="wp-heading-inline">New Question</h1>
			<div id="title" class="title">
				<input id="title" type="text" name="post_title" placeholder="Question"></input>
			</div>
			<?php wp_editor( 'Your text goes here' , 'question-content', array('textarea_name'=>'question_content') ) ?>
			<input type="submit" name="submit" id="tt-submit-question" class="button button-primary" value="Add Question">
		</form>
	</div>
</div>
-->

<!-- Question Maker -->
<div id="tt-new-question">
	<div id="titlediv" class="wrap">
		<form id="question-form">
		  <div>
			<h1 class="wp-heading-inline">New Question</h1>
			<div id="title" class="title">
				<input id="title" type="text" name="post_title" placeholder="Question"></input>
			</div>
			<?php
			  $settings = array(
				'textarea_name' => 'question-content',
				'textarea_rows' => 10
			  );
			  wp_editor( 'Your text goes here', 'question-content', $settings );
			?>
		  </div>
		  <input id="tt-submit-question" type="submit" value="Submit">
		</form>
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('#question-form').submit(function(e) {
		e.preventDefault();

		console.log(this);
		//var formData = new FormData(this);
		var formData = {
			action: 'create_question',
			post_content: jQuery('#question-form #question-content').val()
		};
		$.ajax({
		  type: 'post',
		  dataType: 'json',
		  url: '<?php echo Src\Base\BaseController::ajax_url ?>',
		  data: formData,
		  processData: false,
		  contentType: false,
		  success: function(response) {
            if(response.type == "success") {
				console.log("test");
               // Update question display
            }
            else {
               alert("Error");
            }
		  },
		  error: function(xhr, textStatus, error) {
		  	console.log(xhr.responseText);
		  	console.log(xhr.statusText);
		  	console.log(textStatus);
		  	console.log(error);
		  }
		});
	  });
	});
		
</script>

<?php
	add_action( 'wp_ajax_create_question', 'create_question_handler' );
	add_action( 'wp_ajax_nopriv_create_question', 'create_question_handler' );

	function create_question_handler() {
		$data_str = print_r(  $_POST, true );
		error_log( $data_str );
		
		$question_content = $_POST['create_question'];
	
		$new_question = array(
			'post_title'    => 'Question ' . time(),
			'post_content'  => $question_content,
			'post_status'   => 'publish',
			'post_type'     => 'question',
		);
	
		$post_id = wp_insert_post( $new_question );
	
		if ( $post_id ) {			
			wp_redirect( $_SERVER['HTTP_REFERER'] );
			exit;
		} else {
			echo 'Error: Could not create the question';
			wp_die();
		}
	}
?>