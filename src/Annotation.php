<?php

namespace Smart\Sage50;

use ReflectionClass;
use Doctrine\Common\Annotations\AnnotationRegistry;

class Annotation
{
    public function setup()
    {
        $class = new ReflectionClass('Doctrine\\ORM\\Mapping\\Annotation');
        $filename = $class->getFileName();
        AnnotationRegistry::registerLoader('class_exists');
        AnnotationRegistry::registerAutoloadNamespace(
            "Doctrine\\ORM\\Mapping",
            dirname($filename)
        );
    }
}
