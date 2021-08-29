<?php

namespace Platform\DistributionSystem\Repositories\Interfaces;

use Platform\Support\Repositories\Interfaces\RepositoryInterface;

interface ShowroomBrandInterface extends RepositoryInterface
{
    public function getBrandGroupByCategory($ids);
}
