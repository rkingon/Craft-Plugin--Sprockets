<?php
namespace Sprockets\Filter\Minifier;

use MatthiasMullie\Minify;

class Js extends Base
{
	public function __invoke($files, $content, $pipeline)
	{
		// set pipeline
		$this->setPipeline($pipeline);
		
		$cache_file = $this->getCacheDir($hash = md5(implode('*', $files)) . '|js', __CLASS__);
		$js_cache_file = str_replace('.js', '.minified.js', $cache_file);
#		$source_map = str_replace('.js', '.js.map', $cache_file);

		$cache_dir = trim(str_replace('\\', '/', $this->getCacheDir()), '/');

		if (file_exists($js_cache_file))
			return file_get_contents($js_cache_file);

		if (!file_exists($cache_file))
			file_put_contents($cache_file, $content);

		$min = new Minify\JS($cache_file);
		file_put_contents($js_cache_file, $min->minify());

		// wtf is that ireplace crap
		return file_get_contents($js_cache_file);
	}
}