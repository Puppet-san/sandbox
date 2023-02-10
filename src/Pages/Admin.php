<?php

/**
* @package TomTakPlugin
*/


namespace Src\Pages;

use \Src\Api\SettingsApi;
use \Src\Base\BaseController;
use \Src\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
	public $settings;
	
	public $callbacks;
	
	public $pages = array();
	
	public $subpages = array();

	public function register() 
	{		
		$this->settings = new SettingsApi();
		
		$this->callbacks = new AdminCallbacks();
		
		$this->setPages();
		
		$this->setSubPages();
		
		$this->setSettings();
		
		$this->setSections();
		
		$this->setFields();
		
		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages)->register();
	}
	
	public function setPages()
	{
		$this->pages = [
			[ 
			'page_title' => 'Q&A Settings', 
			'menu_title' => 'TomTak Q&A',
			'capability' => 'manage_options', 
			'menu_slug' => 'tomtak_plugin', 
			'callback' => array( $this->callbacks, 'adminDashboard' ), 
			'icon_url' => 'dashicons-testimonial', 
			'position' => 110
			]
		];
	}
	
	public function setSubPages()
	{
		$this->subpages = [
			[ 
			'parent_slug' => 'tomtak_plugin',
			'page_title' => 'Questions', 
			'menu_title' => 'Questions',
			'capability' => 'manage_options', 
			'menu_slug' => 'tomtak_questions', 
			'callback' => array( $this->callbacks, 'adminQuestions' )
			]
		];
	}
	
	public function admin_index() 
	{
		// require template
		require_once this->$plugin_path . 'templates/admin.php';
	}
	
	public function setSettings()
	{
		$args = [
			[
				'option_group' => 'tomtak_plugin_settings',
				'option_name' => 'archive_page',
				'callback' => array( $this->callbacks, 'labelSanitize' )
			]
		];	
		
		$this->settings->setSettings( $args );
	}
	
	public function setSections()
	{
		$args = [
			[
				'id' => 'tomtak_plugin_section_0',
				'title' => 'Settings',
				'callback' => array( $this->callbacks, 'sectionMain' ),
				'page' => 'tomtak_plugin'
			]
		];	
		
		$this->settings->setSections( $args );
	}
	
	public function setFields()
	{
		$args = [
			[
				'id' => 'Settings',
				'title' => 'Archive Page',
				'callback' => array( $this->callbacks, 'settingPage' ),
				'page' => 'tomtak_plugin',
				'section' => 'tomtak_plugin_section_0',
				'args' => array(
					'label_for' => 'Archive Page',
					'class' => 'setting-page'
				),
			]
		];	
		
		$this->settings->setFields( $args );
	}
}