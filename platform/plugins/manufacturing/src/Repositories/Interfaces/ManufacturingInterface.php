<?php

namespace Platform\Manufacturing\Repositories\Interfaces;

use Platform\Support\Repositories\Interfaces\RepositoryInterface;

interface ManufacturingInterface extends RepositoryInterface
{
    public function getManufacturingById($id);
}
