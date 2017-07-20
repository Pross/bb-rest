<?php
class FL_Rest_Content extends WP_REST_Request {

	public static function init(){
		add_action( 'rest_api_init', function () {
		    register_rest_route( 'fl-builder/v1/', '(?P<id>\d+)', array(
			    'methods' => WP_REST_Server::READABLE,
			    'callback' => array( __CLASS__, 'callback' )
			) );
		});
	}
	static function callback( $request ){

		$post_id = FL_Rest::get_id( $request );

		ob_start();

		FLBuilder::render_content_by_id( $post_id );

		$content = ob_get_clean();

		$output = new stdClass;

		$output->id   = $post_id;
		$output->html = $content;
		$output->css  = FLBuilder::render_css( false );
		$output->js   = FLBuilder::render_js( false );
		return $output;
	}
}
FL_Rest_Content::init();
