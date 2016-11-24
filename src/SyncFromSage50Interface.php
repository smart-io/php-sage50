<?php

namespace Smart\Sage50;

use DateTime;

interface SyncFromSage50Interface extends SyncInterface
{
    /**
     * @param DateTime $dateTime
     * @param int|null $limit
     * @return mixed
     */
    public function syncFromSage50(DateTime $dateTime, $limit = null);
}
