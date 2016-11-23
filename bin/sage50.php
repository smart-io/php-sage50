<?php

require_once __DIR__ . "/../vendor/autoload.php";

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$config = new \Smart\Sage50\Config([
	'host' => $_ENV['MYSQL_HOST'],
	'port' => $_ENV['MYSQL_PORT'],
	'dbname' => $_ENV['MYSQL_DATABASE'],
	'user' => $_ENV['MYSQL_USER'],
	'password' => $_ENV['MYSQL_PASSWORD'],
]);

$doctrineRuntime = new \Smart\Sage50\Doctrine\DoctrineRuntime($config);
$doctrineRuntime->run();
