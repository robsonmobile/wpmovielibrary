<?php
/**
 * REST API:Movies_Controller class.
 *
 * @link https://wpmovielibrary.com
 * @since 3.0.0
 *
 * @package WPMovieLibrary
 */

namespace wpmoly\rest\controllers;

use wpmoly\rest\fields\Movie_Meta;
use WP_REST_Posts_Controller;

/**
 * Core class to access movies via the REST API.
 *
 * @see WP_REST_Posts_Controller
 *
 * @since 3.0.0
 * @package WPMovieLibrary
 *
 * @author Charlie Merland <charlie@caercam.org>
 */
class Movies extends WP_REST_Posts_Controller {

	/**
	 * Constructor.
	 *
	 * @since 3.0.0
	 *
	 * @param string $post_type Post type.
	 */
	public function __construct( $post_type ) {

		$this->post_type = $post_type;
		$this->namespace = 'wp/v2';
		$obj = get_post_type_object( $post_type );
		$this->rest_base = ! empty( $obj->rest_base ) ? $obj->rest_base : $obj->name;

		$this->meta = new Movie_Meta( $this->post_type );
	}
}