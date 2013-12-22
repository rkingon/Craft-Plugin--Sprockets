<?php

namespace Craft;

class SprocketsService extends BaseApplicationComponent
{
	
	protected $devMode;
	protected $pipeline;
	protected $options;
	protected $configPaths = array();
	
	public function __construct()
	{
		// Are we devmode?!
		$this->devMode = craft()->config->get('devMode');
		
		// Get config path
		if(craft()->config->get('sprocketsPaths')){
			$this->configPaths = craft()->config->get('sprocketsPaths');
		}
		
		// Get our pipeline
		$paths = $this->_getPaths();
		$this->pipeline = new \Sprockets\Pipeline($paths);
		
		// Set our options
		$this->options = array(
			"minify" => !$this->devMode
		);
	}
	
	public function getAsset($type)
	{
		return "/".new \Sprockets\Cache($this->pipeline, $type, $vars = array(), $this->options);
	}
	
	private function _getPaths()
	{
		$defaults = array(
			"template" => array(
				"directories" => array(
				  "assets/"
				),
				"prefixes" => array(
				  "js" => "javascripts",
				  "css" => "stylesheets",
				  "img" => "images",
				  "font" => "fonts"
				)
			)
		);
		return array_merge($defaults, $this->configPaths);
	}
	
}