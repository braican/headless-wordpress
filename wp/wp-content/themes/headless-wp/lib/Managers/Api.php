<?php
/**
 * Sets up the Headless API.
 *
 * @link https://developer.wordpress.org/rest-api/
 *
 * @package Headless
 */

namespace Headless\Managers;

/**
 * Builds the API and sets up endpoints for the Headless content.
 */
class Api {
	/**
	 * API namespace.
	 *
	 * @var string
	 */
	public $namespace = 'headless/v1';

	/**
	 * Initialize.
	 */
	public static function init() {
		$api = new self();

		// Create endpoints.
		add_action( 'rest_api_init', array( $api, 'setup_endpoints' ) );
	}


	/**
	 * Register custom endpoints.
	 *
	 * @return void
	 */
	public function setup_endpoints() {
		register_rest_route(
			$this->namespace,
			'/globals',
			array(
				'methods'  => 'GET',
				'callback' => function() {
					return array(
						'test' => 'foo',
					);
				},
			)
		);
	}
}

