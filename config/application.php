<?php
namespace MBS\Config;

/**
 * Controls the configuration of the theme. Registers the actions and fitlers
 * used to control the theme.
 */
class Application {

	/**
	 * Sets up the theme whenever this object is instantiated. It should only
	 * happen one time, upon page load.
	 */
	function __construct() {

		add_action( 'after_setup_theme', array( $this, 'init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );

	}

	/**
	 * Initialize the theme and register necessary components.
	 *
	 * @return void
	 */
	public function init() {
	}

	/**
	 * Define the stylesheets and javascripts used for this theme
	 *
	 * @return void
	 */
	public function enqueue_styles() {

		// Stylesheets
		wp_enqueue_style( 'mbs-theme-google-fonts', '//fonts.googleapis.com/css?family=Lato:400,700', array() );
		wp_enqueue_style( 'mbs-theme-bootstrap4', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css', array() );
		wp_enqueue_style( 'mbs-theme-style', MBIS_DIR_URL . '/public/stylesheets/mbs.css', array() );

		// Javascripts
		wp_enqueue_script( 'mbs-theme-js-bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'mbs-theme-javascript', MBIS_DIR_URL . '/public/javascripts/mbs-min.js', array( 'jquery' ), '1.0.0', true );
	}

}
