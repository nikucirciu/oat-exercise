<?php
return [
	'settings' => [
		'displayErrorDetails' => false,
		'addContentLengthHeader' => false,
		'userRepositoryType' => 'json',
		'userDataFiles' => [
			'json' => dirname(__FILE__) . '/data/users.json',
			'csv' => dirname(__FILE__) . '/data/users.csv'
		]
	]
];
