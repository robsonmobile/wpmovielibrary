<?php
/**
 * Define the Details Widget class.
 *
 * @link       http://wpmovielibrary.com
 * @since      3.0
 *
 * @package    WPMovieLibrary
 * @subpackage WPMovieLibrary/includes/widgets
 */

namespace wpmoly\Widgets;

/**
 * Details Widget class.
 *
 * @since      3.0
 * @package    WPMovieLibrary
 * @subpackage WPMovieLibrary/includes/widgets
 * @author     Charlie Merland <charlie@caercam.org>
 */
class Details extends Widget {

	/**
	 * Widget default attributes.
	 * 
	 * @var    array
	 */
	protected $defaults = array(
		'title'       => '',
		'description' => '',
		'detail'      => '',
		'list'        => '',
		'css'         => ''
	);

	/**
	 * Set default properties.
	 * 
	 * @since    3.0
	 * 
	 * @return   void
	 */
	protected function make() {

		$this->id_base = 'details';
		$this->name = __( 'WPMovieLibrary Details', 'wpmovielibrary' );
		$this->description = __( 'Display a list of the available details: status, media and rating.', 'wpmovielibrary' );
	}

	/**
	 * Build Widget content.
	 * 
	 * @since    3.0
	 * 
	 * @return   void
	 */
	protected function build(  ) {

		$detail  = $this->get_attr( 'detail' );
		$details = wpmoly_o( 'default_details' );
		if ( ! empty( $details[ $detail ]['options'] ) ) {
			$details = $details[ $detail ]['options'];
		} else {
			$details = array();
		}

		$before_title = $this->get_arg( 'before_title' );
		$after_title  = $this->get_arg( 'after_title' );
		$widget_title = apply_filters( 'widget_title', $this->get_attr( 'title' ) );

		$this->data['title'] = $before_title . $widget_title . $after_title;
		$this->data['description'] = $this->get_attr( 'description' );
		$this->data['is_list'] = _is_bool( $this->get_attr( 'list' ) );
		$this->data['details'] = $details;
		$this->data['type'] = $detail;
	}

	/**
	 * Build Widget form content.
	 * 
	 * @since    3.0
	 * 
	 * @return   void
	 */
	protected function build_form() {

		if ( empty( $this->get_attr( 'title' ) ) ) {
			$this->set_attr( 'title', __( 'Statistics', 'wpmovielibrary' ) );
		}

		if ( empty( $this->get_attr( 'description' ) ) ) {
			$this->set_attr( 'description', '' );
		}

		$this->formdata['details'] = wpmoly_o( 'default_details' );
	}
}
