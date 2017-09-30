<?php
namespace MBS\Lib;

/**
 * Autoloader class will autoload objects based on their name and the matching
 * directory structure.
 *
 * It expects objects to be PascalCase when defining objects and snake_case
 * when creating file and directory names.
 */
class Autoloader {

	/**
	 * Constant defining the namespace used throughout the application.
	 *
	 * @var string
	 */
	private static $namespace = 'MBS';

	/**
	 * Register the Autoload object
	 *
	 * @return void
	 */
	public static function register() {

		spl_autoload_register( array( __CLASS__, 'autoload' ) );

	}

	/**
	 * Autoload classes based on their name and the directory structure.
	 *
	 * @param  string $class The name of the class
	 * @return string|false  The path to the file or false if the file doesn't exist
	 */
	public static function autoload( $class ) {

		$class = ltrim( $class, '\\' );

		if ( 0 !== strpos( $class, self::$namespace ) ) return;

		$class = str_replace( self::$namespace , '', $class );
		$class = preg_replace( '/([a-zA-Z])(?=[A-Z])/', '$1_', $class );
		$file  = self::filename( $class );

		if ( is_file( $file ) ) {
			require_once( $file );
			return( $file );
		} else {
			return false;
		}

	}

	/**
	 * Determines the name of the file to load.
	 *
	 * @param  string $class The name of the class
	 * @return string        [description]
	 */
	private static function filename( $class ) {

		$base_file_path = strtolower( str_replace( '\\', DIRECTORY_SEPARATOR, $class ) ) . '.php';
		$full_file_path = MBIS_DIR_PATH . ltrim( $base_file_path, '\\' );

		return $full_file_path;

	}

}
