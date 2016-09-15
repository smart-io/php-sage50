<?php

namespace Smart\Sage50;

interface MapperInterface
{
    public function mapFromSage($entity);
    public function mapToSage();
}
