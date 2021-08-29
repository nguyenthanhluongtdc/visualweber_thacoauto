<?php

namespace Platform\Comment\Events;

use Platform\Comment\Models\Comment;
use Platform\Comment\Models\CommentUser;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewCommentEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Comment
     */
    public $comment;

    /**
     * @var CommentUser
     */
    public $commentUser;

    /**
     * Create a new event instance.
     *
     * @param Comment $comment
     * @param CommentUser $commentUser
     */
    public function __construct(Comment $comment, CommentUser $commentUser)
    {
        $this->comment = $comment;
        $this->commentUser = $commentUser;
    }
}
