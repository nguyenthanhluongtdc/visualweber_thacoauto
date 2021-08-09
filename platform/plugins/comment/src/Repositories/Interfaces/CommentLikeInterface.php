<?php

namespace Platform\Comment\Repositories\Interfaces;

use Platform\Comment\Models\Comment;
use Platform\Comment\Models\CommentUser;
use Platform\Support\Repositories\Interfaces\RepositoryInterface;

interface CommentLikeInterface extends RepositoryInterface
{
    /**
     * @param Comment $comment
     * @param CommentUser $user
     * @return mixed
     */
    public function likeThisComment(Comment $comment, CommentUser $user);
}
