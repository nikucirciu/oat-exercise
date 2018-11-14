<?php

use Slim\Http\Request;
use Slim\Http\Response;

class MainController extends BaseController
{
	/**
	 * @param Request $request
	 * @param Response $response
	 * @return Response
	 */
	public function index(Request $request, Response $response): Response
	{
		return $response->withRedirect('/users.html');
	}
}
