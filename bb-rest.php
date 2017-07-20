<?php
/**
 * Plugin Name: bb-rest
 * Plugin URI:
 * Description: Rest
 * Version: 0.1
 * Author: The Beaver Builder Team
 * Author URI: https://www.wpbeaverbuilder.com/?utm_medium=bb&utm_source=plugins-admin-page&utm_campaign=plugins-admin-author
 * Copyright: (c) 2017 Beaver Builder
 * License: GNU General Public License v2.0
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: fl-rest
 */
class FL_Rest_Plugin {

	public static $path;

	public static function init() {
		self::$path = dirname( __FILE__ );
		if( class_exists( 'WP_REST_Request' ) ) {
			require_once 'classes/class-fl-builder-rest.php';
			FL_Rest::init();
		}
	}
}
FL_Rest_Plugin::init();
