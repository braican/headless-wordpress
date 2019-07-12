<?php
/**
 * Headless theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Headless
 */

define( 'HEADLESS_THEME_URI', get_template_directory_uri() );
define( 'HEADLESS_THEME_PATH', dirname( __FILE__ ) . '/' );

// Autoload theme classes from the `lib/` directory with our theme's autoloader. Including the
// `lib/` directory in the `autoload` section of our composer.json file and using Composer's
// autoloader breaks functionality with the s3-uploads plugin.
require_once __DIR__ . '/autoload.php';

add_action(
	'after_setup_theme',
	function () {
		// Set up the theme, including some content filters.
		$headless_theme = Headless\Managers\Theme::init();

		// And initialize the API.
		$headless_api = Headless\Managers\Api::init();

		// And add the custom post types and taxonomies.
		$headless_post_types = Headless\Managers\CustomPostTypes::init();
		$headless_taxonomies = Headless\Managers\CustomTaxonomies::init();
	},
	999
);
