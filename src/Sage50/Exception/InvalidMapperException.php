<?php

namespace Smart\Sage50\Exception;

use Exception;

class InvalidMapperException extends Exception
{
    public function __construct()
    {
        parent::__construct('Invalid mapper');
    }
}
