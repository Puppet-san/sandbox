<?php

/**
* @package TomTakPlugin
*/

namespace Src\Api\Callbacks;
use \Src\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}
	
	public function adminQuestions()
	{
		return require_once( "$this->plugin_path/templates/adminQuestions.php" );
	}
	
	public function adminPages()
	{
		return require_once( "$this->plugin_path/templates/adminPages.php" );
	}
	
	public function adminDisplay()
	{
		return require_once( "$this->plugin_path/templates/adminDisplay.php" );
	}
	
	public function labelSanitize( $input )
	{
		return filter_var($input, FILTER_SANITIZE_STRING);
	}
	
	public function sectionMain()
	{
		return 'Empty';
	}
	
	// Why is this broken? Fix it later.
	public function settingPage()
	{
		$value = esc_attr( get_option( 'text_example' ) );
		
		echo '
			<a href="">View</a>
			';
	}
}