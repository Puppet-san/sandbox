<?php

/**
* @package TomTakPlugin
*/

namespace Src\Base;

class Activate
{
	public static function activate() {
		
		// flush rewrite rules
		flush_rewrite_rules();
	}
}