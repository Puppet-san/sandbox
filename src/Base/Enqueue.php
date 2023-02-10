<?php

/**
* @package TomTakPlugin
*/


namespace Src\Base;

use \Src\Base\BaseController;

class Enqueue extends BaseController
{
	
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}
	
	function enqueue() {
		// scripts
		wp_enqueue_style( 'mystyle', $this->plugin_url . 'assets/mystyle.css' );
		
		wp_register_script( "myscript", $this->plugin_url . 'assets/script.js', array('jquery') );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'myscript' );
		
		wp_localize_script( 'myscript', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
	}
}