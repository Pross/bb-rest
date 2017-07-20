<?php
final class FL_Rest{

	static function init(){

		foreach( glob( FL_Rest_Plugin::$path . '/routes/*.php' ) as $route ) {
			include $route;
		}
	}

	public static function get_id( $request, $setup = true ) {
		global $post;
		if( null !== $request->get_param( 'id' )){
			$request_param_id = $request->get_param( 'id' );
			$view = get_post( $request_param_id );
			if( $view != null ){
				$view_id = $view->ID;
			} else {
				$view_by_name = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM
				$wpdb->posts WHERE post_name = %s", $request_param_id ) );
				$view_id = $view_by_name->ID;
			}

			if( true === $setup ) {
				if( ! is_object( $post ) ) {
					$post = new stdClass;
				}
				$post->ID = $view_id;
			}
		}
		return $view_id;
	}

	static function strip_spaces( $txt ) {
		return preg_replace('/[\n\r\t\s]/', '', $txt );
	}
}
