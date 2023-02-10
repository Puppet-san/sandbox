<?php

/**
* @package TomTakPlugin
*/

namespace Src\Base;

class Uninstall
{
	public static function uninstall() {
		// delete custom post type
		$questions = get_posts( array( 'post_type' => 'question', 'numberposts' => -1 ) );
		
		foreach( $question as $question ) {
			wp_delete_post( $book->ID, true );
		}
		// delete all plugin data from database
	}
}