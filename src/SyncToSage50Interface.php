<?php

namespace Smart\Sage50;

use DateTime;

interface SyncToSage50Interface extends SyncInterface
{
    /**
     * @param RepositoryInterface $repository
     */
    public function setRepository(RepositoryInterface $repository);

    /**
     * @return RepositoryInterface $repository
     */
    public function getRepository();

    /**
     * @param DateTime $dateTime
     * @return mixed
     */
    public function syncToSage50(DateTime $dateTime);
}
