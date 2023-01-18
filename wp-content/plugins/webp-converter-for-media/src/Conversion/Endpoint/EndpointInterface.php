<?php

namespace WebpConverter\Conversion\Endpoint;

/**
 * Interface for class that supports endpoint.
 */
interface EndpointInterface {

	/**
	 * Returns route of endpoint.
	 *
	 * @return string
	 */
	public function get_route_name(): string;

	/**
	 * Returns expiration time in seconds of endpoint URL.
	 *
	 * @return int
	 */
	public function get_url_lifetime(): int;

	/**
	 * Returns list of params for endpoint.
	 *
	 * @return mixed[]
	 */
	public function get_route_args(): array;

	/**
	 * Returns URL of endpoint.
	 *
	 * @return string
	 */
	public function get_route_url(): string;

	/**
	 * Returns response to endpoint.
	 *
	 * @param \WP_REST_Request $request REST request object.
	 *
	 * @return \WP_REST_Response|\WP_Error
	 * @internal
	 */
	public function get_route_response( \WP_REST_Request $request );
}
