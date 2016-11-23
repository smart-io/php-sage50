<?php

namespace Smart\Sage50;

interface SyncFromSage50ByIdInterface extends SyncInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function syncFromSage50($id);
}
