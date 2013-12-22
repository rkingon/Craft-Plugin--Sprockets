<?php

namespace Craft;

class SprocketsVariable
{
	
	public function stylesheet()
	{
		return craft()->sprockets->getAsset('css');
	}
	
	public function javascript()
	{
		return craft()->sprockets->getAsset('js');
	}
	
}
