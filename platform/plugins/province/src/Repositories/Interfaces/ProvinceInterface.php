<?php

namespace Platform\Province\Repositories\Interfaces;

use Platform\Support\Repositories\Interfaces\RepositoryInterface;

interface ProvinceInterface extends RepositoryInterface
{
     /**
     * @param boolean $active
     */
    public function getAllProvince($active = true);
}
