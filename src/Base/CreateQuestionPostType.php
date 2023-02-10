<?php

/**
* @package TomTakPlugin
*/

namespace Src\Base;
use \Src\Base\BaseController;
use \Src\Api\Callbacks\QuestionCallbacks;

class CreateQuestionPostType extends BaseController
{
	public $callbacks;
	
	public function register() {
		$this->callbacks = new QuestionCallbacks();
		
		add_action( 'init', array( $this, 'createQuestionPostType' ) ); 
	}
	
	public function createQuestionPostType()
	{
		register_post_type( 'question', 
			[
				'public' => true,
				'label' => 'Questions',
				'description' => 'Make a commonly asked question and provide an answer. Answers can be displayed in a single Q&A Page.'
			]);
			
		add_action( 'add_meta_boxes_question', array( $this, 'addHeaderMetaBox' ) );
	}
	
	function addHeaderMetaBox()
	{
		add_meta_box(
			'question-header',
			'Question Header',
			array( $this->callbacks, 'metaHeader' ),
			null,
			'advanced',
			'core'
		);
	}
}