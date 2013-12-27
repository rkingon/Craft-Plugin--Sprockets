<?php

namespace Craft;

class SprocketsVariable
{
	
	public function stylesheet($main_file = null)
	{
		return craft()->sprockets->getAsset('css', $main_file);
	}
	
	public function javascript($main_file = null)
	{
		return craft()->sprockets->getAsset('js', $main_file);
	}
	
}
