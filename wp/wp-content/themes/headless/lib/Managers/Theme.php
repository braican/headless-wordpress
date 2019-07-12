<?php
/**
 * Manager for the theme.
 *
 * @package Headless
 */

namespace Headless\Managers;

/**
 * Sets up filters and actions for the theme.
 */
class Theme {
	/**
	 * Initialize.
	 */
	public static function init() {
		$theme = new self();

		$theme->add_theme_supports();
		$theme->add_nav_menus();
		$theme->add_settings_pages();

		add_action( 'init', array( $theme, 'add_image_sizes' ) );
	}

	/**
	 * Sets up theme support for specific features.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
	 *
	 * @return void
	 */
	private function add_theme_supports() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
	}

	/**
	 * Adds navigation menus.
	 *
	 * @return void
	 */
	private function add_nav_menus() {
		register_nav_menu( 'primary-navigation', 'Primary Navigation' );
		register_nav_menu( 'footer-navigation', 'Footer Navigation' );
	}

	/**
	 * Adds settings pages for theme options.
	 *
	 * @return void
	 */
	private function add_settings_pages() {
		if ( ! function_exists( 'acf_add_options_page' ) ) {
			return;
		}

		acf_add_options_page(
			array(
				'page_title' => 'Global Settings',
				'menu_title' => 'Global Settings',
				'menu_slug'  => 'global-settings',
			)
		);
	}

	/**
	 * Registers crops for images uploaded to WordPress.
	 *
	 * @return void
	 */
	public function add_image_sizes() {
		// Add two square crops.
		add_image_size( 'small_square', 480, 480, true );
		add_image_size( 'large_square', 1080, 1080, true );
	}

}
