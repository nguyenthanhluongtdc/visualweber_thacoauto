<?php

namespace Platform\Location\Repositories\Interfaces;

use Platform\Support\Repositories\Interfaces\RepositoryInterface;

interface CityInterface extends RepositoryInterface
{
    /**
     * @param string $keyword
     * @param int $limit
     * @param array $with
     * @param array|string[] $select
     */
    public function filters($keyword, $limit = 10, array $with = [], array $select = ['cities.*']);
}
