<?php
class FL_Rest_CSS extends WP_REST_Request {

	public static function init(){
		add_action( 'rest_api_init', function () {
		    register_rest_route( 'fl-builder/v1/css', '/(?P<id>[a-zA-Z-_0-9]+)', array(
			    'methods' => WP_REST_Server::READABLE,
			    'callback' => array( __CLASS__, 'callback' )
			) );
		});
	}
	static function callback( $request ){

		$post_id = FL_Rest::get_id( $request );

		return FL_Rest::strip_spaces( FLBuilder::render_css( false ) );
	}
}
FL_Rest_CSS::init();
