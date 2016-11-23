<?php

date_default_timezone_set('UTC');

$vendor = realpath(__DIR__ . '/../vendor');

if (file_exists($vendor . "/autoload.php")) {
    require $vendor . "/autoload.php";
} else {
    $vendor = realpath(__DIR__ . '/../../../');
    if (file_exists($vendor . "/autoload.php")) {
        require $vendor . "/autoload.php";
    } else {
        throw new Exception("Unable to load dependencies");
    }
}

\Doctrine\Common\Annotations\AnnotationRegistry::registerFile(__DIR__ . '/../vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');
