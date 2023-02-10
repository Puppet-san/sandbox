<?php

/**
* @package TomTakPlugin
*/

namespace Src;

final class Init
{
	public static function get_services() 
	{
		return [
			Pages\Admin::class,
			Pages\Index::class,
			Base\Enqueue::class,
			Base\SettingsLinks::class,
			Base\CreateQuestionPostType::class
		];
	}
	
	public static function register_services() 
	{
		foreach( self::get_services() as $class) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register') ) {
				$service->register();
			}
		}
	}
	
	private static function instantiate( $class ) 
	{
		$service = new $class();
		
		return $service;
	}
}

class TomTakPlugin
{
	public $plugin;
	
	function __construct( ) {
		echo "Made it!2";
		add_action( 'init', array( $this, 'createQuestionPostType' ) ); 
		$this->plugin = plugin_basename( __FILE__ );
	}
	
	
	function register() {
				
	}
	
	function activate( ) {
		// generate custom post type
		$this->createQuestionPostType();
		
		Src\Base\Activate::activate();
	}
	
	function deactivate( ) {
		// flush rewrite rules
		Src\Base\Deactivate::deactivate();
	}
	
	static function uninstall( ) {
		Src\Base\Uninstall::uninstall();
	}
	
	static function createQuestionPostType() {
		
		echo "Made it!";
		Src\Base\CreateQuestionPostType::createQuestionPostType();
	}
	
}

if ( class_exists( 'TomTakPlugin' ) ) {
	$tomTakPlugin = new TomTakPlugin();
	$tomTakPlugin->register();
}