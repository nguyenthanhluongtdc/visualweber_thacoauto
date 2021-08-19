<?php

namespace Platform\Comment\Repositories\Interfaces;

use Platform\Support\Repositories\Interfaces\RepositoryInterface;

interface CommentRecommendInterface extends RepositoryInterface
{
    /**
     * @param array $reference
     * @param $user
     * @return mixed
     */
    public function getRecommendOfArticle(array $reference, $user);
}
