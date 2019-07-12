<?php
/**
 * Manager for custom WordPress post types.
 *
 * @package Headless
 */

namespace Headless\Managers;

/**
 * Adds custom post types.
 */
class CustomPostTypes {
	/**
	 * Initialize.
	 */
	public static function init() {
		$custom_post_types = new self();

		add_action( 'init', array( $custom_post_types, 'register_post_types' ), 1 );
	}


	/**
	 * Registers custom post types via WordPress.
	 */
	public function register_post_types() {
		/**
		 * Recipe
		 */
		$recipe_labels = array(
			'name'          => __( 'Recipes' ),
			'singular_name' => __( 'Recipe' ),
			'add_new_item'  => __( 'Add New Recipe' ),
		);

		register_post_type(
			'author',
			array(
				'labels'        => $recipe_labels,
				'public'        => true,
				'has_archive'   => true,
				'menu_position' => 5,
				'menu_icon'     => 'dashicons-text-page',
				'rewrite'       => array( 'slug' => 'recipes' ),
				'supports'      => array( 'editor', 'title', 'thumbnail' ),
				'taxonomies'    => array(),
			)
		);
	}

}
