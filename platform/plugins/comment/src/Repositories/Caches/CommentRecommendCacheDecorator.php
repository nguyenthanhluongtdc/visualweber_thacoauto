<?php

namespace Platform\Comment\Repositories\Caches;

use Platform\Comment\Repositories\Interfaces\CommentRecommendInterface;
use Platform\Support\Repositories\Caches\CacheAbstractDecorator;

class CommentRecommendCacheDecorator extends CacheAbstractDecorator implements CommentRecommendInterface
{

    /**
     * @inheritDoc
     */
    public function getRecommendOfArticle(array $reference, $user)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}
