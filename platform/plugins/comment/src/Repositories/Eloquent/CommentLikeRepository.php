<?php

namespace Platform\Comment\Repositories\Eloquent;

use Platform\Comment\Models\Comment;
use Platform\Comment\Repositories\Interfaces\CommentLikeInterface;
use Platform\Support\Repositories\Eloquent\RepositoriesAbstract;

class CommentLikeRepository extends RepositoriesAbstract implements CommentLikeInterface
{
    /**
     * @inheritDoc
     */
    public function likeThisComment(Comment $comment,  $user)
    {
        $params = ['comment_id' => $comment->id, 'user_id' => $user->id];
        $like = $this->getFirstBy($params);

        if ($like) { // unlike
            $like->delete();
            return false;
        }

        $this->createOrUpdate($params);
        return true;
    }
}
