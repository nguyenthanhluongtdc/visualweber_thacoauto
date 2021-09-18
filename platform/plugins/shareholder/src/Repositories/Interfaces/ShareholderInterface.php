<?php

namespace Platform\Shareholder\Repositories\Interfaces;

use Platform\Support\Repositories\Interfaces\RepositoryInterface;

interface ShareholderInterface extends RepositoryInterface
{
    public function getByCategoryId($categoryId, $paginate = 5);
}
