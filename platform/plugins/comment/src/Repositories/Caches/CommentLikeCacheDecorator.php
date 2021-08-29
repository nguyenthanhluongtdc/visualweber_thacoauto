<?php

namespace Platform\Comment\Repositories\Caches;

use Platform\Comment\Models\Comment;
use Platform\Comment\Repositories\Interfaces\CommentLikeInterface;
use Platform\Support\Repositories\Caches\CacheAbstractDecorator;

class CommentLikeCacheDecorator extends CacheAbstractDecorator implements CommentLikeInterface
{

    /**
     * @inheritDoc
     */
    public function likeThisComment(Comment $comment, $user)
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }
}
