<?php

namespace Smart\Sage50\Exception;

use Exception;

class InvalidRepositoryException extends Exception
{
    public function __construct()
    {
        parent::__construct('Invalid repository');
    }
}
