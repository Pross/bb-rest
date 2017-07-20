<?php
final class FL_Rest{

	static function init(){

		foreach( glob( FL_Rest_Plugin::$path . '/routes/*.php' ) as $route ) {
			include $route;
		}
	}

	public static function get_id( $request ) {
		global $post;
		if( null !== $request->get_param( 'id' )){
			$request_param_id = $request->get_param( 'id' );
			$post = get_post( $request_param_id );
			return $post->ID;
		}
	}

	static function strip_spaces( $txt ) {
		return preg_replace('/[\n\r\t\s]/', '', $txt );
	}
}
