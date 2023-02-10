<?php

/**
* @package TomTakPlugin
*/

namespace Src\Api\Callbacks;
use \Src\Base\BaseController;

class QuestionCallbacks extends BaseController
{
	
	public function metaHeader()
	{
		return require_once( "$this->plugin_path/templates/metaHeader.php" );
	}
	
}