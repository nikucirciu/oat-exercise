<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class JsonEncoderMiddleware
{
	/**
	 * @param ServerRequestInterface $request
	 * @param ResponseInterface $response
	 * @param callable $next
	 * @return ResponseInterface
	 */
	public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next): ResponseInterface
	{
		/**
		 * @type JsonResponse $result
		 */
		$result = $next($request, $response);

		$data = $result->getData();
		if($data !== null)
		{
			$result->write(json_encode($data, JSON_PRETTY_PRINT));
		}

		return $result->withHeader('Content-Type', 'application/json');
	}
}
