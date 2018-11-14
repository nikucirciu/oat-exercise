<?php

use Slim\Http\Response;

class JsonResponse extends Response
{
	/**
	 * @var array
	 */
	private $data;

	/**
	 * @return array|null
	 */
	public function getData(): ?array
	{
		return $this->data;
	}

	/**
	 * @param array $data
	 * @return JsonResponse
	 */
	public function withData(array $data): JsonResponse
	{
		$clone = clone $this;
		$clone->data = $data;
		return $clone;
	}
}
