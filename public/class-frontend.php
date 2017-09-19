<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://wpmovielibrary.com
 * @since      3.0
 *
 * @package    WPMovieLibrary
 */

namespace wpmoly;

use wpmoly\core\Assets;

/**
 * The public-facing functionality of the plugin.
 *
 * Register and enqueue public scripts, styles and templates.
 *
 * @package    WPMovieLibrary
 * 
 * @author     Charlie Merland <charlie@caercam.org>
 */
class Frontend extends Assets {

	/**
	 * Single instance.
	 *
	 * @var    \wpmoly\Frontend
	 */
	private static $instance = null;

	/**
	 * Singleton.
	 *
	 * @since    3.0
	 *
	 * @return   \wpmoly\Frontend
	 */
	final public static function get_instance() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new static;
		}

		return self::$instance;
	}

	/**
	 * Register scripts.
	 *
	 * @since    3.0
	 */
	protected function register_scripts() {

		// Vendor
		$this->register_script( 'sprintf',           'public/assets/js/sprintf.min.js',           array( 'jquery', 'underscore' ), '1.0.3' );
		$this->register_script( 'underscore-string', 'public/assets/js/underscore.string.min.js', array( 'jquery', 'underscore' ), '3.3.4' );

		// Base
		$this->register_script( 'core',              'public/assets/js/wpmoly.js', array( 'jquery', 'underscore', 'backbone', 'wp-backbone', 'wp-api' ) );
		$this->register_script( 'utils',             'public/assets/js/wpmoly-utils.js' );

		// Runners
		$this->register_script( 'grids',     'public/assets/js/wpmoly-grids.js',     array( 'jquery', 'underscore', 'backbone', 'wp-backbone', 'wp-api' ) );
		$this->register_script( 'headboxes', 'public/assets/js/wpmoly-headboxes.js', array( 'jquery', 'underscore', 'backbone', 'wp-backbone' ) );
	}

	/**
	 * Register frontend stylesheets.
	 *
	 * @since    3.0
	 */
	protected function register_styles() {

		// Plugin-wide normalize
		$this->register_style( 'normalize', 'public/assets/css/wpmoly-normalize-min.css' );

		// Main stylesheet
		$this->register_style( 'core',      'public/assets/css/wpmoly.css' );

		// Common stylesheets
		$this->register_style( 'common',    'public/assets/css/common.css' );
		$this->register_style( 'headboxes', 'public/assets/css/wpmoly-headboxes.css' );
		$this->register_style( 'grids',     'public/assets/css/wpmoly-grids.css' );
		$this->register_style( 'flags',     'public/assets/css/wpmoly-flags.css' );

		// Plugin icon font
		$this->register_style( 'font',      'public/assets/fonts/wpmovielibrary/style.css' );
	}

	/**
	 * Register frontend templates.
	 *
	 * @since    3.0
	 */
	protected function register_templates() {

		$this->register_template( 'grid',                      'public/assets/js/templates/grid/grid.php' );
		$this->register_template( 'grid-menu',                 'public/assets/js/templates/grid/menu.php' );
		$this->register_template( 'grid-customs',              'public/assets/js/templates/grid/customs.php' );
		$this->register_template( 'grid-settings',             'public/assets/js/templates/grid/settings.php' );
		$this->register_template( 'grid-pagination',           'public/assets/js/templates/grid/pagination.php' );

		$this->register_template( 'grid-error',                'public/assets/js/templates/grid/content/error.php' );
		$this->register_template( 'grid-empty',                'public/assets/js/templates/grid/content/empty.php' );

		$this->register_template( 'grid-movie-grid',           'public/assets/js/templates/grid/content/movie-grid.php' );
		$this->register_template( 'grid-movie-grid-variant-1', 'public/assets/js/templates/grid/content/movie-grid-variant-1.php' );
		$this->register_template( 'grid-movie-grid-variant-2', 'public/assets/js/templates/grid/content/movie-grid-variant-2.php' );
		$this->register_template( 'grid-movie-list',           'public/assets/js/templates/grid/content/movie-list.php' );
		$this->register_template( 'grid-actor-grid',           'public/assets/js/templates/grid/content/actor-grid.php' );
		$this->register_template( 'grid-actor-list',           'public/assets/js/templates/grid/content/actor-list.php' );
		$this->register_template( 'grid-collection-grid',      'public/assets/js/templates/grid/content/collection-grid.php' );
		$this->register_template( 'grid-collection-list',      'public/assets/js/templates/grid/content/collection-list.php' );
		$this->register_template( 'grid-genre-grid',           'public/assets/js/templates/grid/content/genre-grid.php' );
		$this->register_template( 'grid-genre-list',           'public/assets/js/templates/grid/content/genre-list.php' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    3.0
	 */
	public function enqueue_scripts() {

		$this->register_scripts();

		// Vendor
		$this->enqueue_script( 'sprintf' );
		$this->enqueue_script( 'underscore-string' );

		// Base
		$this->enqueue_script( 'core' );
		$this->enqueue_script( 'utils' );

		// Runners
		$this->enqueue_script( 'grids' );
		$this->enqueue_script( 'headboxes' );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    3.0
	 */
	public function enqueue_styles() {

		$this->register_styles();

		$this->enqueue_style( 'core' );
		$this->enqueue_style( 'common' );
		$this->enqueue_style( 'headboxes' );
		$this->enqueue_style( 'grids' );
		$this->enqueue_style( 'flags' );
		$this->enqueue_style( 'font' );
	}

	/**
	 * Print the JavaScript templates for the frontend area.
	 *
	 * TODO try not to include this where it's not needed.
	 *
	 * @since    3.0
	 */
	public function enqueue_templates() {

		$this->register_templates();

		$this->enqueue_template( 'grid' );
		$this->enqueue_template( 'grid-menu' );
		$this->enqueue_template( 'grid-customs' );
		$this->enqueue_template( 'grid-settings' );
		$this->enqueue_template( 'grid-pagination' );

		$this->enqueue_template( 'grid-empty' );
		$this->enqueue_template( 'grid-error' );

		$this->enqueue_template( 'grid-movie-grid' );
		$this->enqueue_template( 'grid-movie-grid-variant-1' );
		$this->enqueue_template( 'grid-movie-grid-variant-2' );
		$this->enqueue_template( 'grid-movie-list' );
		$this->enqueue_template( 'grid-actor-grid' );
		$this->enqueue_template( 'grid-actor-list' );
		$this->enqueue_template( 'grid-collection-grid' );
		$this->enqueue_template( 'grid-collection-list' );
		$this->enqueue_template( 'grid-genre-grid' );
		$this->enqueue_template( 'grid-genre-list' );
	}

	/**
	 * Register default filters for the plugin.
	 *
	 * @since    3.0
	 */
	public function set_default_filters() {

		$loader = Core\Loader::get_instance();

		// Shortcodes Meta Formatting
		$loader->add_filter( 'wpmoly/shortcode/format/adult/value',                '', 'get_formatted_movie_adult',              15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/author/value',               '', 'get_formatted_movie_author',             15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/budget/value',               '', 'get_formatted_movie_budget',             15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/certification/value',        '', 'get_formatted_movie_certification',      15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/composer/value',             '', 'get_formatted_movie_composer',           15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/director/value',             '', 'get_formatted_movie_director',           15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/homepage/value',             '', 'get_formatted_movie_homepage',           15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/cast/value',                 '', 'get_formatted_movie_cast',               15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/genres/value',               '', 'get_formatted_movie_genres',             15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/imdb_id/value',              '', 'get_formatted_movie_imdb_id',            15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/local_release_date/value',   '', 'get_formatted_movie_local_release_date', 15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/photography/value',          '', 'get_formatted_movie_photography',        15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/production_countries/value', '', 'get_formatted_movie_countries',          15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/production_companies/value', '', 'get_formatted_movie_production',         15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/producer/value',             '', 'get_formatted_movie_producer',           15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/release_date/value',         '', 'get_formatted_movie_release_date',       15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/revenue/value',              '', 'get_formatted_movie_revenue',            15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/runtime/value',              '', 'get_formatted_movie_runtime',            15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/spoken_languages/value',     '', 'get_formatted_movie_spoken_languages',   15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/tmdb_id/value',              '', 'get_formatted_movie_tmdb_id',            15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/writer/value',               '', 'get_formatted_movie_writer',             15, 2 );

		// Shortcodes Details Formatting
		$loader->add_filter( 'wpmoly/shortcode/format/format/value',               '', 'get_formatted_movie_format',             15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/language/value',             '', 'get_formatted_movie_language',           15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/media/value',                '', 'get_formatted_movie_media',              15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/rating/value',               '', 'get_formatted_movie_rating',             15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/status/value',               '', 'get_formatted_movie_status',             15, 2 );
		$loader->add_filter( 'wpmoly/shortcode/format/subtitles/value',            '', 'get_formatted_movie_subtitles',          15, 2 );

		// Widgets Details Formatting
		$loader->add_filter( 'wpmoly/widget/format/format/value',                  '', 'get_formatted_movie_format',             15, 2 );
		$loader->add_filter( 'wpmoly/widget/format/language/value',                '', 'get_formatted_movie_language',           15, 2 );
		$loader->add_filter( 'wpmoly/widget/format/media/value',                   '', 'get_formatted_movie_media',              15, 2 );
		$loader->add_filter( 'wpmoly/widget/format/rating/value',                  '', 'get_formatted_movie_rating',             15, 2 );
		$loader->add_filter( 'wpmoly/widget/format/status/value',                  '', 'get_formatted_movie_status',             15, 2 );
		$loader->add_filter( 'wpmoly/widget/format/subtitles/value',               '', 'get_formatted_movie_subtitles',          15, 2 );

		// Meta prefix
		$loader->add_filter( 'wpmoly/filter/actor/meta/key',      '', 'prefix_actor_meta_key',  15, 1 );
		$loader->add_filter( 'wpmoly/filter/collection/meta/key', '', 'prefix_collection_meta_key',  15, 1 );
		$loader->add_filter( 'wpmoly/filter/genre/meta/key',      '', 'prefix_genre_meta_key',  15, 1 );
		$loader->add_filter( 'wpmoly/filter/grid/meta/key',       '', 'prefix_grid_meta_key',  15, 1 );
		$loader->add_filter( 'wpmoly/filter/movie/meta/key',      '', 'prefix_movie_meta_key', 15, 1 );

		// Meta Formatting
		$loader->add_filter( 'wpmoly/filter/the/movie/actors',               '', 'get_formatted_movie_cast',               15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/adult',                '', 'get_formatted_movie_adult',              15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/author',               '', 'get_formatted_movie_author',             15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/budget',               '', 'get_formatted_movie_budget',             15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/cast',                 '', 'get_formatted_movie_cast',               15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/certification',        '', 'get_formatted_movie_certification',      15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/composer',             '', 'get_formatted_movie_composer',           15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/director',             '', 'get_formatted_movie_director',           15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/format',               '', 'get_formatted_movie_format',             15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/genres',               '', 'get_formatted_movie_genres',             15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/homepage',             '', 'get_formatted_movie_homepage',           15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/imdb_id',              '', 'get_formatted_movie_imdb_id',            15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/language',             '', 'get_formatted_movie_language',           15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/local_release_date',   '', 'get_formatted_movie_local_release_date', 15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/media',                '', 'get_formatted_movie_media',              15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/photography',          '', 'get_formatted_movie_photography',        15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/production_countries', '', 'get_formatted_movie_countries',          15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/production_companies', '', 'get_formatted_movie_production',         15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/producer',             '', 'get_formatted_movie_producer',           15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/rating',               '', 'get_formatted_movie_rating',             15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/release_date',         '', 'get_formatted_movie_release_date',       15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/revenue',              '', 'get_formatted_movie_revenue',            15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/runtime',              '', 'get_formatted_movie_runtime',            15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/spoken_languages',     '', 'get_formatted_movie_spoken_languages',   15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/status',               '', 'get_formatted_movie_status',             15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/subtitles',            '', 'get_formatted_movie_subtitles',          15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/tmdb_id',              '', 'get_formatted_movie_tmdb_id',            15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/writer',               '', 'get_formatted_movie_writer',             15, 2 );
		$loader->add_filter( 'wpmoly/filter/the/movie/year',                 '', 'get_formatted_movie_year',               15, 2 );

		// Meta Permalinks
		$loader->add_filter( 'wpmoly/filter/meta/adult/url',              '', 'get_movie_adult_url',            15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/author/url',             '', 'get_movie_author_url',           15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/budget/url',             '', 'get_movie_budget_url',           15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/certification/url',      '', 'get_movie_certification_url',    15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/composer/url',           '', 'get_movie_composer_url',         15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/homepage/url',           '', 'get_movie_homepage_url',         15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/imdb_id/url',            '', 'get_movie_imdb_id_url',          15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/local_release_date/url', '', 'get_movie_release_date_url',     15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/photography/url',        '', 'get_movie_photography_url',      15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/producer/url',           '', 'get_movie_producer_url',         15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/production/url',         '', 'get_movie_production_url',       15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/country/url',            '', 'get_movie_country_url',          15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/release_date/url',       '', 'get_movie_release_date_url',     15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/revenue/url',            '', 'get_movie_revenue_url',          15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/spoken_languages/url',   '', 'get_movie_spoken_languages_url', 15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/tmdb_id/url',            '', 'get_movie_tmdb_id_url',          15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/writer/url',             '', 'get_movie_writer_url',           15, 2 );
		$loader->add_filter( 'wpmoly/filter/meta/year/url',               '', 'get_movie_year_url',             15, 2 );

		// Details Permalinks
		$loader->add_filter( 'wpmoly/filter/detail/format/url',           '', 'get_movie_format_url',    15, 2 );
		$loader->add_filter( 'wpmoly/filter/detail/language/url',         '', 'get_movie_language_url',  15, 2 );
		$loader->add_filter( 'wpmoly/filter/detail/media/url',            '', 'get_movie_media_url',     15, 2 );
		$loader->add_filter( 'wpmoly/filter/detail/rating/url',           '', 'get_movie_rating_url',    15, 2 );
		$loader->add_filter( 'wpmoly/filter/detail/status/url',           '', 'get_movie_status_url',    15, 2 );
		$loader->add_filter( 'wpmoly/filter/detail/subtitles/url',        '', 'get_movie_subtitles_url', 15, 2 );

		// Queries
		$query = core\Query::get_instance();
		$loader->add_filter( 'wpmoly/filter/query/movies/alphabetical/preset/param',        $query, 'filter_alphabetical_movies_preset_param' );
		$loader->add_filter( 'wpmoly/filter/query/movies/unalphabetical/preset/param',      $query, 'filter_unalphabetical_movies_preset_param' );
		$loader->add_filter( 'wpmoly/filter/query/movies/current-year/preset/param',        $query, 'filter_current_year_movies_preset_param' );
		$loader->add_filter( 'wpmoly/filter/query/movies/last-year/preset/param',           $query, 'filter_last_year_movies_preset_param' );
		$loader->add_filter( 'wpmoly/filter/query/movies/last-added/preset/param',          $query, 'filter_last_added_movies_preset_param' );
		$loader->add_filter( 'wpmoly/filter/query/movies/first-added/preset/param',         $query, 'filter_first_added_movies_preset_param' );
		$loader->add_filter( 'wpmoly/filter/query/movies/last-released/preset/param',       $query, 'filter_last_released_movies_preset_param' );
		$loader->add_filter( 'wpmoly/filter/query/movies/first-released/preset/param',      $query, 'filter_first_released_movies_preset_param' );
		$loader->add_filter( 'wpmoly/filter/query/movies/incoming/preset/param',            $query, 'filter_incoming_movies_preset_param' );
		$loader->add_filter( 'wpmoly/filter/query/movies/most-rated/preset/param',          $query, 'filter_most_rated_movies_preset_param' );
		$loader->add_filter( 'wpmoly/filter/query/movies/least-rated/preset/param',         $query, 'filter_least_rated_movies_preset_param' );

		$loader->add_filter( 'wpmoly/filter/query/actors/alphabetical/preset/param',        $query, 'filter_alphabetical_actors_preset_param' );
		$loader->add_filter( 'wpmoly/filter/query/actors/unalphabetical/preset/param',      $query, 'filter_unalphabetical_actors_preset_param' );
		$loader->add_filter( 'wpmoly/filter/query/collections/alphabetical/preset/param',   $query, 'filter_alphabetical_collections_preset_param' );
		$loader->add_filter( 'wpmoly/filter/query/collections/unalphabetical/preset/param', $query, 'filter_unalphabetical_collections_preset_param' );
		$loader->add_filter( 'wpmoly/filter/query/genres/alphabetical/preset/param',        $query, 'filter_alphabetical_genres_preset_param' );
		$loader->add_filter( 'wpmoly/filter/query/genres/unalphabetical/preset/param',      $query, 'filter_unalphabetical_genres_preset_param' );

		$loader->add_filter( 'wpmoly/filter/query/movies/actor/param',                      $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/adult/param',                      $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/author/param',                     $query, 'filter_meta_author_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/budget/param',                     $query, 'filter_meta_interval_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/certification/param',              $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/company/param',                    $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/composer/param',                   $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/country/param',                    $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/director/param',                   $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/format/param',                     $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/genre/param',                      $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/language/param',                   $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/languages/param',                  $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/local_release/param',              $query, 'filter_meta_interval_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/media/param',                      $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/photography/param',                $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/producer/param',                   $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/rating/param',                     $query, 'filter_meta_interval_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/release/param',                    $query, 'filter_meta_interval_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/revenue/param',                    $query, 'filter_meta_interval_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/runtime/param',                    $query, 'filter_meta_interval_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/status/param',                     $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/subtitles/param',                  $query, 'filter_meta_query_param', 10, 4 );
		$loader->add_filter( 'wpmoly/filter/query/movies/writer/param',                     $query, 'filter_meta_query_param', 10, 4 );

		$loader->add_filter( 'wpmoly/filter/query/movies/actor/value',                      $query, 'filter_actor_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/adult/value',                      $query, 'filter_adult_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/author/value',                     $query, 'filter_author_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/budget/value',                     $query, 'filter_money_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/certification/value',              $query, 'filter_certification_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/company/value',                    $query, 'filter_company_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/composer/value',                   $query, 'filter_composer_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/country/value',                    $query, 'filter_country_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/director/value',                   $query, 'filter_director_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/format/value',                     $query, 'filter_format_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/genre/value',                      $query, 'filter_genre_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/language/value',                   $query, 'filter_language_query_var', 10, 2 );
		add_filter( 'wpmoly/filter/query/movies/languages/value',                  $query, 'filter_languages_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/local_release/value',              $query, 'filter_release_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/media/value',                      $query, 'filter_media_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/photography/value',                $query, 'filter_photography_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/producer/value',                   $query, 'filter_producer_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/rating/value',                     $query, 'filter_rating_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/release/value',                    $query, 'filter_release_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/revenue/value',                    $query, 'filter_money_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/runtime/value',                    $query, 'filter_runtime_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/status/value',                     $query, 'filter_status_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/subtitles/value',                  $query, 'filter_subtitles_query_var', 10, 2 );
		$loader->add_filter( 'wpmoly/filter/query/movies/writer/value',                     $query, 'filter_writer_query_var', 10, 2 );

		$loader->add_filter( 'wpmoly/filter/query/movies/rating/type',                      $query, 'filter_rating_query_type', 10, 2 );
	}

	/**
	 * Register the Shortcodes.
	 *
	 * @since    3.0
	 */
	public function register_shortcodes() {

		if ( is_admin() ) {
			return false;
		}

		$shortcodes = array(
			'\wpmoly\shortcodes\Grid',
			'\wpmoly\shortcodes\Headbox',
			'\wpmoly\shortcodes\Images',
			'\wpmoly\shortcodes\Metadata',
			'\wpmoly\shortcodes\Detail',
			'\wpmoly\shortcodes\Countries',
			'\wpmoly\shortcodes\Languages',
			'\wpmoly\shortcodes\Local_Release_Date',
			'\wpmoly\shortcodes\Release_Date',
			'\wpmoly\shortcodes\Runtime',
		);

		foreach ( $shortcodes as $shortcode ) {
			$shortcode::register();
		}
	}

	/**
	 * Display the movie Headbox along with movie content.
	 *
	 * If we're in search or archive templates, show the default, minimal
	 * Headbox; if we're in single template, show the default full Headbox.
	 *
	 * @since    3.0
	 *
	 * @param    string    $content Post content.
	 *
	 * @return   string
	 */
	public function the_headbox( $content ) {

		if ( 'movie' != get_post_type() ) {
			return $content;
		}

		$movie = get_movie( get_the_ID() );
		$headbox = get_headbox( $movie );

		if ( is_single() ) {
			$headbox->set_theme( 'extended' );
		} elseif ( is_archive() || is_search() ) {
			$headbox->set_theme( 'default' );
		}

		$template = get_movie_headbox_template( $headbox );

		return $template->render() . $content;
	}

	/**
	 * Register Widgets.
	 *
	 * @since    3.0
	 */
	public function register_widgets() {

		$widgets = array(
			'\wpmoly\widgets\Statistics',
			'\wpmoly\widgets\Details',
			'\wpmoly\widgets\Grid',
		);

		foreach ( $widgets as $widget ) {
			if ( class_exists( $widget ) ) {
				register_widget( $widget );
			}
		}
	}

}
