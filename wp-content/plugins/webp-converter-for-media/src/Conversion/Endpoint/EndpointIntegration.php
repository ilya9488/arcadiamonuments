<?php

namespace WebpConverter\Conversion\Endpoint;

use WebpConverter\HookableInterface;
use WebpConverter\Service\NonceManager;

/**
 * Integrates endpoint class by registering REST API route.
 */
class EndpointIntegration implements HookableInterface {

	const ROUTE_NAMESPACE    = 'webp-converter/v1';
	const ROUTE_NONCE_PARAM  = 'nonce_token';
	const ROUTE_NONCE_ACTION = 'webpc_rest-%s';

	/**
	 * Objects of supported REST API endpoints.
	 *
	 * @var EndpointInterface
	 */
	private $endpoint_object;

	public function __construct( EndpointInterface $endpoint_object ) {
		$this->endpoint_object = $endpoint_object;
	}

	/**
	 * {@inheritdoc}
	 */
	public function init_hooks() {
		add_action( 'rest_api_init', [ $this, 'register_rest_route' ] );
	}

	/**
	 * Registers new endpoint in REST API.
	 *
	 * @return void
	 * @internal
	 */
	public function register_rest_route() {
		register_rest_route(
			self::ROUTE_NAMESPACE,
			$this->endpoint_object->get_route_name(),
			[
				'methods'             => \WP_REST_Server::ALLMETHODS,
				'permission_callback' => function () {
					return ( new NonceManager( $this->endpoint_object->get_url_lifetime(), false ) )
						->verify_nonce(
							$_REQUEST[ self::ROUTE_NONCE_PARAM ] ?? '', // phpcs:ignore WordPress.Security
							sprintf( self::ROUTE_NONCE_ACTION, $this->endpoint_object->get_route_name() )
						);
				},
				'callback'            => [ $this->endpoint_object, 'get_route_response' ],
				'args'                => $this->endpoint_object->get_route_args(),
			]
		);
	}
}
