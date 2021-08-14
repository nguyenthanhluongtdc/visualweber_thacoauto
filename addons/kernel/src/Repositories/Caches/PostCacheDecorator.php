<?php

namespace Platform\Kernel\Repositories\Caches;

use Platform\Blog\Repositories\Caches\PostCacheDecorator as BlogPostCacheDecorator;

class PostCacheDecorator extends BlogPostCacheDecorator
{
    /**
     * {@inheritDoc}
     */
    public function getFeaturedByCategory($categoryId, int $limit = 5, array $with = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

}
