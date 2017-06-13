<?php

/*
Plugin Name: Fidget Spinner Widget
Plugin URI: http://ryan.hoover.ws
Description: A fidget spinner widget!
Version: 0.1
Author: ryanshoover
Author URI: http://ryan.hoover.ws
Text Domain: spinner
*/

namespace Spinner;

define( 'VERSION', '1.0' );
define( 'PATH', plugin_dir_path( __FILE__ ) );
define( 'URL', plugin_dir_url( __FILE__ ) );

require_once PATH . 'inc/core.php';
require_once PATH . 'inc/widget-spinner.php';
