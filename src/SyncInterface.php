<?php

namespace Smart\Sage50;

interface SyncInterface
{
    /**
     * @param MapperInterface $mapper
     */
    public function setMapper(MapperInterface $mapper);

    /**
     * @return MapperInterface $mapper
     */
    public function getMapper();
}
