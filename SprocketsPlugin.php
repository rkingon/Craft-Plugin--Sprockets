<?php

namespace Craft;

class SprocketsPlugin extends BasePlugin
{
	public function getName()
	{
		return Craft::t('Sprockets');
	}

	public function getVersion()
	{
		return '1.0';
	}

	public function getDeveloper()
	{
		return 'Roi Kingon';
	}

	public function getDeveloperUrl()
	{
		return 'http://www.roikingon.com';
	}
	
	public function init()
	{
		// Get our auto loader
		Craft::import('plugins.sprockets.vendor.autoload',true);
	}
}
