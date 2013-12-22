<?php
namespace Sprockets\Filter\Minifier;

use MatthiasMullie\Minify;

class Css extends Base
{
	public function __invoke($files, $content, $pipeline)
	{
		// set pipeline
		$this->setPipeline($pipeline);
		
		//@todo md5 thousands of lines is stupid, what can I do ?
		$cache_file = $this->getCacheDir(md5($content) . '|css', __CLASS__);
		if (file_exists($css_cache_file = str_replace('.css', '.minified.css', $cache_file)))
			return file_get_contents($css_cache_file);

		if (!file_exists($cache_file))
			file_put_contents($cache_file, $content);
		
		$min = new Minify\CSS($cache_file);
		file_put_contents($css_cache_file, $min->minify());
		
		return file_get_contents($css_cache_file);
	}
}