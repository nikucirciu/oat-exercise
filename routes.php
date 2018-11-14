<?php

$app->get('/', MainController::class . ':index');

$app->group('/v1', function()
{
	$this->get('/users', UserController::class . ':users');
	$this->get('/user/{id:[a-z0-9]+}', UserController::class . ':user');
});
