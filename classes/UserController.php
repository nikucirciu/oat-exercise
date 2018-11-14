<?php

use Slim\Http\Request;
use Slim\Http\Response;

class UserController extends BaseController
{
	/**
	 * @return UserRepository
	 */
	private function getRepository(): UserRepository
	{
		return $this->container['user_repository'];
	}

	/**
	 * @param Request $request
	 * @param JsonResponse $response
	 * @return Response
	 */
	public function users(Request $request, JsonResponse $response): Response
	{
		$name = trim($request->getQueryParam('name', ''));
		$count = max(0, (int)$request->getQueryParam('limit', 0));
		$offset = max(0, (int)$request->getQueryParam('offset', 0));
		$users = $this->getRepository()->find($name, $count, $offset);

		$data = [];
		foreach($users as $user)
		{
			$data[] = $user->toArray();
		}

		return $response->withData($data);
	}

	/**
	 * @param Request $request
	 * @param JsonResponse $response
	 * @param array $arguments
	 * @return Response
	 */
	public function user(Request $request, JsonResponse $response, array $arguments): Response
	{
		$id = isset($arguments['id']) ? $arguments['id'] : '';
		$user = $id ? $this->getRepository()->findById($id) : null;

		return $user ? $response->withData($user->toArray(true)) : $response->withStatus(404);
	}
}
