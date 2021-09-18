<?php

namespace Platform\Shareholdercateogry\Repositories\Interfaces;

use Platform\Support\Repositories\Interfaces\RepositoryInterface;

interface ShareholdercateogryInterface extends RepositoryInterface
{
    /**
     * @param array $condition
     * @param array $with
     * @return array
     */
    public function getAllCategories();
}
