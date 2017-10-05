<?php
namespace MBS\Lib;

/**
 * This class is used in the views to create helper functions for rendering HTML.
 */
class Helper {

	/**
	 * Generates an image path to a file name used for a theme asset. Do not use
	 * this function for fetching media!
	 *
	 * @param  string $file_name The name of the image file
	 * @param  array  $attrs     HTML attributes to be output. No sanitation here!
	 * 
	 * @return string            Markup to be echoed as HTML
	 */
	public function image_path( $file_name, $attrs = array() ) {

		$path   = MBIS_DIR_URL . '/public/images/' . $file_name;
		$markup = '<img src="' . $path . '"';

		if ( ! empty( $attrs ) ) {
			$attributes = array('');

			foreach ( $attrs as $key => $value ) {
				array_push( $attributes, $key . '="' . $value . '"' );
			}

			$markup = $markup . join( ' ', $attributes );
		}

		return $markup . '>';

	}

}
