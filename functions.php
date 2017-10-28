<?php
namespace MBS;

defined( 'ABSPATH' ) or die( 'It\'s a trap!' );

define( 'MBIS_DIR_PATH', get_template_directory() );
define( 'MBIS_DIR_URL',  get_template_directory_uri() );

require_once( MBIS_DIR_PATH . '/lib/autoloader.php' );
Lib\Autoloader::register();

use MBS\Config\Application;
use MBS\Lib\Helper;
use MBS\Lib\PageMetaBox;

// Start the theme!
new Application();

// View Helper functions
$helper = new Helper;
$meta_box = new PageMetaBox( 'navigation-css-meta-box-id', 'MBS Navigation Styles', 'page' );
