<?php

namespace Theme\Thaco\Repositories\Interfaces;

use Platform\Support\Repositories\Interfaces\RepositoryInterface;
use Eloquent;
use Platform\Blog\Repositories\Interfaces\PostInterface as InterfacesPostInterface;

interface PostInterface extends InterfacesPostInterface
{
    /**
     * @param array $categoryId
     * @param int $limit
     * @param array $with
     * @return mixed
     */
    public function getFeaturedByCategory($categoryId, int $limit = 5, array $with = []);

    
}
