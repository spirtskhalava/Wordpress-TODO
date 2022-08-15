<?php
/*
  Plugin Name: Todo
  Description: todo task
  Version: 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


define('TODO_PLUGIN_PATH', dirname(__FILE__));
define('TODO_PLUGIN_URL' , WP_PLUGIN_URL . '/todo/' );

require_once( dirname(__FILE__) . '/classes/class-reports.php' );