<?php
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

require dirname(dirname(__FILE__)) . '/vendor/autoload.php';
$settings = require dirname(dirname(__FILE__)) . '/settings.php';

$app = new App($settings);
$app->add(new JsonEncoderMiddleware());

$container = $app->getContainer();
$container['response'] = function()
{
	return new JsonResponse();
};
$container['user_repository'] = function($container)
{
	$settings = $container['settings'];
	$factory = new UserRepositoryFactory($settings['userDataFiles']);
	return $factory->make($settings['userRepositoryType']);
};
$container['notFoundHandler'] = function()
{
	return function(Request $request, Response $response): Response
	{
		return $response->withStatus(404);
	};
};

require dirname(dirname(__FILE__)) . '/routes.php';

$app->run();
