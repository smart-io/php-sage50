<?php

namespace Smart\Sage50;

use DateTime;

interface SyncerInterface
{
    /**
     * @param MapperInterface $mapper
     */
    public function setMapper(MapperInterface $mapper);

    /**
     * @return MapperInterface $mapper
     */
    public function getMapper();

    /**
     * @param DateTime $dateTime
     * @return mixed
     */
    public function syncSince(DateTime $dateTime);
}
