<?php

/**
* @package TomTakPlugin
* Plugin Name: TomTak Q&A Plugin
* Plugin URI: https://www.sandbox.com/
* Description: Sandbox
* Version: 1.0
* Author: Puppet
* Author URI: https://www.sandbox.com/
**/

defined( 'ABSPATH') or die( 'How did you get here?' );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' )) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

use Src\Base\Activate;
use Src\Base\Deactivate;

function activate_tomtak_plugin() {
	Activate::activate();
}

function deactivate_tomtak_plugin() {
	Deactivate::deactivate();
}

register_activation_hook( __FILE__, 'activate_tomtak_plugin' );
register_activation_hook( __FILE__, 'deactivate_tomtak_plugin' );

if ( class_exists( 'Src\\Init' ) ) {
	Src\Init::register_services();
}