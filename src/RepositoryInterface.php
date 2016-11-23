<?php

namespace Smart\Sage50;

use DateTime;

interface RepositoryInterface
{
    public function fetchAllSince(DateTime $dateTime);
    public function fetchNewAfterId($id);
}
