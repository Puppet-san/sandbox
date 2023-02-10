<?php

/**
* @package TomTakPlugin
*/

namespace Src\Base;

// define the actions for the two hooks created, first for logged in users and the next for logged out users
//add_action("wp_ajax_create_question", Question::createQuestion );
//add_action("wp_ajax_nopriv_create_question", null );

class Question
{
	public static function createLead( string $string ) {
		$max_length = 160; // this is in specifications
		if ( strlen($string) <= $max_length) return $string;
		return substr($string, 0, strpos(wordwrap(str_replace("\n", "", $string), $max_length), "\n"));
	}
	
	public static function createQuestion( ) {
		//nonce
		
		
	}
}
