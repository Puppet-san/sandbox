<?php

/**
* @package TomTakPlugin
*/


namespace Src\Base;

class BaseController
{
	public $plugin_path;
	
	public function __construct() {
		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/tomtak-plugin.php';
		$this->ajax_url = admin_url( 'admin-ajax.php' );
        //$this->ajax_nonce = wp_create_nonce( 'secure_nonce_name' );
	}
}