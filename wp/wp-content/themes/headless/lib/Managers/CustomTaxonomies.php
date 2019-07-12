<?php
/**
 * Manager for custom WordPress taxonomies.
 *
 * @package Headless
 */

namespace Headless\Managers;

/**
 * Adds custom post types.
 */
class CustomTaxonomies {
	/**
	 * Initialize.
	 */
	public static function init() {
		$custom_taxonomies = new self();

		add_action( 'init', array( $custom_taxonomies, 'register_taxonomies' ), 1 );
	}


	/**
	 * Registers custom post types via WordPress.
	 */
	public function register_taxonomies() {
		/**
		 * Template Type
		 */
		$template_type_labels = array(
			'name'                       => _x( 'Template Types', 'Taxonomy General Name' ),
			'singular_name'              => _x( 'Template Type', 'Taxonomy Singular Name' ),
			'menu_name'                  => __( 'Template Types' ),
			'all_items'                  => __( 'All Template Types' ),
			'parent_item'                => __( 'Parent Template Type' ),
			'parent_item_colon'          => __( 'Parent Template Type:' ),
			'new_item_name'              => __( 'New Template Type' ),
			'add_new_item'               => __( 'Add New Template Type' ),
			'edit_item'                  => __( 'Edit Template Type' ),
			'update_item'                => __( 'Update Template Type' ),
			'view_item'                  => __( 'View Template Type' ),
			'separate_items_with_commas' => __( 'Separate Template Types with commas' ),
			'add_or_remove_items'        => __( 'Add or remove Template Types' ),
			'choose_from_most_used'      => __( 'Choose from the most used' ),
			'popular_items'              => __( 'Popular Template Types' ),
			'search_items'               => __( 'Search Template Types' ),
			'not_found'                  => __( 'Not Found' ),
			'no_terms'                   => __( 'No Template Types' ),
			'items_list'                 => __( 'Template Types list' ),
			'items_list_navigation'      => __( 'Template Types list navigation' ),
		);

		$template_type_args = array(
			'labels'             => $template_type_labels,
			'description'        => 'The presentation styling applied to the content',
			'hierarchical'       => false,
			'public'             => true,
			'show_ui'            => true,
			'show_in_quick_edit' => false,
			'meta_box_cb'        => false,
			'show_admin_column'  => false,
			'show_in_nav_menus'  => true,
			'show_in_rest'       => false,
			'show_tagcloud'      => false,
		);

		register_taxonomy( 'template_type', array( 'post' ), $template_type_args );
	}

}
