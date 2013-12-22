# Sprockets for Craft

Complete asset manager for Craft CMS. Craft wrapper for [PHP-Sprockets](https://github.com/Nami-Doc/Sprockets-PHP) with some modification so nodejs is not required for minifcation. This should be very familiar to those whom have used Rails.


## Installation

* Upload to craft/plugins/sprockets
* Create a folder named: "cache" in your public root dir & give it full write permissions (777).    
`mkdir cache; chmod 777 cache`
* Set the config to match your project, you can either use the default settings or override them in your config/general.
* Build your application file for css and js. (All your requires go into application.(css|js) - See below for an example)

## Features
* Precompile LESS, SASS, SCSS, CoffeeScript
* Compiles once, then caches file
* Asset hashed filenames for cache busting
* Minify's compiled files
* By-pass minifcation by setting: `devMode => true` in your craft config

## Usage
#### Stylesheet
`<link rel="stylesheet" href="{{ craft.sprockets.stylesheet }}" type="text/css">`

#### Javascript
`<script src="{{ craft.sprockets.javascript }}"></script>`

## Custom Config
_Note: These are actually the default values, but you can override them by editting and putting this in your craft config file._

    'sprocketsPaths' => array(
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
	)

* **Directories**  
is the parent directory where all of your assets live (css,js,images,fonts)  
* **Prefixes**  
is the individual folders for the asset type

## Example Project Structure

**File Structure**

    public
        assets
            stylesheets
                frameworks
                    bootstrap
                application.css
                _global.css.scss
                _fonts.css.scss
                _interface.css.scss
            javascripts
                application.js
                _app.js.coffee
            images
                logo.png
                example.jpg

**application.css**

    /**
     *= require_tree frameworks/bootstrap
     *= require _global
     *= require _fonts
     *= require _interface
     */

**application.js**

    //= require _app
    
For more details on directives, please see the [PHP-Sprockets](https://github.com/Nami-Doc/Sprockets-PHP) page