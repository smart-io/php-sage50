<?php

require_once __DIR__ . "/../vendor/autoload.php";

$doctrineRuntime = new \Smart\Sage50\Doctrine\DoctrineRuntime(__DIR__ . '/../config');
$doctrineRuntime->run();
